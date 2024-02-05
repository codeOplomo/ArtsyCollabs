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
        Schema::create('art_projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable(); // A description of the project
            $table->double('budget', 15, 2)->nullable(); // Assuming the budget can have decimal values
            $table->string('image')->nullable(); // Path to the image file
            $table->string('status')->default('planning'); // Default status of the project
            $table->date('start_date')->nullable(); // The start date of the project
            $table->date('end_date')->nullable(); // The end date of the project
            $table->timestamps(); // Laravel's default timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('art_projects');
    }
};
