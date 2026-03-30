<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('label')->nullable();
            $table->string('group')->default('general');
            $table->timestamps();
        });

        // Seed default values
        $defaults = [
            ['key' => 'meta_title',            'label' => 'Default Meta Title',       'group' => 'general',     'value' => 'PRK Immigration'],
            ['key' => 'meta_description',       'label' => 'Default Meta Description', 'group' => 'general',     'value' => 'PRK Immigration helps with visas, immigration consulting, and settlement support.'],
            ['key' => 'meta_keywords',          'label' => 'Default Meta Keywords',    'group' => 'general',     'value' => 'immigration, visa, canada immigration, prk immigration'],
            ['key' => 'meta_image',             'label' => 'Default OG Image URL',     'group' => 'general',     'value' => ''],
            ['key' => 'google_analytics_id',    'label' => 'Google Analytics ID (G-XXXXXXXXXX)', 'group' => 'analytics', 'value' => ''],
            ['key' => 'google_tag_manager_id',  'label' => 'Google Tag Manager ID (GTM-XXXXXXX)', 'group' => 'analytics', 'value' => ''],
            ['key' => 'facebook_pixel_id',      'label' => 'Facebook Pixel ID',        'group' => 'analytics',   'value' => ''],
            ['key' => 'fb_app_id',              'label' => 'Facebook App ID',           'group' => 'social',      'value' => ''],
            ['key' => 'twitter_handle',         'label' => 'Twitter / X Handle (@handle)', 'group' => 'social',  'value' => '@PRK_Immigration'],
            ['key' => 'google_site_verification', 'label' => 'Google Site Verification', 'group' => 'verification', 'value' => ''],
            ['key' => 'bing_site_verification',  'label' => 'Bing Site Verification',   'group' => 'verification', 'value' => ''],
            ['key' => 'custom_head_scripts',    'label' => 'Custom <head> Scripts',    'group' => 'advanced',    'value' => ''],
            ['key' => 'custom_body_scripts',    'label' => 'Custom <body> Scripts',    'group' => 'advanced',    'value' => ''],
        ];

        foreach ($defaults as $row) {
            DB::table('seo_settings')->insert(array_merge($row, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_settings');
    }
};
