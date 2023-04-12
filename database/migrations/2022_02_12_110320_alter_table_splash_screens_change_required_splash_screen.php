<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSplashScreensChangeRequiredSplashScreen extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('splash_screens', function (Blueprint $table) {
            $table->string('required_splash_screen')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('splash_screens', function (Blueprint $table) {
            //
        });
    }

}
