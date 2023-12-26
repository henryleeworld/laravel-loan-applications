<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('loan_applications', function (Blueprint $table) {
            $table->foreignId('status_id')->nullable()->constrained();
            $table->unsignedBigInteger('analyst_id')->nullable();
            $table->foreign('analyst_id')->references('id')->on('users');
            $table->unsignedBigInteger('cfo_id')->nullable();
            $table->foreign('cfo_id')->references('id')->on('users');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id')->references('id')->on('users');
        });
    }
};
