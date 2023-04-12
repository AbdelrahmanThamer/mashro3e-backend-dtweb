<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppConfigrations extends Model {

    use HasFactory;

    protected $primaryKey = "id";
    protected $fillable = ['app_name', 'app_id', 'app_logo', 'navigation_style','base_url','primary_dark','primary','accent','side_drawer','bottom_navigation','full_screen','pull_to_refresh','introduction_screen','floating_menu_screen'];

}
