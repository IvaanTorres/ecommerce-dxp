<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->integer('percentage')->min(0)->max(100);
            // TODO Add polymorphic relationship for normal discounts and discount codes
            // TODO: The normal ones have a title and a description, the discount codes have a code
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
        // SQL
        DB::statement('DROP TABLE if exists discounts cascade;');
        Schema::dropIfExists('discounts');
    }
};
