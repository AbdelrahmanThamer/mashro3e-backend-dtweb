<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialShare extends Model
{
    use HasFactory;

    protected $table = 'social_share';
    protected $primaryKey = "id";
    protected $fillable = ['name', 'icon', 'app_id'];
}
