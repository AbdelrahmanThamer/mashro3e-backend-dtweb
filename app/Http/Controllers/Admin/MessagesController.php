<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SplashScreens;
use DataTables;
use App\Models\Messages;
use App\Models\NotificationSetting;
use Session;

class MessagesController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        $params['data'] = []; // SplashScreens::paginate(3);
        if ($request->ajax()) {
            $data = Messages::where('app_id',session::get('app_key'))->get();
            return Datatables::of($data)->addIndexColumn()
                            ->editColumn('title', function ($row) {

                                return $row->title;
                            })
                            ->editColumn('message', function ($row) {

                                return $row->message;
                            })
                            ->editColumn('image', function ($row) {
                                if ($row->image) {
                                    return '<img src="' . url('/') . '/' . $row->image . '" height="50">';
                                }
                                return "-";
                            })
                            ->editColumn('url', function ($row) {
                                return $row->url ? $row->url : "-";
                            })
                            ->addColumn('action', function ($row) {
                                $btn = '<a class="btn" href="' . route('admin.messages.delete', [$row->id]) . '">';
                                $btn .= '<img src="' . url('/') . '/assets/imgs/trash.png" />';
                                $btn .= '</a>';
                                return $btn;
                            })
                            ->rawColumns(['action', 'image', 'url'])
                            ->make(true);
        }
        return view('admin.messages.index', $params);
    }

    public function add() {

        $params['data'] = NotificationSetting::where('app_id', session::get('app_key'))->first();        
        return view('admin.messages.add', $params);
    }

    public function edit($id) {
        $params['data'] = Messages::where('id', $id)->first();
        return view('admin.messages.add', $params);
    }

    public function delete($id) {
        $data = Messages::where('id', $id)->first();
        if($data->image){
            unlink(public_path(). "/" . $data->image);
        }
        $data->delete();
        return redirect()->route('admin.messages')->with('success', 'Data deleted successfully.');
    }

    public function save(Request $request) {

        if(chack_app_list() && session::get('app_key')){
            $requestData = $request->all();
            $filePath = "";
            if (isset($requestData['file']) && $requestData['file'] != 'undefined') {
                $files = $requestData['file'];
                $ext = $files->extension();
                $name = "images/" . rand() . time() . "." . $ext;
                $files->move('images', $name);
                $requestData['image'] = $name;
                $filePath = url("/") . "/" . $name;

            }

            Messages::updateOrCreate(['id' => $requestData['id']], $requestData);

            $noty = \App\Models\NotificationSetting::first();

            $ONESIGNAL_APP_ID = $noty->notification_app_id;
            $ONESIGNAL_REST_KEY = $noty->app_key;

            $content = array(
                "en" => $requestData['message']
            );

            $fields = array(
                'app_id' => $ONESIGNAL_APP_ID,
                'included_segments' => array('All'),
                 'data' => array("foo" => "bar"),
                'headings' => array("en" => $requestData['title']),
                'contents' => $content,
                'image' => $filePath
            );

            $fields = json_encode($fields);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                'Authorization: Basic ' . $ONESIGNAL_REST_KEY));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            $response = curl_exec($ch);
            // pre($response);
            curl_close($ch);
            $res = array('status' => '200', 'message' => 'Notification send sucessfully');
            // echo json_encode($res);

            return redirect()->route('admin.messages')->with('success', 'Data updated successfully.');
        } else {
            return redirect()->route('admin.app')->with('error', 'Please Select App In Dropdown !!!');  
        }
    }

}
