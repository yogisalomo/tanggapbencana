<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeStamps extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assigned_projects', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('buyers', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('currencies', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('delivery_orders', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('incoterms', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('payment_terms', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('pick_tickets', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('projects', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('purchase_orders', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('purchase_requests', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('quotations', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('requesters', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('stock_materials', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('uoms', function($table)
		{
    		$table->timestamps();
		});
		Schema::table('vendors', function($table)
		{
    		$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
