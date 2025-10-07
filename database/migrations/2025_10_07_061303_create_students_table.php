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
            $table->string("name");
            $table->date("dob")->nullable();
            $table->boolean("is_active")->nullable();
            $table->longText("address")->nullable();
            $table->double("gpa")->default(0.0);
            $table->integer("nb_of_credits")->default(0);
            $table->string("telephone")->nullable();
            $table->string("email")->unique();
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
