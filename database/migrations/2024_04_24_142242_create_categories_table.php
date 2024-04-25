<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_category_id')->nullable();
            $table->string('category_name');
            $table->timestamps();

            $table->foreign('parent_category_id')->references('id')->on('categories');
        });

        // Inserting data into categories table
        DB::table('categories')->insert([
            ['parent_category_id' => null, 'category_name' => 'Электроника'],
            ['parent_category_id' => null, 'category_name' => 'Одежда'],
            ['parent_category_id' => null, 'category_name' => 'Книги'],
            ['parent_category_id' => 1, 'category_name' => 'Смартфоны'],
            ['parent_category_id' => 1, 'category_name' => 'Планшеты'],
            ['parent_category_id' => 2, 'category_name' => 'Мужская одежда'],
            ['parent_category_id' => 2, 'category_name' => 'Женская одежда'],
            ['parent_category_id' => 3, 'category_name' => 'Фантастика'],
            ['parent_category_id' => 3, 'category_name' => 'Детективы'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
