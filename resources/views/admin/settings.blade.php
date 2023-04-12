@extends('layout.page-app')
@section('content')
@include('layout.sidebar')
<div class="right-content">
    <header class="header">
        <div class="title-control">
            <button class="btn side-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a href="#">
                <img src="{{ url('/') }}/assets/imgs/logo.png" alt="" class="side-logo" />
            </a>
            <h1 class="page-title">Settings</h1>
        </div>
        <div class="head-control">
            @include('layout.header_setting')
        </div>
    </header>

    <div class="body-content">
        @include('message_error_success')
        @include('javascript_message_error_success')
        <!-- mobile title -->
        <h1 class="page-title-sm">Settings</h1>

        <ul class="nav nav-pills custom-tabs inline-tabs" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-settings-tab" data-toggle="pill" href="#pills-settings" role="tab"
                    aria-controls="pills-settings" aria-selected="true">App Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-password-tab" data-toggle="pill" href="#pills-password" role="tab"
                    aria-controls="pills-password" aria-selected="false">Change Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-noty-tab" data-toggle="pill" href="#noty-password" role="tab"
                    aria-controls="pills-password" aria-selected="false">Notification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-admob-tab" data-toggle="pill" href="#pills-admob" role="tab"
                    aria-controls="pills-admob" aria-selected="false">Admob</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" id="pills-facebook-tab" data-toggle="pill" href="#pills-facebook" role="tab"
                    aria-controls="pills-facebook" aria-selected="false">Facebook Ads</a>
            </li> -->
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-settings" role="tabpanel"
                aria-labelledby="pills-settings-tab">
                <div class="app-right-btn">
                    <a href="{{ route('admin.settings.smtp_index')}}" class="btn btn-default">Email Setting [SMTP]</a>
                </div>
                <br>
                <div class="card custom-border-card">
                    <h5 class="card-header">App Configrations</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <div class="col-2">
                                <label class="d-flex align-items-center ml-5">App ID</label>
                            </div>
                            <input type="text" readonly value="@if($setting){{session::get('app_key')}}@endif"
                                name="app_id" class="form-control" style="background-color:matte gray;" id="app_id">
                            <div class="input-group-prepend">
                                <div class="input-group-text btn" style="background-color:matte gray;" onclick="Function_App_id()">
                                    <img src="{{ url('/') }}/assets/imgs/copy.png" alt=""/>
                                </div> 
                            </div>
                        </div> 
                        <div class="input-group mt-5">
                            <div class="col-2">
                                <label class="d-flex align-items-center ml-5">API Path</label>
                            </div>
                            <input type="text" readonly value="{{url('/')}}/api/v1"
                                name="api_path" class="form-control" style="background-color:matte gray;" id="api_path">
                            <div class="input-group-prepend">
                                <div class="input-group-text btn" style="background-color:matte gray;" onclick="Function_Api_path()">
                                    <img src="{{ url('/') }}/assets/imgs/copy.png" alt=""/>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="card custom-border-card">
                    <h5 class="card-header">App Settings</h5>
                    <div class="card-body">

                        <form name="formSettings" id="formSettings" method="post" enctype="multipart/form-data"
                            action="{{ route('admin.settings.save') }}">
                            @csrf
                            <input type="hidden" name="id" value="@if($setting){{$setting->id}}@endif" class="form-control">
                            <input type="hidden" value="@if($setting){{session::get('app_key')}}@endif"
                                name="app_id" class="form-control">
                            <div class="form-group">
                                <label>App Name</label>
                                <input type="text" value="@if ($setting){{$setting->app_name}}@endif"
                                    name="app_name" class="form-control" placeholder="Enter app name">
                            </div>
                            <div class="form-group">
                                <label class="mb-1">App Image</label>
                                <p class="text-gray mt-0">Note: Image Size must be lessthan 2MB.Image Height and Width
                                    Maximum - 100x200</p>
                                <input type="file" id="fileupload" class="required" hidden name="file" />
                                <label for="fileupload" class="form-control file-control">
                                    <img src="{{ url('/') }}/assets/imgs/file-upload.png" alt="" />
                                    <span>Select app Name</span>
                                </label>
                                <div class="thumbnail-img" id="idMainLogo">
                                    @if ($setting && $setting->app_logo)
                                    <img id="idLogo" src="{{ url('/') }}/{{$setting->app_logo}}" />
                                    <input name="old_imag" type="text" hidden
                                        value="@if($setting->app_logo) {{$setting->app_logo}} @else($setting->app_icon) {{$setting->app_icon}}  @endif" />
                                    @elseif($setting && $setting->app_icon)
                                    <img id="idLogo" src="{{ url('/') }}/{{$setting->app_icon}}" />
                                    <input name="old_imag" type="text" hidden
                                        value="@if($setting->app_logo) {{$setting->app_logo}} @else($setting->app_icon) {{$setting->app_icon}}  @endif" />
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="form-group">
                                        <label>Navigation Style </label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="checkbox" id="side_drawer" name="side_drawer"
                                                    class="custom-control-input navigation_style" value="Side Drawer"
                                                    @if (!$setting) checked @endif @if ($setting &&
                                                    $setting->side_drawer == 'Side Drawer') checked @endif>
                                                <label class="custom-control-label" for="side_drawer">Side
                                                    Drawer</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="checkbox" id="bottom_navigation" name="bottom_navigation"
                                                    class="custom-control-input navigation_style"
                                                    value="Bottom Navigation" @if ($setting &&
                                                    $setting->bottom_navigation == 'Bottom Navigation') checked   @endif>
                                                <label class="custom-control-label" for="bottom_navigation">Bottom
                                                    Navigation</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="checkbox" id="full_screen" name="full_screen"
                                                    class="custom-control-input navigation_style" value="Full screen"
                                                    @if ($setting && $setting->full_screen == 'Full screen') checked
                                                @endif>
                                                <label class="custom-control-label" for="full_screen">Full
                                                    screen</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Primary Dark Color</label>
                                    <div class="form-group">
                                        <input type="text" id="primary_dark" name="primary_dark" class="form-control required" value="@if($setting){{$setting->primary_dark}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Primary Color</label>
                                    <div class="form-group">
                                        <input type="text" id="primary" name="primary" class="form-control required"value="@if($setting){{$setting->primary}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Accent Color</label>
                                    <div class="form-group">
                                        <input type="text" id="accent" name="accent" class="form-control required"  value="@if($setting){{$setting->accent}}@endif">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Base Url</label>
                                <input type="text" value="@if($setting){{$setting->base_url}}@endif" name="base_url"  class="form-control required" placeholder="Enter app name">
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Pull To Refresh</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="pull_to_refresh" name="pull_to_refresh"
                                                    class="custom-control-input" value="1" @if($setting){{$setting->pull_to_refresh == 1  ? 'checked' : ''}}@endif> 
                                                <label class="custom-control-label" for="pull_to_refresh">YES</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="pull_to_refresh1" name="pull_to_refresh"
                                                    class="custom-control-input" value="0" @if($setting){{$setting->pull_to_refresh == 0  ? 'checked' : ''}} @else checked  @endif>
                                                <label class="custom-control-label" for="pull_to_refresh1">NO</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Introduction Screen</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="introduction_screen" name="introduction_screen"
                                                    class="custom-control-input" value="1" @if($setting){{$setting->introduction_screen == 1  ? 'checked' : ''}}@endif> 
                                                <label class="custom-control-label" for="introduction_screen">YES</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="introduction_screen1" name="introduction_screen"
                                                    class="custom-control-input" value="0" @if($setting){{$setting->introduction_screen == 0  ? 'checked' : ''}} @else checked  @endif>
                                                <label class="custom-control-label" for="introduction_screen1">NO</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Folating Menu</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="floating_menu_screen" name="floating_menu_screen"
                                                    class="custom-control-input" value="1" @if($setting){{$setting->floating_menu_screen == 1  ? 'checked' : ''}}@endif> 
                                                <label class="custom-control-label" for="floating_menu_screen">YES</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="floating_menu_screen1" name="floating_menu_screen"
                                                    class="custom-control-input" value="0" @if($setting){{$setting->floating_menu_screen == 0  ? 'checked' : ''}} @else checked  @endif>
                                                <label class="custom-control-label" for="floating_menu_screen1">NO</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="text-right pt-3">
                                <button class="btn btn-default mw-120" type="submit">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card custom-border-card">
                    <h5 class="card-header">Login Screen</h5>
                    <div class="card-body">
                        <form name="formSettings" id="formSettings" method="post" enctype="multipart/form-data"
                            action="{{ route('admin.login_screen.save') }}">
                            @csrf
                            <input type="hidden" name="id" value="@if ($data) {{ $data->id }} @endif">
                            <input type="hidden" name="app_id" value="{{session::get('app_key')}}">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Login screen</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadioq3" name="is_login"
                                                    class="custom-control-input is_login" @if ($data) checked @endif
                                                    value="On" @if ($data && $data->is_login == 'On') checked @else checked @endif>
                                                <label class="custom-control-label" for="customRadioq3">On</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadioq4" name="is_login"
                                                    class="custom-control-input is_login" value="OFF" @if ($data && $data->is_login == 'OFF') checked @endif>
                                                <label class="custom-control-label" for="customRadioq4">OFF</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="idHide" style="display: @if($data && $data->is_login == 'OFF') none @endif">
                                <div class="row mt-3">
                                    <div class="col-4 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Login with Mobile Number</label>
                                            <div class="radio-group">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="Radio3" name="login_with_mobile"
                                                        class="custom-control-input" @if (!$data) checked @endif
                                                        value="On" @if($data && $data->login_with_mobile == 'On')
                                                    checked @endif>
                                                    <label class="custom-control-label" for="Radio3">On</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="Radio4" name="login_with_mobile"
                                                        class="custom-control-input" value="OFF" @if ($data &&
                                                        $data->login_with_mobile == 'OFF') checked @else @endif>
                                                    <label class="custom-control-label" for="Radio4">OFF</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                    <!-- <div class="row"> -->
                                    <div class="col-4 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Login with Gmail</label>
                                            <div class="radio-group">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio33" name="login_with_gmail"
                                                        class="custom-control-input" @if (!$data) checked @endif
                                                        value="On" @if ($data && $data->login_with_gmail == 'On')
                                                    checked @endif>
                                                    <label class="custom-control-label" for="customRadio33">On</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio44" name="login_with_gmail"
                                                        class="custom-control-input" value="OFF" @if ($data &&
                                                        $data->login_with_gmail == 'OFF') checked @endif>
                                                    <label class="custom-control-label" for="customRadio44">OFF</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div>
                                    <div class="row"> -->
                                    <div class="col-4 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Login with Facebook</label>
                                            <div class="radio-group">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio333" name="login_with_facebook"
                                                        class="custom-control-input" @if (!$data) checked @endif
                                                        value="On" @if ($data && $data->login_with_facebook == 'On')
                                                    checked @endif>
                                                    <label class="custom-control-label" for="customRadio333">On</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio444" name="login_with_facebook"
                                                        class="custom-control-input" value="OFF" @if ($data &&
                                                        $data->login_with_facebook == 'OFF') checked @endif>
                                                    <label class="custom-control-label" for="customRadio444">OFF</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right pt-3">
                                <button class="btn btn-default mw-120" type="submit">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-Premium-tab">
                <div class="card custom-border-card mt-3">
                    <h5 class="card-header">Change Password </h5>
                    <div class="card-body">
                        <form name="formChangePassword" id="formChangePassword" method="post"
                            action="{{ route('admin.change_password') }}">
                            @csrf
                            <input type="hidden" name="id" value="@if ($setting) {{ $setting->id }} @endif">
                            <input type="hidden" name="app_id" value={{ session::get('app_key') }}>
                            <div class="form-group">
                                <label class="">New password</label>
                                <input type="password" required="" class="form-control" id="new-password"
                                    placeholder="Enter new password" value="" name="new_password">
                            </div>
                            <div class="form-group">
                                <label class="">Confirm Password</label>
                                <input type="password" required="" class="form-control" id="new-password-2"
                                    placeholder="Enter confirm password" value="" name="new_password_repeat">
                            </div>
                            <div class="text-right pt-3">
                                <button type="submit" class="btn btn-default mw-120">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="noty-password" role="tabpanel" aria-labelledby="pills-Premium-tab">
                <div class="card custom-border-card mt-3">
                    <h5 class="card-header">Notification setting </h5>
                    <div class="card-body">
                        <form name="formNotification" id="formNotification" method="post"
                            action="{{ route('admin.notification') }}">
                            @csrf
                            <input type="hidden" name="id" value="@if($notification){{ $notification->id }}@endif">
                            <input type="hidden" name="app_id" value="@if($notification){{ $notification->app_id }}@endif">
                            <div class="form-group">
                                <label class="">ONESIGNAL APP ID</label>
                                <input type="text" class="form-control required"  placeholder="Enter Onesignal App ID" value="@if($notification){{$notification->notification_app_id}}@endif" name="notification_app_id">
                            </div>
                            <div class="form-group">
                                <label class="">ONESIGNAL REST KEY</label>
                                <input type="text" required="" class="form-control" placeholder="Enter Onesignal Rest Key" value="@if($notification){{$notification->app_key}}@endif"  name="app_key">
                            </div>
                            <div class="text-right pt-3">
                                <button type="submit" class="btn btn-default mw-120">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-admob" role="tabpanel" aria-labelledby="pills-admob-tab">

                <div class="card custom-border-card mt-3">
                    <h5 class="card-header">Android Settings</h5>
                    <div class="card-body">
                        <form name="formAdmob" id="formAdmob" method="post"
                            action="{{ route('admin.settings.save_general_settings') }}">
                            @csrf
                            <div class="row">
                                <?php
                                    $getGeneralSettings = getGeneralSettings();
                                ?>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Banner Ad</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="banner_ad" value="1"
                                                    class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['banner_ad'] == 1  ? 'checked' : ''}} @endif>
                                                <label class="custom-control-label" for="customRadio1">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="banner_ad" value="0"
                                                    class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['banner_ad'] == 0  ? 'checked' : ''}}  @else checked  @endif >
                                                <label class="custom-control-label" for="customRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Interstital Ad</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio3" name="interstital_ad" value="1" class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['interstital_ad'] == 1  ? 'checked' : ''}} @endif>
                                                <label class="custom-control-label" for="customRadio3">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio4" name="interstital_ad" value="0" class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['interstital_ad'] == 0  ? 'checked' : ''}} @else checked  @endif>
                                                <label class="custom-control-label" for="customRadio4">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Reward Ad</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio5" name="reward_ad" value="1" class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['reward_ad'] == 1  ? 'checked' : ''}} @endif>
                                                <label class="custom-control-label" for="customRadio5">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio6" name="reward_ad" value="0" class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['reward_ad'] == 0  ? 'checked' : ''}}  @else checked  @endif>
                                                <label class="custom-control-label" for="customRadio6">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="">Banner Ad ID</label>
                                        <input type="text" class="form-control" name="banner_adid"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['banner_adid']}}@endif" placeholder="Enter Banner Ad Id">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Interstital Ad ID</label>
                                        <input type="text" class="form-control" name="interstital_adid"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['interstital_adid']}}@endif" placeholder="Enter Interstital Ad Id">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Reward Ad ID</label>
                                        <input type="text" class="form-control" name="reward_adid"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['reward_adid']}}@endif" placeholder="Enter Reward Ad Id">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label></label>
                                        &nbsp;
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Interstital Ad Click</label>
                                        <input type="text" class="form-control" name="interstital_adclick"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['interstital_adclick']}}@endif" placeholder="Enter Interstital Ad Click">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Reward Ad Click</label>
                                        <input type="text" class="form-control" name="reward_adclick"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['reward_adclick']}}@endif" placeholder="Enter Reward Ad Click">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right pt-3">
                                <button class="btn btn-default mw-120">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card custom-border-card mt-3">
                    <h5 class="card-header">IOS Settings</h5>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.settings.save_general_settings') }}">
                            <div class="row">
                                @csrf
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Banner Ad</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio7" name="ios_banner_ad" value="1" @if($getGeneralSettings){{$getGeneralSettings['ios_banner_ad'] == 1  ? 'checked' : ''}}@endif class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio7">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio8" name="ios_banner_ad" value="0" @if($getGeneralSettings){{$getGeneralSettings['ios_banner_ad'] == 0  ? 'checked' : ''}}  @else checked  @endif class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio8">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Interstital Ad</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio9" name="ios_interstital_ad"
                                                    value="1" @if($getGeneralSettings){{$getGeneralSettings['ios_interstital_ad'] == 1  ? 'checked' : ''}}@endif class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio9">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio10" name="ios_interstital_ad"
                                                    value="0" @if($getGeneralSettings){{$getGeneralSettings['ios_interstital_ad'] == 0  ? 'checked' : ''}}  @else checked  @endif class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio10">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Reward Ad</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio11" name="ios_reward_ad" value="1" @if($getGeneralSettings){{$getGeneralSettings['ios_reward_ad'] == 1  ? 'checked' : ''}} @endif class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio11">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio12" name="ios_reward_ad" value="0" @if($getGeneralSettings){{$getGeneralSettings['ios_reward_ad'] == 0  ? 'checked' : ''}}  @else checked  @endif class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio12">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Banner Ad ID</label>
                                        <input type="text" class="form-control" name="ios_banner_adid"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['ios_banner_adid']}}@endif" placeholder="Enter Banner Ad Id">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Interstital Ad ID</label>
                                        <input type="text" class="form-control" name="ios_interstital_adid"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['ios_interstital_adid']}}@endif" placeholder="Enter Interstital Ad Id">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Reward Ad ID</label>
                                        <input type="text" class="form-control" name="ios_reward_adid"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['ios_reward_adid']}}@endif" placeholder="Enter Reward Ad Id">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label></label>
                                        &nbsp;
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Interstital Ad Click</label>
                                        <input type="text" class="form-control" name="ios_interstital_adclick"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['ios_interstital_adclick']}}@endif" placeholder="Enter Interstital Ad Click">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Reward Ad Click</label>
                                        <input type="text" class="form-control" name="ios_reward_adclick"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['ios_reward_adclick']}}@endif" placeholder="Enter Reward Ad Click">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right pt-3">
                                <button class="btn btn-default mw-120">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <?php /*<!-- <div class="tab-pane fade" id="pills-facebook" role="tabpanel" aria-labelledby="pills-facebook-tab">

                <div class="card custom-border-card mt-3">
                    <h5 class="card-header">Android Settings</h5>
                    <div class="card-body">
                        <form name="formNotification" id="formNotification" method="post"
                            action="{{ route('admin.settings.save_general_settings') }}">
                            @csrf
                            <?php
                                $getGeneralSettings = getGeneralSettings();
                            ?>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Native status</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="native_status_yes" name="native_status"
                                                    value="1" class="custom-control-input"@if($getGeneralSettings){{$getGeneralSettings['native_status'] == 1  ? 'checked' : ''}}@endif>
                                                <label class="custom-control-label" for="native_status_yes">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="native_status_no" name="native_status" value="0"
                                                    class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['native_status'] == 0  ? 'checked' : ''}}  @else checked  @endif>
                                                <label class="custom-control-label" for="native_status_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Banner status </label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="banner_status_yes" name="banner_status"
                                                    value="1"  @if($getGeneralSettings){{$getGeneralSettings['banner_status'] == 1  ? 'checked' : ''}}@endif class="custom-control-input">
                                                <label class="custom-control-label" for="banner_status_yes">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="banner_status_no" name="banner_status" value="0"
                                                    class="custom-control-input"  @if($getGeneralSettings){{$getGeneralSettings['banner_status'] == 0  ? 'checked' : ''}}  @else checked   @endif>
                                                <label class="custom-control-label" for="banner_status_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Interstiatial Status</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="interstiatial_status"
                                                    id="interstiatial_status_yes" value="1" class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['interstiatial_status'] == 1  ? 'checked' : ''}}@endif>
                                                <label class="custom-control-label"
                                                    for="interstiatial_status_yes">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="interstiatial_status"
                                                    id="interstiatial_status_no" value="0" class="custom-control-input"  @if($getGeneralSettings){{$getGeneralSettings['interstiatial_status'] == 0  ? 'checked' : ''}}  @else checked  @endif>
                                                <label class="custom-control-label"
                                                    for="interstiatial_status_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Native Key </label>
                                        <input type="text" class="form-control" name="native_key"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['native_key']}}@endif" placeholder="Enter Native Key">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Banner Key</label>
                                        <input type="text" class="form-control" name="banner_key"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['banner_key']}}@endif" placeholder="Enter Banner Key">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Interstiatial Key</label>
                                        <input type="text" class="form-control" name="interstiatial_key"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['interstiatial_key']}}@endif" placeholder="Enter Interstiatial Key">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Rewardvideo status</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="rewardvideo_status"
                                                    id="rewardvideo_status_yes" value="1" class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['rewardvideo_status'] == 1  ? 'checked' : ''}}@endif>
                                                <label class="custom-control-label"
                                                    for="rewardvideo_status_yes">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="rewardvideo_status" id="rewardvideo_status_no"
                                                    value="0" class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['rewardvideo_status'] == 0  ? 'checked' : ''}}  @else checked  @endif>
                                                <label class="custom-control-label"
                                                    for="rewardvideo_status_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Native Full Status</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="native_full_status"
                                                    id="native_full_status_yes" value="1" class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['native_full_status'] == 1  ? 'checked' : ''}}@endif>
                                                <label class="custom-control-label"
                                                    for="native_full_status_yes">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="native_full_status" id="native_full_status"
                                                    value="0" class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['native_full_status'] == 0  ? 'checked' : ''}}  @else checked  @endif>
                                                <label class="custom-control-label"
                                                    for="native_full_status">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Rewardvideo Status Key</label>
                                        <input type="text" class="form-control" name="rewardvideo_status_key"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['rewardvideo_status_key']}}@endif" placeholder="Enter Rewardvideo status Key">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Native Full Key</label>
                                        <input type="text" class="form-control" name="native_full_key"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['native_full_key']}}@endif"  placeholder="Enter Native Full Key">
                                    </div>
                                </div>

                            </div>
                            <div class="text-right pt-3">
                                <button class="btn btn-default mw-120">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card custom-border-card mt-3">
                    <h5 class="card-header">IOS Settings</h5>
                    <div class="card-body">
                        <form name="formNotification" id="formNotification" method="post"
                            action="{{ route('admin.settings.save_general_settings') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Native status</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="ios_native_status" name="ios_native_status"
                                                    value="1" class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['ios_native_status'] == 1  ? 'checked' : ''}}@endif>
                                                <label class="custom-control-label"
                                                    for="ios_native_status">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="ios_native_status" name="ios_native_status"
                                                    value="0" class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['ios_native_status'] == 0  ? 'checked' : ''}} @else checked  @endif>
                                                <label class="custom-control-label"
                                                    for="ios_native_status">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Banner status </label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="ios_banner_status_yes" name="ios_banner_status"
                                                    value="1" @if($getGeneralSettings){{$getGeneralSettings['ios_banner_status'] == 1  ? 'checked' : ''}}@endif class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="ios_banner_status_yes">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="ios_banner_status_no" name="ios_banner_status"
                                                    value="0" class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['ios_banner_status'] == 0  ? 'checked' : ''}} @else checked  @endif>
                                                <label class="custom-control-label"
                                                    for="ios_banner_status_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Interstiatial Status</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="ios_interstiatial_status"
                                                    id="ios_interstiatial_status_yes" value="1"
                                                    class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['ios_interstiatial_status'] == 1  ? 'checked' : ''}}@endif>
                                                <label class="custom-control-label"
                                                    for="ios_interstiatial_status_yes">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="ios_interstiatial_status"
                                                    id="ios_interstiatial_status_no" value="0"
                                                    class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['ios_interstiatial_status'] == 0  ? 'checked' : ''}} @else checked  @endif>
                                                <label class="custom-control-label"
                                                    for="ios_interstiatial_status_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Native Key </label>
                                        <input type="text" class="form-control" name="ios_native_key"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['ios_native_key']}}@endif" placeholder="Enter Native Key">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Banner Key</label>
                                        <input type="text" class="form-control" name="ios_banner_key"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['ios_banner_key']}}@endif" placeholder="Enter Banner key">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Interstiatial Key</label>
                                        <input type="text" class="form-control" name="ios_interstiatial_key"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['ios_interstiatial_key']}}@endif" placeholder="Enter Interstiatial Key">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Rewardvideo status</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="ios_rewardvideo_status"
                                                    id="ios_rewardvideo_status" value="1"
                                                    class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['ios_rewardvideo_status'] == 1  ? 'checked' : ''}}@endif>
                                                <label class="custom-control-label"
                                                    for="ios_rewardvideo_status">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="ios_rewardvideo_status"
                                                    id="ios_rewardvideo_status" value="0"
                                                    class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['ios_rewardvideo_status'] == 0  ? 'checked' : ''}} @else checked @endif>
                                                <label class="custom-control-label"
                                                    for="ios_rewardvideo_status">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Native Full Status</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="ios_native_full_status"
                                                    id="ios_native_full_status" value="1"
                                                    class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['ios_native_full_status'] == 1  ? 'checked' : ''}}@endif>
                                                <label class="custom-control-label"
                                                    for="ios_native_full_status">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="ios_native_full_status"
                                                    id="ios_native_full_status_no" value="0"
                                                    class="custom-control-input" @if($getGeneralSettings){{$getGeneralSettings['ios_native_full_status'] == 0  ? 'checked' : ''}} @else checked @endif>
                                                <label class="custom-control-label"
                                                    for="ios_native_full_status_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Rewardvideo Status Key</label>
                                        <input type="text" class="form-control" name="ios_rewardvideo_status_key"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['ios_rewardvideo_status_key']}}@endif" placeholder="Enter Rewardvideo Status Key">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Native Full Key</label>
                                        <input type="text" class="form-control" name="ios_native_full_key"
                                            value="@if($getGeneralSettings){{$getGeneralSettings['ios_native_full_key']}}@endif" placeholder="Enter Native Full Key">
                                    </div>
                                </div>

                            </div>
                            <div class="text-right pt-3">
                                <button class="btn btn-default mw-120">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div> -->*/?>
        </div>
    </div>
