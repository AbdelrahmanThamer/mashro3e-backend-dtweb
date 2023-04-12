<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IntroductionScreens;
use Session;

class IntroductionController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $params['data'] = IntroductionScreens::where('app_id',session::get('app_key'))->get();
        return view('admin.introduction.index', $params);
    }

    public function add() {
        $params['data'] = [];
        return view('admin.introduction.add', $params);
    }

    public function edit($id) {
        $params['data'] = IntroductionScreens::where('id', $id)->first();
        return view('admin.introduction.add', $params);
    }

    public function delete($id) {
       $data = IntroductionScreens::where('id', $id)->first();
        @unlink(public_path(). "/" . $data->image);
        $data->delete();
        return redirect()->route('admin.introduction')->with('success', 'Data deleted successfully.');
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
                $requestData['app_id'] = session::get('app_key');
            }
            if (isset($requestData['id']) && $requestData['id'] != '') {
                $getImg = IntroductionScreens::where('id', $requestData['id'])->first();
                if (isset($requestData['file']) && $requestData['file'] != 'undefined') {
                    if ($getImg && $getImg->image) {
                        @unlink(public_path() . "/" . $getImg->image);
                    }
                }
            }
            IntroductionScreens::updateOrCreate(['id' => $requestData['id']], $requestData);
            return redirect()->route('admin.introduction')->with('success', 'Data updated successfully.');
        } else{
            return redirect()->route('admin.app')->with('success', 'Please Select App In Dropdown !!!');           
        }
    }
}
