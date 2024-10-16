<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('panels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('host')->nullable();
            $table->string('type')->nullable();
            $table->string('room_id');
            $table->longText('description')->nullable();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('panels');
    }
};
