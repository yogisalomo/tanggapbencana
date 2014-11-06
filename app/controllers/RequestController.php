<?php

class RequestController extends GenericController {

	public $names = 'requests';
	public $name = 'request';

	public function __construct(Quest $request)
	{
		$this->db = $request;
	}

}