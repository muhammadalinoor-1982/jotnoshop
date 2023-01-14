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
            $table->string('custom_id', 8)->nullable();
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->integer('quantity')->nullable();
            $table->double('price');
            $table->double('disc_price')->nullable();
            $table->string('category_id');
            $table->string('brand_id');
            $table->text('description')->nullable();
            $table->longText('overview')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->string('creator')->nullable();
            $table->string('updater')->nullable();
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
}
