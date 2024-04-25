<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->unsignedBigInteger('category_id');
            $table->string('product_name');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });

        // Inserting data into products table
        DB::table('products')->insert([
            ['category_id' => 4, 'product_name' => 'iPhone 13', 'price' => 999.99],
            ['category_id' => 4, 'product_name' => 'Samsung Galaxy S21', 'price' => 899.99],
            ['category_id' => 5, 'product_name' => 'iPad Air', 'price' => 649.99],
            ['category_id' => 6, 'product_name' => 'Футболка', 'price' => 19.99],
            ['category_id' => 7, 'product_name' => 'Платье', 'price' => 49.99],
            ['category_id' => 8, 'product_name' => '1984', 'price' => 10.99],
            ['category_id' => 9, 'product_name' => 'Убийство в Восточном экспрессе', 'price' => 8.99],
        ]);
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
}
