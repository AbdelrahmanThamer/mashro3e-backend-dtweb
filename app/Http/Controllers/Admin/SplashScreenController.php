<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SplashScreens;
use DataTables;
use Session;

class SplashScreenController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        $params['data'] = []; // SplashScreens::paginate(3);
        if ($request->ajax()) {
            $data = SplashScreens::where('app_id',session::get('app_key'))->get();
            return Datatables::of($data)->addIndexColumn()
                            ->editColumn('required_splash_screen', function ($row) {

                                return $row->required_splash_screen;
                            })
                            ->editColumn('status', function ($row) {
                                if ($row->status == 1) {
                                    return "Active";
                                }
                                return "Inactive";
                            })
                            ->editColumn('splash_logo', function ($row) {
                                if ($row->splash_logo) {
                                    return '<img src="' . url('/') . '/' . $row->splash_logo . '" height="50">';
                                }
                                return "-";
                            })
                            ->editColumn('splash_image_or_color', function ($row) {
                                if ($row->splash_image_or_color == 1) {
                                    return '<img src="' . url('/') . '/' . $row->splash_background . '" height="50">';
                                }
                                return $row->splash_background;
                            })
                            ->addColumn('action', function ($row) {
                                $btn = '<a class="btn" href="' . route('admin.splash_screen.edit', [$row->id]) . '">';
                                $btn .= '<img src="' . url('/') . '/assets/imgs/edit.png" />';
                                $btn .= '</a>';
                                $btn .= '<a class="btn" href="' . route('admin.splash_screen.delete', [$row->id]) . '">';
                                $btn .= '<img src="' . url('/') . '/assets/imgs/trash.png" />';
                                $btn .= '</a>';
                                return $btn;
                            })
                            ->rawColumns(['action', 'splash_logo', 'splash_image_or_color'])
                            ->make(true);
        }
        return view('admin.splash_screen.index', $params);
    }

    public function add() {
        $params['data'] = [];
        return view('admin.splash_screen.add', $params);
    }

    public function edit($id) {
        $params['data'] = SplashScreens::where('id', $id)->first();
        return view('admin.splash_screen.add', $params);
    }

    public function delete($id) {
        $data = SplashScreens::where('id', $id)->first();
        @unlink(public_path() . "/" . $data->splash_logo);
        $data->delete();
        return redirect()->route('admin.splash_screen')->with('success', 'Data deleted successfully.');
    }

    public function save(Request $request) {
        
        if(chack_app_list() && session::get('app_key')){ 
            $requestData = $request->all();
            $requestData['required_splash_screen'] = $request->required_splash_screen ?? 0;
            if (isset($requestData['file']) && $requestData['file'] != 'undefined') {
                $files = $requestData['file'];
                $ext = $files->extension();
                $name = "images/" . rand() . time() . "." . $ext;
                $files->move('images', $name);
                $requestData['splash_logo'] = $name;
                $requestData['app_id'] = session::get('app_key');            
            }
            if ($request->splash_image_or_color == 1) {
                if (isset($requestData['file_color']) && $requestData['file_color'] != 'undefined') {
                    $files = $requestData['file_color'];
                    $ext = $files->extension();
                    $name = "images/" . rand() . time() . "." . $ext;
                    $files->move('images', $name);
                    $requestData['splash_background'] = $name;
                }
            } else {
                $requestData['splash_background'] = $request->splash_color ? $request->splash_color : NULL;
            }
            if (isset($requestData['id']) && $requestData['id'] != '') {
                $getImg = SplashScreens::where('id', $requestData['id'])->first();

                if (isset($requestData['file']) && $requestData['file'] != 'undefined') {
                    if ($getImg && $getImg->splash_logo) {
                        @unlink(public_path() . "/" . $getImg->splash_logo);
                    }
                }
                if ($request->splash_image_or_color == 1) {
                    if (isset($requestData['file_color']) && $requestData['file_color'] != 'undefined') {
                        if ($getImg && $getImg->splash_background) {
                            @unlink(public_path() . "/" . $getImg->splash_background);
                        }
                    }
                }
            }
            SplashScreens::updateOrCreate(['id' => $requestData['id']], $requestData);
            return redirect()->route('admin.splash_screen')->with('success', 'Data updated successfully.');
        } else {
            return redirect()->route('admin.app
            ')->with('error', 'Please Select App In Dropdown !!!');  
        }
    }

}
