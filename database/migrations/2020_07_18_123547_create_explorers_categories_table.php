<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExplorersCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('explorers_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('explorer_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('explorer_id')->references('id')->on('explorers');
            $table->foreign('category_id')->references('id')->on('categories');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('explorers_categories');
    }
}
