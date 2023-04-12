<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppConfigrations;
use App\Models\LoginScreens;
use App\Models\App;
use App\Models\SmtpSetting;
use App\Models\GeneralSettings;
use App\Models\NotificationSetting;
use Session;
use Illuminate\Support\Str;

class SettingController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $params['data'] = LoginScreens::where('app_id',session::get('app_key'))->first();
        $params['setting'] = AppConfigrations::where('app_id',session::get('app_key'))->first();
        $params['notification'] = NotificationSetting::where('app_id',session::get('app_key'))->first();
      
        return view('admin.settings', $params);
    }

    public function save(Request $request) {
        
        if(chack_app_list() && session::get('app_key')){

            $requestData = $request->all();
            $requestData['app_name'] =  isset($requestData['app_name']) ?  $requestData['app_name']: '';
            $requestData['side_drawer'] =  isset($requestData['side_drawer']) ?  $requestData['side_drawer']: '';
            $requestData['bottom_navigation'] =  isset($requestData['bottom_navigation']) ? $requestData['bottom_navigation'] : '';
            $requestData['full_screen'] =  isset($requestData['full_screen']) ? $requestData['full_screen'] : '';
            $requestData['pull_to_refresh'] = isset($requestData['pull_to_refresh']) ? $requestData['pull_to_refresh'] : '';
            $requestData['introduction_screen'] = isset($requestData['introduction_screen']) ? $requestData['introduction_screen'] : '';
            $requestData['floating_menu_screen'] = isset($requestData['floating_menu_screen']) ? $requestData['floating_menu_screen'] : '';
            
            if(isset($requestData['app_name'])){
                $update = App::where('app_key',$requestData['app_id'])->first();
                $update->app_name = $requestData['app_name'];
            }
    
            if(isset($requestData['file']) && $requestData['file'] != 'undefined' ){
                $files = $requestData['file'];
                $ext = $files->extension();
                $name = "images/" . rand() . time() . "." . $ext;
                $files->move('images', $name);
                $requestData['app_logo'] = $name;
                
                $update->app_icon = $name;
                
                if (isset($requestData['id']) || !is_null($requestData['id']) || $requestData['id'] != "") {
                    $getImg = AppConfigrations::where('id', $requestData['id'])->first();
                    if (isset($requestData['file']) && $requestData['file'] != 'undefined') {
                        if ($getImg && $getImg->app_logo) {
                            @unlink(public_path() . "/" . $getImg->app_logo);
                        }
                    }
                }
                
            } else{
                $requestData['app_logo'] = $requestData['old_imag'];
            }
            $update->save();
            AppConfigrations::updateOrCreate(['id' => $requestData['id']], $requestData);
            return redirect()->route('admin.settings')->with('success', 'Settings updated successfully.');

        } else {
            return redirect()->route('admin.app')->with('error', 'Please App Select. If no Any App So Create App !!!');  
        }

    }

    public function notification(Request $request) {

        if(chack_app_list()  && session::get('app_key')){

            $requestData = $request->all();
            unset($requestData['_token']);

            if (isset($requestData['id']) && $requestData['id'] != '') {
                $update = NotificationSetting::where('id', $requestData['id'])->first();
                $update->app_id = $requestData['app_id'];
                $update->notification_app_id = $requestData['notification_app_id'];
                $update->app_key = $requestData['app_key'];
                $update->save();
            }
            return redirect()->route('admin.settings')->with('success', 'Data updated successfully.');
        } else {
            return redirect()->route('admin.app')->with('error', 'Please App Select. If no Any App So Create App !!!');  
        }
    }

    public function save_general_settings(Request $request) {
        
        if(chack_app_list() && session::get('app_key')){

            $requestData = $request->all();
            // dd($requestData);
            unset($requestData['_token']);    
            
            foreach ($requestData as $key => $value) {
                if($value != null){
                    GeneralSettings::where('app_id', session::get('app_key'))->where('settings_key',$key)->update(['settings_value'=>$value]);                
                } 
            }
            
            return redirect()->route('admin.settings')->with('success', 'Settings updated successfully.');
        } else {
            return redirect()->route('admin.app')->with('error', 'Please App Select. If no Any App So Create App !!!');  
        }
    }

    public function smtpindex(){

        $smtp = SmtpSetting::select('*')->where('app_id',session::get('app_key'))->first();
        return view('admin.smtp',['smtp'=>$smtp]);
    }

    public function smtp(Request $request){

        if(chack_app_list() && session::get('app_key')){

            $smtp = SmtpSetting::where('id',$request->id)->first();
            if(isset($smtp->id)){

                $smtp->protocol = $request->protocol;
                $smtp->host = $request->host;
                $smtp->port = $request->port;
                $smtp->user = $request->user;
                $smtp->pass = $request->pass;
                $smtp->from_name = $request->from_name;
                $smtp->from_email = $request->from_email;
                $smtp->status = $request->status;
                $smtp->save();
                return redirect()->route('admin.settings')->with('success', 'Data Update Successfully.');
            } else{
                
                $smtp = new SmtpSetting();
                $smtp->app_id = $request->app_id;
                $smtp->protocol = $request->protocol;
                $smtp->host = $request->host;
                $smtp->port = $request->port;
                $smtp->user = $request->user;
                $smtp->pass = $request->pass;
                $smtp->from_name = $request->from_name;
                $smtp->from_email = $request->from_email;
                $smtp->status = $request->status;
                $smtp->save();
                return redirect()->route('admin.settings')->with('success', 'Data Save Successfully.');
            }   
        } else {
            return redirect()->route('admin.app')->with('error', 'Please App Select. If no Any App So Create App !!!');  
        }    
    }

}