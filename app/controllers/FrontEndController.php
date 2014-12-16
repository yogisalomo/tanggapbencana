<?php

class FrontEndController extends BaseController {

	public function getIndex(){
		$disasters = Disaster::where('end','=','0000-00-00')->get();
		return View::make('frontend.index')->with(array('disasters'=>$disasters));
	}

}