<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSplashScreensTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('splash_screens', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('required_splash_screen')->default(0);
            $table->string('title')->nullable();
            $table->string('title_color')->nullable();
            $table->string('splash_logo')->nullable();
            $table->tinyInteger('splash_image_or_color')->comment('1=Image,2=Color');
            $table->string('splash_background')->nullable();
            $table->enum('status', ['0', '1'])->default('0');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('splash_screens');
    }

}
