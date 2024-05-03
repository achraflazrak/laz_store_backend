<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_fr');
            $table->string('slug');
            $table->integer('qty');
            $table->string('tag_en')->nullable();
            $table->string('tag_fr')->nullable();
            $table->string('size_en')->nullable();
            $table->string('size_fr')->nullable();
            $table->string('color_en');
            $table->string('color_fr');
            $table->decimal('selling_price',10, 2);
            $table->decimal('old_price',10, 2)->nullable();
            $table->longText('desc_en');
            $table->longText('desc_fr');
            $table->string('product_thumbnail');
            $table->string('product_image_1')->nullable();
            $table->string('product_image_2')->nullable();
            $table->string('product_image_3')->nullable();
            $table->boolean('new')->default(0);
            $table->boolean('featured')->default(0);
            $table->boolean('best_seller')->default(0);
            $table->boolean('hot_deal')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
