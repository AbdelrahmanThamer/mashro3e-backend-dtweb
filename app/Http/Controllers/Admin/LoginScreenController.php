<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoginScreens;
use Session;

class LoginScreenController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $params['data'] = LoginScreens::where('app_id',session::get('app_key'))->first();
        if ($params['data'] == null) {
            $params['data'] = LoginScreens::where('app_id', "0")->first();
        } 

        $params['data'] = LoginScreens::first();
        return view('admin.login_screen', $params);
    }

    public function save(Request $request) {
        if(chack_app_list() && session::get('app_key')){

            $requestData = $request->all();
            
            if($requestData['app_id'] == "0"){

                $data = new LoginScreens();
                if(session::get('app_key')){
                    $data->app_id = session::get('app_key');
                } else {
                    return redirect()->route('admin.settings')->with('error', 'No any App so, First Create your App !!!');
                }
                $data->is_login = $request->is_login;
                $data->login_with_mobile = $request->login_with_mobile;
                $data->login_with_gmail = $request->login_with_gmail;
                $data->login_with_facebook = $request->login_with_facebook;

                if($data->save())
                {
                    return redirect()->route('admin.settings')->with('success', 'Data updated successfully.');
                } 
            } else {
                
                $requestData['is_login'] = $request->is_login ?? "OFF";
                $requestData['login_with_mobile'] = $request->login_with_mobile ?? "OFF";
                $requestData['login_with_gmail'] = $request->login_with_gmail ?? "OFF";
                $requestData['login_with_facebook'] = $request->login_with_facebook ?? "OFF";
                LoginScreens::updateOrCreate(['app_id' => $requestData['app_id']], $requestData);
                return redirect()->route('admin.settings')->with('success', 'Data updated successfully.');
            } 
        } else {
            return redirect()->route('admin.app')->with('error', 'Please App Select. If no Any App So Create App !!!');  
        }
    }

}
