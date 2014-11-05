<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $fillable = ['username', 'password', 'email', 'role'];

	public $timestamps = false;

	protected $softDelete = true;

	public $rules = [
		'username' => 'required|unique:users',
		'password' => '',
		'email' => 'unique:users',
		'role' => 'required'
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function isValid($scenario = 'create')
	{
		$rules = $this->rules;
		if ($scenario == 'update') {
			$rules = [];
			foreach ($this->rules as $key=>$value) {
				$split = explode('|', $value);
				$merged = [];
				foreach ($split as $item) {
					if (strpos($item, 'unique') === false) {
						$merged[] = $item;
					}
				}
				$rules[$key] = implode('|', $merged);
			}
		}
		$v = Validator::make($this->attributes, $rules);
		if ($v->passes()) return true;
		$this->errors = $v->messages();
		return false;
	}
	
	public function isValidEdit($scenario = 'create', $input)
	{
		$rules = $this->rules;
		$rules['password'] = 'confirmed';
		if ($scenario == 'update') {
			$rules = [];
			foreach ($this->rules as $key=>$value) {
				$split = explode('|', $value);
				$merged = [];
				foreach ($split as $item) {
					if (strpos($item, 'unique') === false) {
						$merged[] = $item;
					}
				}
				$rules[$key] = implode('|', $merged);
			}
		}
		$v = Validator::make($input, $rules);
		if ($v->passes()) return true;
		$this->errors = $v->messages();
		return false;
	}
}
