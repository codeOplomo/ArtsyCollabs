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
    Schema::create('media', function (Blueprint $table) {
        $table->id();
        $table->morphs('model');
        $table->string('collection_name');
        $table->string('name');
        $table->string('file_name');
        $table->string('mime_type')->nullable();
        $table->string('disk');
        $table->json('custom_properties')->nullable();
        $table->json('manipulations')->nullable();
        $table->json('generated_conversions')->nullable();
        $table->json('responsive_images')->nullable();
        $table->unsignedInteger('order_column')->nullable();
        $table->json('size')->nullable();
        $table->string('conversions_disk')->nullable();
        $table->uuid('uuid')->nullable();
        $table->timestamps();

        $table->index(['model_id', 'model_type']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
