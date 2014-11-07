<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Disaster extends GenericModel {
	
	public $table = 'disasters';

	public $fillable = [
		'name',
		'disaster_category_id',
		'latitude',
		'longitude',
		'start',
		'end',
		'status',
	];

	public $rules = [
		'name'=>'',
		'disaster_category_id'=>'',
		'latitude'=>'',
		'longitude'=>'',
		'start'=>'',
		'end'=>'',
		'status'=>'',
	];

}