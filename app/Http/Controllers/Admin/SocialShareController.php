<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialShare;
use DataTables;
use Illuminate\Http\Request;
use Session;

class SocialShareController extends Controller
{
    public function index(Request $request)
    {

        $params['data'] = []; // SplashScreens::paginate(3);
        if ($request->ajax()) {
            $data = SocialShare::where('app_id',session::get('app_key'))->get();
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('name', function ($row) {

                    return $row->name;
                })
                ->editColumn('icon', function ($row) {
                    if ($row->icon) {
                        return '<img src="' . url('/') . '/' . $row->icon . '" height="50">';
                    }
                    return "-";
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn" href="' . route('admin.social_share.edit', [$row->id]) . '">';
                    $btn .= '<img src="' . url('/') . '/assets/imgs/edit.png" />';
                    $btn .= '</a>';
                    $btn .= '<a class="btn" href="' . route('admin.social_share.delete', [$row->id]) . '">';
                    $btn .= '<img src="' . url('/') . '/assets/imgs/trash.png" />';
                    $btn .= '</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'icon'])
                ->make(true);
        }
        return view('admin.social_share.index', $params);
    }

    public function add()
    {
        $params['data'] = [];
        return view('admin.social_share.add', $params);
    }

    public function save(Request $request){   
        if(chack_app_list() && session::get('app_key')){

            $requestData = $request->all();
            // $requestData['icon'] = $request->icon ?? 0;
            if (isset($requestData['file']) && $requestData['file'] != 'undefined') {
                $files = $requestData['file'];
                $ext = $files->extension();
                $name = "images/" . rand() . time() . "." . $ext;
                $files->move('images', $name);
                $requestData['icon'] = $name;
                $requestData['app_id'] = session::get('app_key');
            }
            if (isset($requestData['id']) && $requestData['id'] != '') {
                $getImg = SocialShare::where('id', $requestData['id'])->first();
                if (isset($requestData['file']) && $requestData['file'] != 'undefined') {
                    if ($getImg && $getImg->icon) {
                        @unlink(public_path(). "/" . $getImg->icon);
                    }
                }
            }
            SocialShare::updateOrCreate(['id' => $requestData['id']], $requestData);
            return redirect()->route('admin.social_share')->with('success', 'Data updated successfully.');
        } else {
            return redirect()->route('admin.app')->with('error', 'Please Select App In Dropdown !!!');  
        }
    }

    public function edit($id) {
        $params['data'] = SocialShare::where('id', $id)->first();
        return view('admin.social_share.add', $params);
    }

    public function delete($id) {
       $data = SocialShare::where('id', $id)->first();
        @unlink(public_path(). "/" . $data->icon);
        $data->delete();        
        return redirect()->route('admin.social_share')->with('success', 'Data deleted successfully.');
    }
}
