<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginScreens extends Model {

    use HasFactory;

    protected $primaryKey = "id";
    protected $fillable = ['login_with_mobile', 'login_with_gmail', 'login_with_facebook','is_login','app_id'];

}
