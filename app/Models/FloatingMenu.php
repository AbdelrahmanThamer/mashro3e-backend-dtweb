<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloatingMenu extends Model
{
    use HasFactory;

    protected $table = 'floating_menu';
    protected $primaryKey = "id";
    protected $fillable = ['name', 'link','status','app_id','image'];
}
