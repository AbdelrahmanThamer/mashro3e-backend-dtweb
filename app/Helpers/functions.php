<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
date_default_timezone_set("Asia/Kolkata");

function adminEmails() {
    return $emails = \App\Models\User::where('role', 1)->pluck('email')->toArray();
}

function supportEmails() {
    return $emails = \App\Models\User::where('role', 1)->pluck('email')->toArray();
}

function chack_app_list() {
    return $app = \App\Models\App::count();
}

function getGeneralSettings() {
    $general_settings = \App\Models\GeneralSettings::where('app_id',session::get('app_key'))->get();
    
    $data = [];

    foreach ($general_settings as $key => $value) {
       $data[$value->settings_key] = $value->settings_value;                
    }
    return $data;
}

function create_settingKey($app_key){

    $data = [
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"banner_ad", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"interstital_ad", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"reward_ad", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"banner_adid", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"interstital_adid", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"reward_adid", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"interstital_adclick", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"reward_adclick", 'created_at'=>date("Y-m-d H:i:s")],

        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"ios_banner_ad", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"ios_interstital_ad", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"ios_reward_ad", 'created_at'=>date("Y-m-d H:i:s")],        
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"ios_banner_adid", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"ios_interstital_adid", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"ios_interstital_adclick", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"ios_reward_adclick", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"ios_reward_adid", 'created_at'=>date("Y-m-d H:i:s")],
        
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"native_status", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"banner_status", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"interstiatial_status", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"native_key", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"banner_key", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"interstiatial_key", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"rewardvideo_status", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"native_full_status", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"rewardvideo_status_key", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"native_full_key", 'created_at'=>date("Y-m-d H:i:s")],

        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"ios_native_status", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"ios_banner_status", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"ios_interstiatial_status", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"ios_native_key", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"ios_banner_key", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"ios_interstiatial_key", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"ios_rewardvideo_status", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "0", 'settings_key'=>"ios_native_full_status", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"ios_rewardvideo_status_key", 'created_at'=>date("Y-m-d H:i:s")],        
        ['app_id'=> $app_key, 'settings_value'=> "", 'settings_key'=>"ios_native_full_key", 'created_at'=>date("Y-m-d H:i:s")],
    ];
    \App\Models\GeneralSettings::insert($data); 

}

function create_app_configrations($app_key,$app_name,$name){    
    $data = [
                'app_id'=> $app_key,
                'app_name'=> $app_name,
                'app_logo'=> $name,
                'full_screen'=> "",
                'side_drawer'=> "Side Drawer",
                'bottom_navigation'=> "Bottom Navigation",
                'base_url'=> "https://www.google.com/",
                'primary'=> "#199fff",
                'primary_dark'=> "#098deb",
                'accent'=> "#ffffff",
                'pull_to_refresh'=> "0",
                'introduction_screen'=>"0",
                'floating_menu_screen'=>"0",
                'created_at'=>date("Y-m-d H:i:s")
            ];

    \App\Models\AppConfigrations::insert($data); 
}

function create_app_smtp_setting($app_key){    
    $data = [
                'app_id'=> $app_key,
                'protocol'=> "smtp123",
                'host'=>"ssl://smtp.gmail.com",
                'port'=>"123",
                'user'=>"admin@admin.com",
                'pass'=>"admin",
                'from_name'=>"DivineTechs",
                'from_email'=>"admin@admin.com",
                'created_at'=>date("Y-m-d H:i:s")
            ];

    \App\Models\SmtpSetting::insert($data); 
}

function create_app_notification($app_key){    
    $data = [
                'app_id'=> $app_key,
                'notification_app_id'=> "",
                'app_key'=>"",
                'created_at'=>date("Y-m-d H:i:s")
            ];

    \App\Models\NotificationSetting::insert($data); 
}

