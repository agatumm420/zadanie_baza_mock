<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); // -nazwa pliku-data
            $table->dateTime('purchase_date');
            $table->boolean('status'); // też będą logowane błędy
            $table->float('total');
            $table->float('tax');
            $table->string('vendor_nip');
            $table->string('vendor_name');
            $table->string('vendor_adress');
            $atble->string('vendor_phone');
            $table->bigInteger('invoice_number');
            $table->tinyInteger('payment');// 0-karta , 1- gotówka
            $atble->bigInteger('card_number')->nullable();
            $table->foreignId('client_id')->nullable()
                    ->constrained()

                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('receipt');
    }
};
