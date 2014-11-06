<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Vendor extends GenericModel {
	
	public $table = 'vendors';

	public $fillable = [
		'name',
		'area_of_expertise',
		'contract_status',
		'performance_score',
	];

	public $rules = [
		'name' => '',
		'area_of_expertise' => '',
		'contract_status' => '',
		'performance_score' => '',
	];

}