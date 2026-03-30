<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('social_links')) {
            Schema::create('social_links', function (Blueprint $table) {
                $table->id();
                $table->string('platform')->unique();
                $table->string('label');
                $table->string('icon_class')->nullable();
                $table->string('url')->nullable();
                $table->unsignedInteger('display_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        $defaults = [
            ['platform' => 'facebook', 'label' => 'Facebook', 'icon_class' => 'fab fa-facebook-f', 'display_order' => 1],
            ['platform' => 'x', 'label' => 'X', 'icon_class' => 'fab fa-twitter', 'display_order' => 2],
            ['platform' => 'instagram', 'label' => 'Instagram', 'icon_class' => 'fab fa-instagram', 'display_order' => 3],
            ['platform' => 'linkedin', 'label' => 'LinkedIn', 'icon_class' => 'fab fa-linkedin-in', 'display_order' => 4],
            ['platform' => 'youtube', 'label' => 'YouTube', 'icon_class' => 'fab fa-youtube', 'display_order' => 5],
            ['platform' => 'tiktok', 'label' => 'TikTok', 'icon_class' => 'fab fa-tiktok', 'display_order' => 6],
            ['platform' => 'whatsapp', 'label' => 'WhatsApp', 'icon_class' => 'fab fa-whatsapp', 'display_order' => 7],
            ['platform' => 'telegram', 'label' => 'Telegram', 'icon_class' => 'fab fa-telegram-plane', 'display_order' => 8],
        ];

        foreach ($defaults as $row) {
            $exists = DB::table('social_links')
                ->where('platform', $row['platform'])
                ->exists();

            if (!$exists) {
                DB::table('social_links')->insert(array_merge($row, [
                    'url' => null,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]));
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('social_links');
    }
};