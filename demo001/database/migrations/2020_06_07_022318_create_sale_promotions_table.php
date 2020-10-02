<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_promotions', function (Blueprint $table) {
            $table->id();

            $table->string('sale_detail')->nullable();
            $table->integer('discount');
            $table->dateTime('begin');
            $table->dateTime('end');
            $table->timestamps();
            $table->foreign('begin')->references('date_time')->on('dates')->onDelete('cascade');
            $table->foreign('end')->references('date_time')->on('dates')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_promotions');
    }
}
