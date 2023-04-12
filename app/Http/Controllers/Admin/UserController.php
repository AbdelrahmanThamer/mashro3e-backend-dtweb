<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SplashScreens;
use DataTables;
use App\Models\User;
use Hash;
use Auth;
use Session;

class UserController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        $params['data'] = []; // SplashScreens::paginate(3);
        if ($request->ajax()) {
            $data = User::where('app_id',session::get('app_key'))->get();
            $data->where('role', '!=', 1);
            return Datatables::of($data)->addIndexColumn()
                            ->editColumn('username', function ($row) {
                                return $row->username;
                            })
                            ->editColumn('email', function ($row) {
                                return $row->email;
                            })
                            ->editColumn('type', function ($row) {
                                return $row->type;
                            })
                            ->editColumn('created_at', function ($row) {
                                return date('d-M-Y h:i A', strtotime($row->created_at));
                            })
                            ->addColumn('action', function ($row) {
                                $btn = '<a class="btn" href="' . route('admin.users.delete', [$row->id]) . '">';
                                $btn .= '<img src="' . url('/') . '/assets/imgs/trash.png" />';
                                $btn .= '</a>';
                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('admin.user.index', $params);
    }

    public function delete($id) {
        User::where('id', $id)->delete();
        return redirect()->route('admin.users')->with('success', 'Data deleted successfully.');
    }

    public function changePassword(Request $request) {
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        \Session::put('success', "Password changed successfully.");
        return redirect()->route("admin.settings");
    }


}
