<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestvaccinesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requestvaccines', function(Blueprint $table)
		{
			$table->increments('id');
			$table->String('name');
			$table->String('city');
			$table->String('country');
			$table->String('telephone');
			$table->text('observation');
			$table->integer('supplier_id')->unsigned();
			$table->integer('vaccine_id')->unsigned();			
			$table->timestamps();
			$table->foreign('supplier_id')->references('id')->on('suppliers');
			$table->foreign('vaccine_id')->references('id')->on('vaccines');			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('requestvaccines');
	}

}
