<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSmsesTable extends Migration {

	public function up()
	{
		Schema::create('smses', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nama_disaster', 100);
			$table->string('longitude', 15);
			$table->string('lattitude', 15);
			$table->string('judul_laporan', 100);
			$table->text('isi_laporan');
		});
	}

	public function down()
	{
		Schema::drop('smses');
	}
}