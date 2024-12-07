<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {

            $table->string('file_name')->nullable();
            $table->string('created_by')->nullable();
            $table->string('version')->nullable();
            $table->string('license_type')->nullable();
            $table->text('change_log')->nullable();
            $table->string('languages')->nullable();
            $table->integer('total_downloads')->default(0);
            $table->string('uploaded_by')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('main_image')->nullable();
            $table->text('overview')->nullable();
            $table->json('features')->nullable();
            $table->json('system_requirements')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'file_name',
                'created_by',
                'version',
                'license_type',
                'change_log',
                'languages',
                'total_downloads',
                'uploaded_by',
                'sub_category',
                'main_image',
                'overview',
                'features',
                'system_requirements'
            ]);
        });
    }
};
