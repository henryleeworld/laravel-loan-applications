<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->unsignedInteger('subject_id')->nullable();
            $table->string('subject_type')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->text('properties')->nullable();
            $table->string('host', 45)->nullable();
            $table->timestamps();
        });
    }
};
