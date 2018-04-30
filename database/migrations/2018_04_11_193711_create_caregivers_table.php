<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaregiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caregivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('county');           
            $table->string('city');
            $table->string('zipcode');
            $table->string('cpa');
            $table->string('caseworker_name');
            $table->string('license_type');
            $table->string('license_no');
            $table->string('license_level');
            $table->string('max_fosterchild_no');
            $table->tinyInteger('respite');
            $table->string('bio_children_no');
            $table->string('kinship_children_no');
            $table->string('foster_children_no');
            $table->integer('current_children_no')->default(0);
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
        Schema::dropIfExists('caregivers');
    }
}
