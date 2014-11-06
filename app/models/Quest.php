<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Quest extends GenericModel {
	
	public $table = 'requests';

	public $fillable = [
		'title',
		'disaster_id',
		'description',
	];

	public $rules = [
		'title'=>'',
		'disaster_id'=>'',
		'description'=>'',
	];

}