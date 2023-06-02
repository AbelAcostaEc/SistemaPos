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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('code')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('purchase_price',7,2);
            $table->decimal('sale_price',7,2);
            $table->integer('stock');
            $table->integer('minimum_stock');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            // Llaves Foraneas
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
        Schema::dropIfExists('products');
    }
};
