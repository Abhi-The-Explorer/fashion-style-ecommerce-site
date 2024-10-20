<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the site_settings table first
        Schema::create('site_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key')->unique(); // Ensure the 'key' column is defined and unique
            $table->text('value');
            $table->timestamps();
        });

        // Insert default settings
        $settings = [
            ['key' => 'header_logo', 'value' => ''],
            ['key' => 'footer_logo', 'value' => ''],
            ['key' => 'contact_number', 'value' => ''],
            ['key' => 'copyright', 'value' => ''],
        ];
    
        foreach ($settings as $setting) {
            if (!DB::table('site_settings')->where('key', $setting['key'])->exists()) {
                DB::table('site_settings')->insert($setting);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}
