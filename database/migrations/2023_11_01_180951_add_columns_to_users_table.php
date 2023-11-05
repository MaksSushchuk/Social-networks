<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sex',8)->nullable()->cascadeOnDelete();
            $table->integer('age')->nullable()->cascadeOnDelete();
            $table->string('country',48)->nullable()->cascadeOnDelete();
            $table->string('location',48)->nullable()->cascadeOnDelete();
            $table->string('birthplace',48)->nullable()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
