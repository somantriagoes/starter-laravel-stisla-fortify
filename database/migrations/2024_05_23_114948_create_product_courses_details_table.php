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
        Schema::create('product_courses_details', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); // sub title
            $table->foreignId('product_id')->constrained(
                table: 'product_courses', indexName: 'product_courses_details_product_id'
            ); // one to many relation
	        $table->enum('type', ['Video', 'Audio', 'E-Book']);
            $table->string('link_file')->nullable();
            $table->enum('task_completed', ['Y', 'N'])->default('N');
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
        Schema::dropIfExists('product_courses_details');
    }
};
