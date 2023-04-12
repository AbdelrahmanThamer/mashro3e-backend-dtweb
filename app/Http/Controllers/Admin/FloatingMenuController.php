<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FloatingMenu;
use Illuminate\Http\Request;
use Session;

class FloatingMenuController extends Controller
{
    public function index(Request $request)
    {
        $menu = FloatingMenu::where('app_id', session::get('app_key'))->get();
        
        if (count($menu) > 0) {
            return view('admin.floating_menu.index', ['result' => $menu]);
        } else {
            return view('admin.floating_menu.index', ['result' => []]);
        }
    }

    public function save(Request $request)
    {
        try {

            if(chack_app_list() && session::get('app_key')){

                $requestData = $request->all();
                $menu = FloatingMenu::select('*')->where('app_id', session::get('app_key'))->get();
                if($menu){

                    $setting = FloatingMenu::where('id', $menu[0]->id)->first();
                    if (isset($setting->id)) {
                        if ($request->N_1 == null) {
                            $setting->name = "";
                        } else {
                            $setting->name = $request->N_1;
                        }
                        if ($request->L_1 == null) {
                            $setting->link = "";
                        } else {
                            $setting->link = $request->L_1;
                        }
                        $setting->status = $request->S_1;
                        if(isset($requestData['image1']) && $requestData['image1'] != 'undefined') {
                            $files = $request->file('image1');
                            $ext = $files->extension();
                            $img_name1 ="images/". rand() . time() . "." . $ext;
                            $files->move('images', $img_name1);
                            @unlink(public_path() . "/" . $menu[0]->image);
                            
                            $setting->image = $img_name1;
                        } else {
                            $setting->image = $menu[0]->image;
                        }
                        $setting->save();
                    }
                    $setting1 = FloatingMenu::where('id', $menu[1]->id)->first();
                    if (isset($setting1->id)) {
                        if ($request->N_2 == null) {
                            $setting1->name = "";
                        } else {
                            $setting1->name = $request->N_2;
                        }
                        if ($request->L_2 == null) {
                            $setting1->link = "";
                        } else {
                            $setting1->link = $request->L_2;
                        }
                        $setting1->status = $request->S_2;
                        if (isset($requestData['image2']) && $requestData['image2'] != 'undefined') {
                            $files = $request->file('image2');
                            $ext = $files->extension();
                            $img_name2 ="images/". rand() . time() . "." . $ext;
                            $files->move('images', $img_name2);    
                            @unlink(public_path() . "/" . $menu[1]->image);

                            $setting1->image = $img_name2;
                        } else {
                            $setting->image = $menu[1]->image;
                        }
                        $setting1->save();
                    }
                    $setting2 = FloatingMenu::where('id', $menu[2]->id)->first();
                    if (isset($setting2->id)) {
                        if ($request->N_3 == null) {
                            $setting2->name = "";
                        } else {
                            $setting2->name = $request->N_3;
                        }
                        if ($request->L_3 == null) {
                            $setting2->link = "";
                        } else {
                            $setting2->link = $request->L_3;
                        }
                        $setting2->status = $request->S_3;
                        if (isset($requestData['image3']) && $requestData['image3'] != 'undefined') {
                            $files = $request->file('image3');
                            $ext = $files->extension();
                            $img_name3 ="images/". rand() . time() . "." . $ext;
                            $files->move('images', $img_name3);
                            @unlink(public_path() . "/" . $menu[2]->image);

                            $setting2->image = $img_name3;
                        } else {
                            $setting->image = $menu[2]->image;
                        }
                        $setting2->save();
                    }
                    $setting3 = FloatingMenu::where('id', $menu[3]->id)->first();
                    if (isset($setting3->id)) {
                        if ($request->N_4 == null) {
                            $setting3->name = "";
                        } else {
                            $setting3->name = $request->N_4;
                        }
                        if ($request->L_4 == null) {
                            $setting3->link = "";
                        } else {
                            $setting3->link = $request->L_4;
                        }
                        $setting3->status = $request->S_4;
                        if (isset($requestData['image4']) && $requestData['image4'] != 'undefined') {
                            $files = $request->file('image4');
                            $ext = $files->extension();
                            $img_name4 ="images/". rand() . time() . "." . $ext;
                            $files->move('images', $img_name4);
                            @unlink(public_path() . "/" . $menu[3]->image);

                            $setting3->image = $img_name4;
                        } else {
                            $setting->image = $menu[3]->image;
                        }
                        $setting3->save();
                    }
                    $setting4 = FloatingMenu::where('id', $menu[4]->id)->first();
                    if (isset($setting4->id)) {
                        if ($request->N_5 == null) {
                            $setting4->name = "";
                        } else {
                            $setting4->name = $request->N_5;
                        }
                        if ($request->L_5 == null) {
                            $setting4->link = "";
                        } else {
                            $setting4->link = $request->L_5;
                        }
                        $setting4->status = $request->S_5;
                        if (isset($requestData['image5']) && $requestData['image5'] != 'undefined') {
                            $files = $request->file('image5');
                            $ext = $files->extension();
                            $img_name5 ="images/". rand() . time() . "." . $ext;
                            $files->move('images', $img_name5);
                            @unlink(public_path() . "/" . $menu[4]->image);

                            $setting4->image = $img_name5;
                        } else {
                            $setting->image = $menu[4]->image;
                        }
                        $setting4->save();
                    }
                    return redirect()->route('admin.floating_menu')->with('success', 'Data updated successfully.');
                }
            } else {
                return redirect()->route('admin.app')->with('error', 'Please App Select. If no Any App So Create App !!!');  
            }
            
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
}
