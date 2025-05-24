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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nis')->unique();
            $table->enum('gender', ['Male','Female']);
            $table->enum('class_group', ['SIJA A','SIJA B']);
            $table->string('address');
            $table->string('contact');
            $table->string('email')->unique();
            $table->string('photo')->nullable()->unique();
            $table->boolean('pkl_report_status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
