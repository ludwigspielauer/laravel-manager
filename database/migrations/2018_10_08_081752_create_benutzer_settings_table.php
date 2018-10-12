<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenutzerSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benutzer_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projekt_id')->unsigned();
            
            $table->integer('multiuser')->default(0);
            $table->integer('multiuser_comment')->default(0);

            $table->boolean('register_admin')->default(0);
            $table->boolean('register_self')->default(0);
            
            $table->boolean('secure_mailcheck')->default(0);
            $table->boolean('register_confirmmail')->default(0);
            
            $table->boolean('register_notification_mail')->default(0);
            $table->boolean('register_admin_dashboard')->default(0);
            
            $table->boolean('forget_password')->default(0);
            $table->boolean('change_password_admin')->default(0);
            
            $table->boolean('change_email_self')->default(0);
            $table->boolean('change_password_self')->default(0);
            $table->boolean('change_sonstige_self')->default(0);
            $table->string('change_sonstige_self_text')->nullable();
            
            $table->boolean('login_email')->default(0);
            $table->boolean('login_name')->default(0);
            $table->boolean('login_sonstige')->default(0);
            $table->string('login_sonstige_text')->default('');
            
            $table->integer('secure_max_login')->default(5);
            $table->integer('secure_lockout_sec')->default(300);
            $table->boolean('secure_ip')->default(0);

            
            $table->boolean('facebook')->default(0);
            $table->boolean('google')->default(0);
            $table->boolean('twitter')->default(0);
            $table->boolean('github')->default(0);
            $table->boolean('soundcloud')->default(0);
            $table->boolean('steam')->default(0);
            $table->boolean('pinterest')->default(0);
            $table->boolean('vimeo')->default(0);
            $table->boolean('lastfm')->default(0);
            $table->boolean('yahoo')->default(0);
            $table->boolean('vkontakte')->default(0);
            $table->boolean('spotify')->default(0);
            $table->boolean('linkedin')->default(0);
            $table->boolean('stumbleupon')->default(0);
            $table->boolean('tumblr')->default(0);
            $table->boolean('social_sonstige')->default(0);
            $table->string('social_sonstige_text')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benutzer_settings');
    }
}
