<?php

class GenericController extends BaseController {

    public $db;
    public $names;
    public $name;
    public $location = "";
    public $scope = "";

    public function __construct()
    {

    }

    public function getScope(){
        return ($this->scope == "" ? "" : ($this->scope.'.'));
    }

    public function getLocation(){
        return ($this->location == "" ? "" : ($this->location.'.'));
    }

    public function index()
    {
        $names = $this->names;
        $$names = $this->db->orderBy('id', 'desc')->get();
        return View::make($this->getLocation() . $this->names.'.index', compact($names));
    }

    public function create()
    {
        return View::make($this->getLocation().$this->names.'.create');
    }

    public function store()
    {

        $input = Input::all();
        if (! $this->db->fill($input)->isValid()) {
            if (Input::get('redirect')){
                return Redirect::route($this->getScope() . $this->names.'.create')->withInput();
            } else {
                //print_r($this->db->errors);die();
                return Redirect::back()->withInput()->withErrors($this->db->errors);
            }
        }

        $this->db->save();
        //return Input::get('redirect');
        // if (Input::get('submit') == 'Save') {
        if (Input::get('redirect'))
            return Redirect::to(Input::get('redirect'))->with('alert', studly_case($this->name).' created');
        else
            return Redirect::route($this->getScope() . $this->names.'.index')->with('alert', studly_case($this->name).' created');
        // } else {
        //  return Redirect::route($this->names.'.create')->with('alert', $this->name.' created');
        // }
    }

    public function destroy($id)
    {
        $this->db->destroy($id);
        return Redirect::route($this->getScope() . $this->names.'.index')->with('alert', studly_case($this->name).' deleted');
    }

    public function edit($id)
    {
        $name = $this->name;
        $$name = $this->db->findOrFail($id);
        return View::make($this->getLocation().$this->names.'.edit', compact($name));
    }

    public function show($id)
    {
        $name = $this->name;
        $$name = $this->db->findOrFail($id);
        return View::make($this->getLocation().$this->names.'.show', compact($name));
    }

    public function update($id)
    {
        $input = Input::all();
        $name = $this->name;
        $$name = $this->db->find($id);
        if (! $$name->fill($input)->isValid('update')) {
            return Redirect::back()->withInput()->withErrors($$name->errors);
        }

        $$name->save();
        return Redirect::route($this->getScope() . $this->names.'.index')->with('alert', studly_case($this->name).' updated');
    }

    public function fileUpload($field = 'file_document', $name = 'file_name', $exts = [], $data_provider)
    {
        $file = Input::file($field);
        $destinationPath = public_path().'/upload/';

        if (!Input::hasFile($field))
            return Redirect::back()->withInput()->withErrors($data_provider->errors)->with('alert', 'file field is empty');

        $ext = $file->getClientOriginalExtension();
        if (count($exts) == 0)
            $exts = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'jpg', 'jpeg', 'png', 'gif', 'svg'];
        if (!in_array(strtolower($ext), $exts))
            return Redirect::back()->withInput()->withErrors($data_provider->errors)->with('alert', 'file is not a document format');

        $filename = $file->getClientOriginalName();
        $upload_success = $file->move($destinationPath, $filename);
        $data_provider->$name = $filename;

        return true;
    }
}