</div>
@endsection
@section('pagescript')
    <script src="{{ url('/') }}/js/jquery.minicolors.js"></script>
    <link rel="stylesheet" href="{{ url('/') }}/css/jquery.minicolors.css">
    <script>
         $('.navigation_style').on('click', function() { 
            var navigation_style = $(this).val();

          
            

            if(navigation_style == 'Side Drawer')
            {
				$('#full_screen').prop('checked', false);
            }

            if(navigation_style == 'Full screen')
            {
				$('#side_drawer').prop('checked', false);
            }

			var new_result = get_checkbox_val();


			if(new_result['side_drawer'] == 0 && new_result['full_screen'] ==0 && new_result['bottom_navigation'] == 0)
			{
				 if(navigation_style == 'Side Drawer')
	            {
					$('#side_drawer').prop('checked', true);
	            }

	            if(navigation_style == 'Full screen')
	            {
					$('#full_screen').prop('checked', true);
	            }

	            if(navigation_style == 'Bottom Navigation')
	            {
					$('#bottom_navigation').prop('checked', true);
	            }
			}
           

            // if (navigation_style != 'Side Drawer' &&  navigation_style ==
            //     'Bottom Navigation') {
            //     // $('#full_screen').prop('checked', false);
            //     $('#side_drawer').prop('checked', false);
            // }else  if (navigation_style != 'Full screen' &&  navigation_style ==
            //     'Bottom Navigation') {
            //     $('#full_screen').prop('checked', false);
            //     // $('#side_drawer').prop('checked', false);
            // }

            // if (navigation_style == 'Side Drawer') {
            //     $('#side_drawer').prop('checked', true);

            // } else if (navigation_style == 'Full screen') {
            //     $('#full_screen').prop('checked', true);
            // }

        })

         function get_checkbox_val()
         {
         	array = [];
         	array['side_drawer'] = 0;
         	array['full_screen'] = 0;
         	array['bottom_navigation'] = 0;

         	if($("#side_drawer").prop('checked') == true){
          		array['side_drawer'] = 1;	
			}

			if($("#full_screen").prop('checked') == true){
          		array['full_screen'] = 1;	
			}

			if($("#bottom_navigation").prop('checked') == true){
          		array['bottom_navigation'] = 1;	
			}

			return array;
         }

        $(document).ready(function() {
            $('#primary_dark').minicolors();
            $('#primary').minicolors();
            $('#accent').minicolors();

            $('.is_login').change(function() {
                if ($(this).val() == 'On') {
                    $('#idHide').show();
                } else {
                    $('#idHide').hide();
                }
            });
            $('#fileupload').change(function() {
                var html =
                    '<button class="close" type="button"> <span aria-hidden="true">&times;</span></button>';
                html += '<img src="" id="idLogo"/>';
                $('#idMainLogo').html(html)
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('idLogo');
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            });


            $('#formNotification').validate();
            $('#formSettings').validate({
                rules: {
                    base_url: {
                        required: true,
                        url: true
                    }

                }
            });

            $('#formChangePassword').validate({
                ignore: "",
                rules: {
                    new_password_repeat: {
                        equalTo: "#new-password"
                    }
                },
                messages: {
                    new_password: {
                        required: "Required",
                    },
                    new_password_repeat: {
                        required: "Required",
                        equalTo: "password and repeat password not match",
                    }
                }
            });

        });
    </script>

    <script>
        function Function_App_id() {
            /* Get the text field */
            var copyText = document.getElementById("app_id");
            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
           	
           	document.execCommand('copy');
            
            /* Alert the copied text */
            alert("Copied the App ID: " + copyText.value);
        }

        function Function_Api_path() {
            /* Get the text field */
            var copyText = document.getElementById("api_path");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

           	document.execCommand('copy');
            
            /* Alert the copied text */
            alert("Copied the API Path: " + copyText.value);
        }


    </script>
@endsection