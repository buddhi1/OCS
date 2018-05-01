<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');            
            $table->string('cps_no');
            $table->tinyInteger('type');
            $table->tinyInteger('assign_status')->default(0);
            $table->integer('caseworker_id');
            $table->integer('advocate_id');
            $table->date('dob');
            $table->integer('school_id')->nullable();
            $table->string('class')->nullable();
            $table->string('address1');
            $table->string('city');
            $table->string('zip');
            $table->string('county');
            $table->integer('sibling')->default(0);
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
        Schema::dropIfExists('children');
    }
}
