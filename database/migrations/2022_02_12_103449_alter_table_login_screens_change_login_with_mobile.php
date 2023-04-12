<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableLoginScreensChangeLoginWithMobile extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('login_screens', function (Blueprint $table) {
            $table->string('login_with_mobile')->change();
            $table->string('login_with_gmail')->change();
            $table->string('login_with_facebook')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
