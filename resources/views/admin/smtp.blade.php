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
                <img src="{{url('/')}}/assets/imgs/logo.png" alt="" class="side-logo" />
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

        <div class="border-bottom mb-3 pb-3"> 
        </div>
                
        <div class="card custom-border-card mt-3">
            <h5 class="card-header">Email Settings [SMTP]</h5>
            <div class="card-body">
                <form name="formSettings" id="formSettings" method="post" enctype="multipart/form-data" action="{{route("admin.settings_smtp.save")}}">
                    @csrf
                    <input type="hidden" name="id" value="@if ($smtp) {{$smtp->id}}@endif">
                    <input type="hidden" name="app_id" value={{session::get('app_key') }}>
                    <div class="row col-lg-12">
                        <div class="form-group  col-lg-6">
                            <label for="status">IS SMTP Active</label>
                            <select name="status" class="form-control" id="status" required>
                                <option value="">Select Status</option>
                                <option value="1" @if($smtp && $smtp->status==1) selected @endif>
                                Yes
                                </option>
                                <option value="0" @if($smtp && $smtp->status==0) selected @endif>
                                No
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="host">Host</label>
                            <input type="text" name="host" class="form-control" id="host" value="@if($smtp){{$smtp->host}}@endif" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="port">Port</label>
                            <input type="text" name="port" class="form-control" id="port" value="@if($smtp){{$smtp->port}}@endif" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="protocol">Protocol</label>
                            <input type="text" name="protocol" class="form-control" id="protocol" required placeholder="Enter Your protocol" value="@if($smtp){{$smtp->protocol}}@endif">
                        </div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="form-group col-lg-6">
                            <label for="user">User name</label>
                            <input type="text" name="user" class="form-control" id="user" value="@if($smtp){{$smtp->user}}@endif" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" class="form-control" id="pass" value="@if($smtp){{$smtp->pass}}@endif" required>
                        </div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="form-group col-lg-6">
                            <label for="from_name">From name</label>
                            <input type="text" name="from_name" class="form-control" id="from_name" value="@if($smtp){{$smtp->from_name}}@endif" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="from_email">From Email</label>
                            <input type="text" name="from_email" class="form-control" id="from_email" value="@if($smtp){{$smtp->from_email}}@endif" required>
                        </div>
                    </div>
                    <div class="border-top pt-3 text-right">
                        <button type="submit" class="btn btn-default mw-120">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="{{url("/")}}/js/jquery.minicolors.js"></script>
<link rel="stylesheet" href="{{url("/")}}/css/jquery.minicolors.css">

@section('pagescript')
@endsection

