<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlements', function (Blueprint $table) {
            $table->integer('id_settlement')->index('idx_settlements_id');
            $table->string('d_settlement')->nullable();
            $table->string('d_zone')->nullable();
            $table->string('d_type_settle')->nullable();
            $table->integer('fk_id_code_post')->nullable()->index('fk_id_code_post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settlements');
    }
}
