<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_number');
            $table->string('company_mail');
            $table->string('company_adress');
            $table->string('client_name');
            $table->string('client_number');
            $table->string('client_mail');
            $table->string('client_adress');
            $table->string('invoice_number');
            $table->date('invoice_date');
            $table->time('invoice_time');
            $table->string('currency');
            $table->string('tax');
            $table->decimal('total_amount', 8, 2);
            $table->string('notes');
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
        Schema::dropIfExists('invoices');
    }
}
