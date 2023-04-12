<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppIdToAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app', function(Blueprint $table) {
            $table->string('app_key')->after('id')->unique()->nullable();
        });
        Schema::table('app_configrations', function(Blueprint $table) {
            $table->string('app_id')->after('id');
        });
        Schema::table('floating_menu', function(Blueprint $table) {
            $table->string('app_id')->after('id');
        });
        Schema::table('introducation_screens', function(Blueprint $table) {
            $table->string('app_id')->after('id');
        });
        Schema::table('login_screens', function(Blueprint $table) {
            $table->string('app_id')->after('id');
        });
        Schema::table('menus', function(Blueprint $table) {
            $table->string('app_id')->after('id');
        });
        Schema::table('messages', function(Blueprint $table) {
            $table->string('app_id')->after('id');
        });
        Schema::table('social_share', function(Blueprint $table) {
            $table->string('app_id')->after('id');
        });
        Schema::table('splash_screens', function(Blueprint $table) {
            $table->string('app_id')->after('id');
        });
        Schema::table('users', function(Blueprint $table) {
            $table->string('app_id')->after('id');
        });
        Schema::table('general_settings', function(Blueprint $table) {
            $table->string('app_id')->after('id');
        });
        Schema::table('notification_settings', function(Blueprint $table) {
            $table->string('app_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all', function (Blueprint $table) {
            //
        });
    }
}
