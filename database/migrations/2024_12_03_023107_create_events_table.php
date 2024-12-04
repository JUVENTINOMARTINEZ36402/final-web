<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('title'); // Event title (short text)
            $table->text('description'); // Event description (long text)
            $table->dateTime('event_date'); // Date and time of the event
            $table->string('location'); // Event location
            $table->string('logo_image')->nullable(); // Optional logo image URL or path
            $table->boolean('status')->default(true); // Event status (default true)
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('events'); // Drop the events table if rollback
    }
};
