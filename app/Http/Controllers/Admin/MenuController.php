<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menus;
use Session;

class MenuController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $params['data'] = Menus::where('app_id', session::get('app_key'))->get();
        return view('admin.menu.index', $params);
    }

    public function add() {
        $count = Menus::where('app_id', session::get('app_key'))->count();
        if ($count >= 5) {
            return redirect()->route('admin.menu')->with('error', 'You can add maximum 5 menus.');
        }
        $params['data'] = [];
        return view('admin.menu.add', $params);
    }

    public function edit($id) {
        $params['data'] = Menus::where('id', $id)->first();
        return view('admin.menu.add', $params);
    }

    public function delete($id) {
        $data = Menus::where('id', $id)->first();
        @unlink(public_path(). "/" . $data->image);
        $data->delete();
        return redirect()->route('admin.menu')->with('success', 'Data deleted successfully.');
    }

    public function save(Request $request) {

        if(chack_app_list() && session::get('app_key')){

            $requestData = $request->all();
            if (isset($requestData['file']) && $requestData['file'] != 'undefined') {
                $files = $requestData['file'];
                $ext = $files->extension();
                $name ="images/". rand() . time() . "." . $ext;
                $files->move('images', $name);
                $requestData['image'] = $name;
                $requestData['app_id'] = Session::get('app_key');  
            }
            if (isset($requestData['id']) && $requestData['id'] != '') {
                $getImg = Menus::where('id', $requestData['id'])->first();
                if (isset($requestData['file']) && $requestData['file'] != 'undefined') {
                    if ($getImg && $getImg->image) {
                        @unlink(public_path() . "/" . $getImg->image);
                    }
                }
            }
            Menus::updateOrCreate(['id' => $requestData['id']], $requestData);
            return redirect()->route('admin.menu')->with('success', 'Data updated successfully.');
        } else {
            return redirect()->route('admin.app')->with('error', 'Please Select App In Dropdown !!!');  
        }
    }

}
