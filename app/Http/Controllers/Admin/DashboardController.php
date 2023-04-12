<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class DashboardController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        if(chack_app_list() && session::get('app_key')){

            $params['totalUsers'] = \App\Models\User::where('role', '!=', 1)->where('app_id', session::get('app_key'))->count();
            $params['totalMenu'] = \App\Models\Menus::where('app_id', session::get('app_key'))->count();
            $params['totalIntroScreen'] = \App\Models\IntroductionScreens::where('app_id', session::get('app_key'))->count();
            $params['users'] = \App\Models\User::where('role', '!=', 1)->where('app_id', session::get('app_key'))->orderBy('id', 'desc')->limit(10)->get();
            $params['data'] = [];
            $params['app'] = \App\Models\App::orderBy('id', 'desc')->where('app_key', session::get('app_key'))->get();
            return view('admin.dashboard', $params);
        } else {
            return redirect()->route('admin.app.add')->with('error', 'No Any App So First Create on your App!!!');
        }
    }

}
