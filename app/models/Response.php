<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Response extends GenericModel {
	
	public $table = 'responses';

	public $fillable = [
		'request_id',
		'user_id',
		'status'
	];

	public $rules = [
		'request_id'=>'',
		'user_id'=>'',
		'status'=>'',
	];

}