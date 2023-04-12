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
            <h1 class="page-title">Login Screen</h1>
        </div>
        <div class="head-control">
            <!--            <div class="input-group head-search">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <img src="{{url('/')}}/assets/imgs/search.png" />
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                   aria-describedby="basic-addon1">
                            <button class="d-md-none mobile-close-search">
                                <span></span>
                                <span></span>
                            </button>
                        </div>-->
            @include('layout.header_setting')

        </div>
    </header>

    <div class="body-content">
        @include('message_error_success')
        @include('javascript_message_error_success')
        <!-- mobile title -->
        <h1 class="page-title-sm">Login Screen</h1>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab">

                <div class="card custom-border-card">
                    <!--<h5 class="card-header">Login Screen</h5>-->
                    <div class="card-body">
                        <form name="formSettings" id="formSettings" method="post" enctype="multipart/form-data" action="{{route("admin.login_screen.save")}}">
                            @csrf 
                            <input type="hidden" name="id" value="@if($data){{$data->id}}@endif">
                            <div class="row">   
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Login with Mobile Number</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio3" name="login_with_mobile"  class="custom-control-input" @if(!$data) checked @endif value="On" @if($data && $data->login_with_mobile=='On') checked @endif>
                                                <label class="custom-control-label" for="customRadio3">On</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio4" name="login_with_mobile" class="custom-control-input" value="OFF" @if($data && $data->login_with_mobile=='OFF') checked @endif>
                                                <label class="custom-control-label" for="customRadio4">OFF</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>  
                            <div class="row">   
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Login with Gmail</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio33" name="login_with_gmail" class="custom-control-input" @if(!$data) checked @endif  value="On" @if($data && $data->login_with_gmail=='On') checked @endif>
                                                <label class="custom-control-label" for="customRadio33">On</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio44" name="login_with_gmail" class="custom-control-input" value="OFF" @if($data && $data->login_with_gmail=='OFF') checked @endif>
                                                <label class="custom-control-label" for="customRadio44">OFF</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            </div>   
                            <div class="row">   
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Login with Facebook</label>
                                        <div class="radio-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio333" name="login_with_facebook"  class="custom-control-input" @if(!$data) checked @endif  value="On" @if($data && $data->login_with_facebook=='On') checked @endif>
                                                <label class="custom-control-label" for="customRadio333">On</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio444" name="login_with_facebook" class="custom-control-input" value="OFF" @if($data && $data->login_with_facebook=='OFF') checked @endif>
                                                <label class="custom-control-label" for="customRadio444">OFF</label>
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
        </div>
    </div>
</div>
@endsection
@section('pagescript')
<script>
    $(document).ready(function () {
    });
</script>
@endsection