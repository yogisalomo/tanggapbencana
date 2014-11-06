<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Report extends GenericModel {
	
	public $table = 'reports';

	public $fillable = [
		'disaster_id',
		'latitude',
		'longitude',
		'message',
	];

	public $rules = [
		'disaster_id'=>'',
		'latitude'=>'',
		'longitude'=>'',
		'message'=>'',
	];

}