function create_floating_menu($app_key){
    
    $data = [
        ['app_id'=> $app_key, 'name'=> "", 'link'=>"",'status'=>0, 'image'=>"", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'name'=> "", 'link'=>"",'status'=>0, 'image'=>"", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'name'=> "", 'link'=>"",'status'=>0, 'image'=>"", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'name'=> "", 'link'=>"",'status'=>0, 'image'=>"", 'created_at'=>date("Y-m-d H:i:s")],
        ['app_id'=> $app_key, 'name'=> "", 'link'=>"",'status'=>0, 'image'=>"", 'created_at'=>date("Y-m-d H:i:s")]
    ];
    \App\Models\FloatingMenu::insert($data); 

}

function create_login_screens($app_key){
    
    $data = [
        'app_id'=> $app_key,
        'is_login'=> "OFF",
        'login_with_mobile'=>"OFF",
        'login_with_gmail'=>"OFF",
        'login_with_facebook'=>"OFF",
        'created_at'=>date("Y-m-d H:i:s")
    ];
    \App\Models\LoginScreens::insert($data); 

}

function delete_related_all_data($app_key){
    
    \App\Models\LoginScreens::where('app_id',$app_key)->delete();
    \App\Models\NotificationSetting::where('app_id',$app_key)->delete();
    \App\Models\SmtpSetting::where('app_id',$app_key)->delete();
    \App\Models\GeneralSettings::where('app_id',$app_key)->delete();
    \App\Models\User::where('app_id',$app_key)->delete();
    \App\Models\AppConfigrations::where('app_id',$app_key)->delete();
    
    $floating = \App\Models\FloatingMenu::where('app_id',$app_key)->get();
    foreach ($floating as $key => $value) {
        @unlink(public_path(). "/" . $value->image);
    }
    $intro = \App\Models\IntroductionScreens::where('app_id',$app_key)->get();
    foreach ($intro as $key => $value) {
        @unlink(public_path(). "/" . $value->image);
    }
    $intro->each->delete();

    $menu = \App\Models\Menus::where('app_id',$app_key)->get();
    foreach ($menu as $key => $value) {
        @unlink(public_path(). "/" . $value->image);
    }
    $menu->each->delete();

    $message = \App\Models\Messages::where('app_id',$app_key)->get();
    foreach ($message as $key => $value) {
        @unlink(public_path(). "/" . $value->image);
    }
    $message->each->delete();

    $social = \App\Models\SocialShare::where('app_id',$app_key)->get();
    foreach ($social as $key => $value) {
        @unlink(public_path(). "/" . $value->icon);
    }
    $social->each->delete();

    $splash = \App\Models\SplashScreens::where('app_id',$app_key)->get();
    foreach ($splash as $key => $value) {
        @unlink(public_path(). "/" . $value->splash_logo);
    }
    $splash->each->delete();

}

function version() {
    return "1.0.0";
}

function pre($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit;
}

function str_slug($title) {
    return Str::slug($title, '-');
}

function statusCode0($message) {
    return [
        'data' => array(),
        'status' => 0,
        'message' => $message
    ];
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function base64Encode($value) {
    return base64_encode(base64_encode($value));
}

function base64Decode($value) {
    return base64_decode(base64_decode($value));
}

function numberFormat($value) {
    $val = (float) str_replace(",", "", $value);
    $val = number_format($val, 2);
    $val = str_replace(",", "", $val);
    return $val;
}

function parseDateTimeFormat($date) {
    return date('m/d/Y h:i A', strtotime($date));
}

function parseDateFormat($date) {
    return date('m/d/Y', strtotime($date));
}

function parseTimeFormat($date) {
    return date('h:i A', strtotime($date));
}

function padZero($no) {
    $no = str_pad($no, 2, '0', STR_PAD_LEFT);
    return $no;
}

function formatBytes($size, $precision = 2) {
    $base = log($size, 1024);
    $suffixes = array('', 'K', 'M', 'G', 'T');
    return [round(pow(1024, $base - floor($base)), $precision), $suffixes[floor($base)]];
}

function getAppNameTop() {
    $result = \App\Models\App::all();
    return $result;
}