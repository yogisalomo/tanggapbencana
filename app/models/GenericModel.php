<?php 

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class GenericModel extends Eloquent {

	public $fillable = [];

	public $rules = [];

	public $errors;

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

}