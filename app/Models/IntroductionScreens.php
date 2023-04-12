<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroductionScreens extends Model {

    use HasFactory;

    protected $table = 'introducation_screens';
    protected $primaryKey = "id";
    protected $fillable = ['title', 'description', 'image', 'status', 'app_id'];

}
