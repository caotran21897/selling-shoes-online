<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsReceiptDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_receipt_details', function (Blueprint $table) {
            
            $table->biginteger('goods_receipt_id')->unsigned();
            $table->biginteger('product_detail_id')->unsigned();
            $table->integer('quantity_receipt');
            $table->float('price_receipt',10);
            $table->timestamps();
            $table->primary(array('goods_receipt_id', 'product_detail_id'));
            $table->foreign('goods_receipt_id')->references('id')->on('goods_receipts')->onDelete('cascade');
            $table->foreign('product_detail_id')->references('id')->on('product_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_receipt_details');
    }
}
