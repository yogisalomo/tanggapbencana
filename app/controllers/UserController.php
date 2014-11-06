<?php 

class UserController extends GenericController {

	public $names = 'users';
	public $name = 'user';

	public function __construct(User $user)
	{
		$this->db = $user;
	}

	public function useredit()
	{	
		$id = @Auth::user()->id;
		return parent::edit($id);
	}

	public function userupdate()
	{
		$id = @Auth::user()->id;
		$input = Input::all();
		$pass = Input::get('password');
		$name = $this->name;
		$$name = $this->db->find($id);
		$old = $$name->password;
		if (! $$name->fill($input)->isValidEdit('update', Input::all())) {
			return Redirect::back()->withInput()->withErrors($$name->errors);
		}
		if (!empty($pass))
			$$name->password = Hash::make($pass);
		else
			$$name->password = $old;
		$$name->save();
		return Redirect::to('user/profile')->with('alert', studly_case($this->name).' updated');
	}

	public function store()
	{
		$input = Input::all();
		$pass = Input::get('password');
		if (! $this->db->fill($input)->isValid()) {
			return Redirect::back()->withInput()->withErrors($this->db->errors);
		}
		if (!empty($pass))
			$this->db->password = Hash::make($pass);
		$this->db->save();
		return Redirect::route('admin.'.$this->names.'.index')->with('alert', studly_case($this->name).' created');
	}	

	public function update($id)
	{
		$input = Input::all();
		$pass = Input::get('password');
		$name = $this->name;
		$$name = $this->db->find($id);
		$old = $$name->password;

		if (! $$name->fill($input)->isValidEdit('update', Input::all())) {
			return Redirect::back()->withInput()->withErrors($$name->errors);
		}
		if (!empty($pass))
			$$name->password = Hash::make($pass);
		else
			$$name->password = $old;
		$$name->save();
		return Redirect::route('admin.'.$this->names.'.index')->with('alert', studly_case($this->name).' updated');
	}
}