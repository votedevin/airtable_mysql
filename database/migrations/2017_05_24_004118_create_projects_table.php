<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('project_recordid')->unique();
            $table->string('project_projectid');
            $table->text('project_description');
            $table->double('project_citycost')->unique()->nullable();
            $table->double('project_noncitycost');
            $table->double('project_totalcost')->nullable();
            $table->string('project_managingagency')->nullable();
            $table->string('project_commitments')->nullable();
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
        Schema::drop('projects');
    }
}
