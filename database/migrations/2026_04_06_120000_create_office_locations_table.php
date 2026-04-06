<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('office_locations')) {
            Schema::create('office_locations', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('address');
                $table->text('google_map_embed_url');
                $table->string('google_map_url', 2000)->nullable();
                $table->unsignedInteger('display_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('office_locations');
    }
};
