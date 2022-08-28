<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_post', function (Blueprint $table) {
            $table->integer('id_code_post')->index()->primary();
            $table->string('d_city')->nullable();
            $table->integer('fk_c_state')->nullable()->index('fk_c_state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('code_post');
    }
}
