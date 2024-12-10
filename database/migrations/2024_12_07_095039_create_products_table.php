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
            $table->string('name');
            $table->text('short_description')->nullable();
            $table->string('icon')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->date('launch_date')->nullable();
            $table->float('rating', 3, 2)->nullable(); 
            $table->string('size')->nullable();
            $table->string('download_link')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('version')->nullable();
            $table->integer('total_downloads')->default(0);
            $table->text('version_details')->nullable();
            $table->string('language')->nullable();
            $table->string('pass_code')->nullable();
            $table->string('display_picture')->nullable();
            $table->longText('details')->nullable();
            $table->string('tags')->nullable();
            $table->longText('description')->nullable();
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
