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
        Schema::create('product_courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->foreignIdFor(Category::class);
            // $table->foreign('category_id')->references('id')->on('categories');

            // $table->foreignIdFor(Lecturer::class);
            // $table->foreign('lecturer_id')->references('id')->on('lecturers');

            $table->foreignId('category_id')->constrained(
                table: 'categories', indexName: 'product_courses_category_id'
            ); // one to many relation
	        $table->string('language')->default('Indonesian');
	        $table->string('course_level', 50)->nullable();
            $table->text('description');
            $table->foreignId('lecturer_id')->constrained(
                table: 'lecturers', indexName: 'product_courses_lecturer_id'
            ); // one to many relation
            $table->foreignId('discount_id')->constrained(
                table: 'discounts', indexName: 'product_courses_discount_id'
            )->nullable(); // one to many relation
            $table->biginteger('price')->default(0);
	        $table->enum('series', ['Y', 'N'])->default('N');
            $table->string('image_ads')->nullable();
            $table->integer('rating')->default(0);
            $table->integer('duration')->default(0); // in minutes
            $table->integer('created_by')->default(0); // users.id login session
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_courses');
    }
};
