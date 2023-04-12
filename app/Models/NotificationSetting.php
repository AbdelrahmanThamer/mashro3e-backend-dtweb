<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationSetting extends Model {

    use HasFactory;

    protected $table = 'notification_settings';
    protected $primaryKey = "id";
    protected $fillable = ['app_id', 'onesignal_app_id', 'onesignal_rest_key'];


    public function updateOrCreate()
    {
    	return true;
    }

}
