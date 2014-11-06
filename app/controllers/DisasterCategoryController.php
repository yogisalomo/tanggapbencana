<?php

class DisasterCategoryController extends GenericController {

	public $names = 'disaster_categories';
	public $name = 'disaster_category';

	public function __construct(DisasterCategory $disaster_category)
	{
		$this->db = $disaster_category;
	}


}