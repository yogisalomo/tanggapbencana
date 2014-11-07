<?php

class ResponseController extends GenericController {

	public $names = 'responses';
	public $name = 'response';

	public function __construct(Respon $response)
	{
		$this->db = $response;
	}

}