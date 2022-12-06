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
        Schema::create('clients_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('client_id')
                    ->constrained()

                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('invoice_id')
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
        Schema::dropIfExists('clients_invoices');
    }
};
