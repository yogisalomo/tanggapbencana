<?php

class DisasterController extends GenericController {

	public $names = 'disasters';
	public $name = 'disaster';

	public function __construct(Disaster $disaster)
	{
		$this->db = $disaster;
	}

}