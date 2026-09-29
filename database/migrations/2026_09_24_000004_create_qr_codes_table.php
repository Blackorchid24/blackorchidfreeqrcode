<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title', 100);
            $table->text('url');
            $table->string('filename');
            $table->string('logo_filename')->nullable();
            $table->unsignedInteger('size')->default(400);
            $table->unsignedInteger('margin')->default(10);
            $table->string('foreground', 7)->default('#111827');
            $table->string('background', 7)->default('#FFFFFF');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('qr_codes');
    }
};
