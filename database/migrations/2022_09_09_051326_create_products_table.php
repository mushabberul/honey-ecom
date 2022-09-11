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
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('product_name');
            $table->string('product_slug');
            $table->unsignedMediumInteger('product_price')->default(1);
            $table->unsignedSmallInteger('product_rating')->nullable()->default(0);
            $table->longText('product_short_description')->nullable();
            $table->longText('product_long_description')->nullable();
            $table->string('product_image')->default('default_image.png');
            $table->string('product_code')->unique();
            $table->unsignedInteger('product_store')->default(1);
            $table->unsignedInteger('alert_quentity')->default(1);
            $table->longText('additional_info')->nullable();
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
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
