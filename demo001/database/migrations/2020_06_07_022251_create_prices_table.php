<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('price');
            $table->dateTime('date_apply');
            $table->timestamps();
            $table->primary(array('product_id', 'date_apply'));
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('date_apply')->references('date_time')->on('dates')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
