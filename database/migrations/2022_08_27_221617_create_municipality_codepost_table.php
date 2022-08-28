<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalityCodepostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipality_codepost', function (Blueprint $table) {
            $table->integer('fk_municipality_id');
            $table->string('fk_d_municipality')->nullable();
            $table->integer('fk_id_code_post')->index('fk_zipcode_id');
            
            $table->primary(['fk_municipality_id', 'fk_id_code_post']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipality_codepost');
    }
}
