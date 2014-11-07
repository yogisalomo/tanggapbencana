<?php

class FrontEndController extends BaseController {

	public function getIndex(){
		$disasters = Disaster::where('end',null)->get();
		return View::make('frontend.index')->with(array('disasters'=>$disasters));
	}

}