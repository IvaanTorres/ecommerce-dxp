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
        Schema::create('discountable', function (Blueprint $table) {
            $table->id();
            // Polymorphic relationship
            // It is important to note that the discountable_type and discountable_id columns are linked to the discountable() method in the Upload model
            // If the name is changed, the method name must be changed as well
            $table->unsignedInteger('discount_id');
            $table->unsignedInteger('discountable_id')->nullable();
            $table->string('discountable_type')->nullable();
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
        Schema::dropIfExists('discountable');
    }
};
