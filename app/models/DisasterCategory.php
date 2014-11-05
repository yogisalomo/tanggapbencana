<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class DisasterCategory extends GenericModel {
	
	public $table = 'disaster_categories';

	public $fillable = [
		'name',
	];

	public $rules = [
		'name'=>'',
	];

}