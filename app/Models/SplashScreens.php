<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SplashScreens extends Model {

    use HasFactory;

    protected $primaryKey = "id";
    protected $fillable = ['app_id','required_splash_screen', 'title', 'title_color', 'splash_logo', 'splash_image_or_color', 'splash_background', 'status'];

}
