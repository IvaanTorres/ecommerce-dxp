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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); // When the user has verified though email
            $table->string('password');
            $table->rememberToken(); // TODO: Set token and remember token / add oauth
            // $table->bigInteger('cart_id')->nullable()->unique(); // The cart id
            // $table->bigInteger('wishlist_id')->nullable()->unique(); // The wishlist id
            // $table->array('products')->nullable();
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
        Schema::dropIfExists('users');
    }
};
