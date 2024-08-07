<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('integration_information', function (Blueprint $table) {
            $table->id();
            $table->string('integration_name');
            $table->string('key');
            $table->string('value');
            $table->longText('identifier')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('integration_information');
    }
};
