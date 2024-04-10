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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->enum('role', ['student', 'mentor']);
            $table->unsignedBigInteger('detail_id');
            $table->foreign('detail_id')->references('id')->on('students','memtors');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::tabel('users', function(Blueprint $table){
            $table->dropColumn('detail_id');
        });
    }
};