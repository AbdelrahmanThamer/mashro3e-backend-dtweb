<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model {

    use HasFactory;

    protected $primaryKey = "id";
    protected $fillable = ['data', 'included_segments','onesignal_app_id', 'title', 'message','image','url','app_id'];

}
