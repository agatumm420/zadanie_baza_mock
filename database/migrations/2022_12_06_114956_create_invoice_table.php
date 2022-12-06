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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); //- nazwa pliku-nip-data wystawienia-
            $table->boolean('status');//error status 0-nie przeszło 1- przeszło errory będą logowane z nazwą pliku
            $table->string('file_name');
            $table->dateTime('invoice_date');
            $table->dateTime('success_date')->nullable();
            $table->string('payee_name');
            $table->string("payee_tax_nr");
            $table->string("payee_country");
            $table->string("payer_name");
            $table->string("payer_tax_nr");
            $table->string("payer_country");
            $table->string('due_date');
            $table->string('issue_date');
            $table->string('purchase_date');
            $table->float("rate");
            $table->float('gross');
            $table->float('net');
            $table->float('vat');
            $table->string('currency');
            $table->string('account_nr');
            $table->string('invoice_nr');
            $table->boolean('is_optima');
            $table->boolean('is_filed');// czy została złożona
            $table->boolean('ative'); //czy ma się pokazywać w aplikacji
            $table->tinyInteger('verified_with'); // 0-scanye, 1-veryfi 2- jeszcze coś
            $table->foreignId('client_id')->nullable() //żeby można było potem zobaczyć np. wszystkie faktury klienta ale będzie nullable jakby to nie był żaden stały klient biura
                    ->constrained()

                    ->onUpdate('cascade')
                    ->onDelete('cascade');


            $table->boolean('is_recived'); // determinuje czy jest otrzymane -1 czy wydane -0

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
        Schema::dropIfExists('invoice');
    }
};
