<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\AppConfigrations;
use App\Models\LoginScreens;
use App\Models\SmtpSetting;
use App\Models\NotificationSetting;
use App\Models\GeneralSettings;
use App\Models\FloatingMenu;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Str;

class AppController extends Controller
{
    public function index(Request $request) {

        $params['data'] = [];
        if ($request->ajax()) {
            $data = App::query();
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('app_name', function ($row) {

                    return $row->app_name;
                })
                ->editColumn('app_icon', function ($row) {
                    if ($row->app_icon) {
                        return '<img src="' . url('/') . '/' . $row->app_icon . '" height="50" wi>';
                    }
                    return "-";
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn" href="' . route('admin.app.edit', [$row->id]) . '">';
                    $btn .= '<img src="' . url('/') . '/assets/imgs/edit.png" />';
                    $btn .= '</a>';
                    $btn .= '<a class="btn" href="' . route('admin.app.delete', [$row->id]) . '">';
                    $btn .= '<img src="' . url('/') . '/assets/imgs/trash.png" />';
                    $btn .= '</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'app_icon'])
                ->make(true);
        }
        return view('admin.app.index', $params);
    }

    public function add() {

        $params['data'] = [];
        return view('admin.app.add', $params);
    }

    public function save(Request $request) {

        $requestData = $request->all();
        // $requestData['icon'] = $request->icon ?? 0;
        if($requestData['id']){
            $update = AppConfigrations::where('app_id',$requestData['app_key'])->first();
            $update->app_name = $requestData['app_name'];
        }
        if (isset($requestData['file']) && $requestData['file'] != 'undefined') {
            $files = $requestData['file'];
            $ext = $files->extension();
            $name = "images/" . rand() . time() . "." . $ext;
            $files->move('images', $name);
            $requestData['app_icon'] = $name;
            
            if($requestData['id'] == null ){
                $requestData['app_key'] = str::random(16);
            }
            if($requestData['is_default'] == 1){
                
                App::query()->update(['is_default' => 0]);
                $requestData['is_default'] = 1;
            }
            if($requestData['id']){
                $update->app_logo = $name;
            }
        }
        if (isset($requestData['id']) && $requestData['id'] != '') {
            $getImg = App::where('id', $requestData['id'])->first();
            if (isset($requestData['file']) && $requestData['file'] != 'undefined') {
                if ($getImg && $getImg->app_icon) {
                    @unlink(public_path(). "/" . $getImg->app_icon);
                }
            }
            if($requestData['is_default'] == 1){
                App::query()->update(['is_default' => 0]);
                $requestData['is_default'] = 1;
            }
        }
        if($requestData['id']){
            $update->save();
            
            $update_app = App::where('id',$requestData['id'])->first();
            if($update_app->app_key == session::get('app_key')){
                Session::forget('app_key');  
                Session::forget('app_name');
            }
            
        }
        App::updateOrCreate(['id' => $requestData['id']], $requestData);
        if($requestData['id'] == null ){
            create_settingKey($requestData['app_key']);
            create_app_configrations($requestData['app_key'],$requestData['app_name'],$name);
            create_app_smtp_setting($requestData['app_key']);
            create_app_notification($requestData['app_key']);
            create_floating_menu($requestData['app_key']);
            create_login_screens($requestData['app_key']);

            $last_app = App::latest()->first();
            if($last_app){
                Session::put('app_key', $last_app->app_key);
                Session::put('app_name', $last_app->app_name);
            }
        }
        return redirect()->route('admin.app')->with('success', 'Data save successfully.');
    }

    public function edit($id) {
        $params['data'] = App::where('id', $id)->first();
        return view('admin.app.add', $params);
    }

    public function delete($id) {

        $data = App::where('id', $id)->first();
        
        if($data['is_default'] == 1){
            return redirect()->route('admin.app')->with('error', 'This App is Default App, You Not Deleted!!!');
        } else{

            @unlink(public_path(). "/" . $data->app_icon);
            delete_related_all_data($data->app_key); 

            $data->delete();
              
            Session::forget('app_key');  
            Session::forget('app_name');

            $data = app::select('*')->where('is_default',1)->first();
            if($data){
                Session::put('app_key', $data->app_key);
                Session::put('app_name', $data->app_name);
            } else {
                $data = app::select('*')->first();
                if($data){
                    Session::put('app_key', $data->app_key);
                    Session::put('app_name', $data->app_name);
                }
            }

            return redirect()->route('admin.app')->with('success', 'Data deleted successfully.');
        }
    }

    public function appSelect($app_key){
            
        $data = app::where('app_key', $app_key)->first();

        Session::put('app_key', $app_key);
        Session::put('app_name', $data->app_name);

        return back();   
    }

}
