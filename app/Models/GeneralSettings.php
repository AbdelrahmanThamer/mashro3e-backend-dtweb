<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model {

    use HasFactory;

    protected $primaryKey = "id";
    protected $fillable = ['settings_key', 'settings_value'];

    public function updateOrCreate()
    {
        return true;
    }

}
