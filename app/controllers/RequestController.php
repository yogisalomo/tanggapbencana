<?php

class RequestController extends GenericController {

	public $names = 'requests';
	public $name = 'request';

	public function __construct(Request $request)
	{
		$this->db = $request;
	}

}