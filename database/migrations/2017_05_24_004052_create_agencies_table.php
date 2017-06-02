<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('agency_recordid')->nullable();
            $table->string('magency')->nullable();
            $table->text('magencyname')->nullable();
            $table->string('magencyacro')->nullable();
            $table->text('projects')->nullable();
            $table->text('commitments')->nullable();
            $table->double('total_project_cost')->nullable();
            $table->double('commitments_cost')->nullable();
            $table->double('commitments_noncity_cost')->nullable();
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
        Schema::drop('agencies');
    }
}
