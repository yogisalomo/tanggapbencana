<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Request extends GenericModel {
	
	public $table = 'requests';

	public $fillable = [
		'disaster_id',
		'description',
	];

	public $rules = [
		'disaster_id'=>'',
		'description'=>'',
	];

}