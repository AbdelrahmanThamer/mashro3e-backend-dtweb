<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\AppConfigrations;
use JWTAuth;
use Illuminate\Http\Request;
use Validator;
use App\Models\LoginScreens;
use App\Models\SplashScreens;
use App\Models\Menus;
use App\Models\IntroductionScreens;
use App\Models\GeneralSettings;
use App\Models\SocialShare;
use App\Models\FloatingMenu;
use Illuminate\Support\Str;
use App\Services\PayUService\Exception;
use Session;

class UserController extends Controller {

    public function login(Request $request) {

        try{
            if ($request->type == 1) {
                
                $validation = Validator::make($request->all(), [
                        'email' => 'required',
                        'username' => 'required',
                        'type' => 'required',
                        'app_id' => 'required'
                ]); 
                if ($validation->fails()) {
                    return [
                        'status' => 400,
                        'message' => $validation->errors()->first(),
                        'result' => []
                    ];
                }
            } else {
                $validation = Validator::make($request->all(), [
                        'email' => 'required',
                        'username' => 'required',
                        'type' => 'required',
                        'app_id' => 'required'
                ]); 
                if ($validation->fails()) {
                    return [
                        'status' => 400,
                        'message' =>$validation->errors()->first(),
                        'result' => []
                    ];
                }
            }

            $email = $request->email;
            $username = $request->username;
            $type = $request->type;
            $password = "12345";


            if($request->type == 1){
                $checkUser = User::where('mobile', $email)->where('role',2)->where('app_id',$request->app_id)->first();
                if ($checkUser) {
                        $typeUser[] = User::select('id','app_id','mobile','username','email','type','role','created_at','updated_at')->where('email',$checkUser->email)->where('type',$type)->where('app_id',$request->app_id)->first();
                        if($typeUser){
                            $user = $typeUser;
                            $msg = "Login SuccessFully";
                            $status =200;
                        } else {
                            $user = [];
                            $msg = "Change Your Login Type";
                            $status =201;
                        }
                } else {

                    $user[] = User::create([
                        'app_id' => $request->app_id,
                        'username' => $username,
                        'mobile' => $email,
                        'email' => $email,
                        'type' => $type,
                        'password' => bcrypt($password),
                        'role' => 2
                    ]);   

                  
                    $status = 200;
                    $msg = "Register SuccessFully";
                }
                return [
                    'status' => $status,
                    'message' => $msg,
                    'result' => $user
                ];
                
            }else{

                $checkUser = User::where('email', $email)->where('role',2)->where('app_id',$request->app_id)->first();
                if ($checkUser) {
                        $typeUser[] = User::select('id','app_id','username','email','type','role','created_at','updated_at')->where('email',$checkUser->email)->where('type',$type)->where('app_id',$request->app_id)->first();
                        if($typeUser){
                            $user = $typeUser;
                            $msg = "Login SuccessFully";
                            $status =200;
                        } else {
                            $user = [];
                            $msg = "Change Your Login Type";
                            $status =201;
                        }
                } else {

                    $user[] = User::create([
                        'app_id' => $request->app_id,
                        'username' => $username,
                        'email' => $email,
                        'type' => $type,
                        'password' => bcrypt($password),
                        'role' => 2
                    ]);   
                    $status = 200;
                    $msg = "Register SuccessFully";
                }
                return [
                    'status' => $status,
                    'message' => $msg,
                    'result' => $user
                ];
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }  
    }

    public function getFloatingMenuList(Request $request){

        try {
            $validation = Validator::make($request->all(), [
                'app_id' => 'required',          
            ]); 
            if ($validation->fails()) {
                return [
                    'status' => 400,
                    'message' => "App Id is required",
                    'result' => []
                ];
            }
            $data = \App\Models\FloatingMenu::where('app_id',$request->app_id)->where('status','1')->get();
            $data->map(function ($item) {
                if ($item->image) {
                    $item->image = url("/") . "/" . $item->image;
                } else {
                    $item->image = "";
                }
                return $item;
            });

            if(count($data) > 0){
	            return [
	                'status' => 200,
	                'message' => "Get Record Successfully",
	                'result' => $data
	            ];
            }else
            {
            	return [
	                'status' => 400,
	                'message' => "Record Not Found",
	                'result' => []
	            ];
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }  
    }

    public function getSocialShareList(Request $request){

        try{
            $validation = Validator::make($request->all(), [
                'app_id' => 'required',          
            ]); 
            if ($validation->fails()) {
                return [
                    'status' => 400,
                    'message' => "App Id is required",
                    'result' => []
                ];
            }

            $data = \App\Models\SocialShare::where('app_id',$request->app_id)->get();
            $data->map(function ($item) {
                if ($item->icon) {
                    $item->icon = url("/") . "/" . $item->icon;
                } else {
                    $item->icon = "";
                }
                return $item;
            });


            if(count($data ) > 0 ){
	            return [
	                'status' => 200,
	                'message' => "Get Record Successfully",
	                'result' => $data
	            ];
	        }else
	        {
	        	return [
	                'status' => 400,
	                'message' => "Record Not Found",
	                'result' => []
	            ];
	        }
            
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }  
    }

    public function userLogout() {
        try {
            return ['status' => 1, 'message' => trans('Logout successfully.')];
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }  
    }

    public function getSettings(Request $request) {

        try{
            $validation = Validator::make($request->all(), [
                'app_id' => 'required',          
            ]); 
            if ($validation->fails()) {
                
                return [
                    'status' => 400,
                    'message' => "App Id is required",
                    'result' => []
                ];
            }

            $data = AppConfigrations::where('app_id',$request->app_id)->first();
            $dataL = LoginScreens::select('login_with_mobile', 'is_login', 'login_with_gmail', 'login_with_facebook')->where('app_id',$request->app_id)->first();

            if($data == null && $dataL == null){
            	$status = 400;
                $data = [];
            } else {
            	$status = 200;
                $data->is_login = $dataL->is_login;
                $data->login_with_mobile = $dataL->login_with_mobile;
                $data->login_with_gmail = $dataL->login_with_gmail;
                $data->login_with_facebook = $dataL->login_with_facebook;
                $data->app_logo = url("/") . "/" . $data->app_logo;
            }

            return [
                'status' => $status,
                'message' => "Get Record Successfully",
                'result' => [$data]
            ];

        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }  
    }

    public function getNotificationList(Request $request) {

        try{
            $validation = Validator::make($request->all(), [
                'app_id' => 'required',          
            ]); 
            if ($validation->fails()) {
                return [
                    'status' => 400,
                    'message' => "App Id is required",
                    'result' => []
                ];
            }

            $data = \App\Models\Messages::where('app_id',$request->app_id)->orderBy('id','desc')->get();
            $data->map(function ($item) {
                if ($item->image) {
                    $item->image = url("/") . "/" . $item->image;
                } else {
                    $item->image = "";
                }
                if($item->url == null){
                    $item->url = "";
                }
                return $item;
            });

            if(isset($data) > 0){
	            return [
	                'status' => 200,
	                'message' => "Get Record Successfully",
	                'result' => $data
	            ];
            }else
            {
            	return [
	                'status' => 400,
	                'message' => "Record Not Found",
	                'result' => []
	            ];
            }

        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }  
    }

    public function getSplashScreenList(Request $request) {

        try{
            $validation = Validator::make($request->all(), [
                'app_id' => 'required',          
            ]); 
            if ($validation->fails()) {                
                return [
                    'status' => 400,
                    'message' => "App Id is required",
                    'result' => []
                ];
            }

            $data = SplashScreens::where('app_id',$request->app_id)->get();
            $data->map(function ($item) {
                $item->splash_logo = url("/") . "/" . $item->splash_logo;
                if ($item->splash_image_or_color == 1) {
                    $item->splash_background = url("/") . "/" . $item->splash_background;
                }

                $item->splash_image_or_color = (int)$item->splash_image_or_color;
                $item->status = (int)$item->status;
                return $item;
            });


            if(count($data) > 0 ){	
	            return [
	                'status' => 200,
	                'message' => "Get Record Successfully",
	                'result' => $data
	            ];
			}else{				
	            return [
	                'status' => 400,
	                'message' => "Please add splash screen on admin panel",
	                'result' => []
	        	];
        	}

        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }  
    }

    public function getMenuList(Request $request) {
        
        try{
            $validation = Validator::make($request->all(), [
                'app_id' => 'required',          
            ]); 
            if ($validation->fails()) {
                
                return [
                    'status' => 400,
                    'message' => "App Id is required",
                    'result' => []
                ];
            }


            $data = Menus::where('app_id',$request->app_id)->get();
            $data->map(function ($item) {
                if ($item->image) {
                    $item->image = url("/") . "/" . $item->image;
                } else {
                    $item->image = "";
                }
                return $item;
            });

            if(count($data) > 0){
	            return [
	                'status' => 200,
	                'message' => "Get Record Successfully",
	                'result' => $data
	            ];
            }else
            {
            	return [
	                'status' => 400,
	                'message' => "Record Not Found",
	                'result' => []
	        	];
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }  
    }

    public function getIntroductionScreenList(Request $request) {

        try{
            $validation = Validator::make($request->all(), [
                'app_id' => 'required',          
            ]); 
            if ($validation->fails()) {
                
                return [
                    'status' => 400,
                    'message' => "App Id is required",
                    'result' => []
                ];
            }

            $data = IntroductionScreens::where('app_id', $request->app_id)->get();
            $data->map(function ($item) {
                $item->image = url("/") . "/" . $item->image;
                return $item;
            });
            $params['data'] = $data;

            if(count($data) > 0){
	            return [
	                'status' => 200,
	                'message' => "Get Record Successfully",
	                'result' => $data
	            ];
			}else{
	            return [
	                'status' => 400,
	                'message' => "Please add Introducation screen on admin panel",
	                'result' => []
	        	];
        	}

        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }  
    }

    public function generalSettings(Request $request) {        

        try {
            $data = GeneralSettings::select('id','settings_key','settings_value')->where('app_id', $request->app_id)->get();
                        	
            if(count($data)>0){
	            return [
	                'status' => 200,
	                'message' => "",
	                'result' => $data
	            ];
	        }else{
	        	return [
	                'status' => 400,
	                'message' => "Record Not Found",
	                'result' => []
	        	];
	        }

        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }  
    }

}
