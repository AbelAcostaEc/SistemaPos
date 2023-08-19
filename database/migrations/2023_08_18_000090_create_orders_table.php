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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('payment_method_id');
            $table->boolean('final_consumer')->nullable();
            $table->string('order_number');
            $table->date('date');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('total', 10, 2);
            $table->text('note');
            $table->timestamps();
            $table->softDeletes();
            
            // Llaves Foraneas
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
