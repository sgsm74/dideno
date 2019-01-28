<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('about');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('telegram');
            $table->string('twitter');
            $table->timestamps();
        });
        DB::table('setting')->insert(
        array(
            'title' => 'گروه آموزشی دیدنو',
            'about' => 'درباره ما',
            'phone' => '09123456789',
            'address' => 'کرمانشاه',
            'email' => 'info@dideno.ir',
            'facebook' => 'http://facebook.com',
            'instagram' => 'http://instagram.com',
            'telegram' => 'http://telegram.com',
            'twitter' => 'http://twitter.com',
        )
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting');
    }
}
