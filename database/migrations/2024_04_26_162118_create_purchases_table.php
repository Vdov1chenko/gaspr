<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamp('purchase_date')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });

        DB::table('purchases')->insert([
            ['product_id' => 1, 'quantity' => 2, 'price' => 999.99, 'purchase_date' => now()],
            ['product_id' => 2, 'quantity' => 1, 'price' => 899.99, 'purchase_date' => now()],
        ]);
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
