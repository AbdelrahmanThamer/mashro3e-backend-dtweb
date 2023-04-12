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
            <h1 class="page-title">@if($data) Edit @else Add @endif  App</h1>
        </div>
        <div class="head-control">            
            @include('layout.header_setting')
        </div>
    </header>
    <div class="body-content">
        @include('message_error_success')
        @include('javascript_message_error_success')
        <!-- mobile title -->
        <h1 class="page-title-sm">@if($data) Edit @else Add @endif App</h1>
        <div class="card custom-border-card">
            <!--<h5 class="card-header">Add</h5>-->
            <div class="card-body">
                <form name="formSettings" id="formSettings" method="post" enctype="multipart/form-data" action="{{route("admin.app.save")}}">
                    <input type="hidden" name="id" value="@if($data){{$data->id}}@endif">
                    <input type="hidden" name="app_key" value="@if($data){{$data->app_key}}@endif">
                    <div class="row">                    
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>App Name</label>
                                <input type="text" value="@if($data){{$data->app_name}}@endif" name="app_name" class="form-control required" placeholder="Enter app name">
                            </div>
                        </div> 
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-1">App Icon</label>                                
                                <input type="file" id="fileupload" class="@if($data && $data->app_icon) @else required @endif" hidden  name="file" />
                                <label for="fileupload" class="form-control file-control">
                                    <img src="{{url('/')}}/assets/imgs/file-upload.png" alt="" />
                                    <span>Select Icon</span>
                                </label>
                                <div class="thumbnail-img" id="idMainLogo">
                                    @if($data && $data->app_icon)
                                    <!-- <button class="close" type="button"> <span aria-hidden="true">&times;</span></button> -->
                                    <img id="idLogo" src="{{url('/')}}/{{$data->app_icon}}" />
                                    @endif
                                </div>
                            </div>                             
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="is_default">Is Default App</label>
                                <select class="form-control required" name="is_default"  id="is_default">
                                    <option value="0" @if($data){{ $data->is_default == 0  ? 'selected' : ''}}@endif>No</option>
                                    <option value="1" @if($data){{ $data->is_default == 1  ? 'selected' : ''}}@endif>Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="text-right pt-3">
                        <button type="submit" class="btn btn-default mw-120" id="">Save</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pagescript')
<script src="{{url("/")}}/js/jquery.minicolors.js"></script>
<link rel="stylesheet" href="{{url("/")}}/css/jquery.minicolors.css">
<script>
$(document).ready(function () {
    $('#fileupload').change(function (event) {
        if (event.target.files && event.target.files[0]) {
            var html = '<button class="close" type="button"> <span aria-hidden="true">&times;</span></button>';
            html = '<img src="" id="idLogo"/>';
            $('#idMainLogo').html(html)
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('idLogo');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
            $(this).valid()
        }
    });
    $('#fileupload1').change(function (event) {
        if (event.target.files && event.target.files[0]) {
            var html = '<button class="close" type="button"> <span aria-hidden="true">&times;</span></button>';
            html = '<img src="" id="idLogo1"/>';
            $('#idMainLogo1').html(html)
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('idLogo1');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
            $(this).valid()
        }
    });

    $('#formSettings').validate({
        ignore: ""
    });
    $('#title_color').minicolors();
    $('#splash_color').minicolors();
    var splash_image_or_color = $('input[name="splash_image_or_color"]:checked').val();
    if (splash_image_or_color == 1) {
        $('#splashLogoImage').show();
        $('#splashColorShow').hide();
    } else {
        $('#splashLogoImage').hide();
        $('#splashColorShow').show();
    }
    $('.splash_image_or_color').change(function () {
        var splash_image_or_color = $('input[name="splash_image_or_color"]:checked').val();

        if (splash_image_or_color == 1) {
            $('#splashLogoImage').show();
            $('#splashColorShow').hide();
        } else {
            $('#splashLogoImage').hide();
            $('#splashColorShow').show();
        }
    });
});
</script>
@endsection 