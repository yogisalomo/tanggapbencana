<?php

class ReportController extends GenericController {

	public $names = 'reports';
	public $name = 'report';

	public function __construct(Report $report)
	{
		$this->db = $report;
	}

}