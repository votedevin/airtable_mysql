<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commitments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('commitment_recordid')->nullable();
            $table->string('budgetline')->nullable();
            $table->string('fmsnumber')->nullable();
            $table->string('managingagency')->nullable();
            $table->string('projectid')->nullable();
            $table->text('description')->nullable();
            $table->string('commitmentcode')->nullable();
            $table->text('commitmentdescription')->nullable();
            $table->double('citycost')->nullable();
            $table->double('noncitycost')->nullable();
            $table->date('plancommdate')->nullable();
            $table->datetime('createtime')->nullable();
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
        Schema::drop('commitments');
    }
}
