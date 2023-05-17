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
            $table->string('ref')->unique();
            $table->string('name');
            $table->text('description');
            $table->float('price');
            $table->float('final_price'); // The final price after discount
            $table->integer('weight');
            $table->integer('stock');
            $table->integer('nb_reviews'); // TODO: Check how to do this
            $table->integer('discount_priority')->default(3);

            // $table->integer('nb_stars_id');
            // The relationship with the categories table is made in the product_category table (M-M)
            // $table->bigInteger('brand_id');
            // $table->bigInteger('discount_id'); // TODO: Check how to make possible to add discounts to products, categories, brands, etc. (Add priorities)
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
        Schema::dropIfExists('products');
    }
};
