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
            <h1 class="page-title">@if($data) Edit @else Add @endif  Splash Screen</h1>
        </div>
        <div class="head-control">            
            @include('layout.header_setting')
        </div>
    </header>
    <div class="body-content">
        @include('message_error_success')
        @include('javascript_message_error_success')
        <!-- mobile title -->
        <h1 class="page-title-sm">@if($data) Edit @else Add @endif Splash Screen</h1>
        <div class="card custom-border-card">
            <!--<h5 class="card-header">Add</h5>-->
            <div class="card-body">
                <form name="formSettings" id="formSettings" method="post" enctype="multipart/form-data" action="{{route("admin.splash_screen.save")}}">
                    @csrf 
                    <input type="hidden" name="id" value="@if($data){{$data->id}}@endif">
                    <div class="row">                    
                        <!--                        <div class="col-12 col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label>Required Splash Screen</label>    
                                                        <div class="radio-group">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio3" name="required_splash_screen" @if(!$data) checked @endif class="custom-control-input" value="On" @if($data && $data->required_splash_screen=='On') checked @endif>
                                                                <label class="custom-control-label" for="customRadio3">On</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio4" name="required_splash_screen" class="custom-control-input" value="OFF" @if($data && $data->required_splash_screen=='OFF') checked @endif>
                                                                <label class="custom-control-label" for="customRadio4">OFF</label>
                                                            </div>
                                                        </div>                                                              
                                                    </div>
                                                </div> -->
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" value="@if($data){{$data->title}}@endif" name="title" class="form-control required" placeholder="Enter title">
                            </div>
                        </div>  
                        <div class="col-sm-12">
                            <label>Title Color</label>
                            <div class="form-group">                                
                                <input type="text" id="title_color" name="title_color" class="form-control required" value="@if($data){{$data->title_color}}@else{{"#ff6161"}}@endif">
                            </div>
                        </div>  
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-1">Splash Logo</label>                                
                                <input type="file" id="fileupload" class="@if($data && $data->splash_logo) @else required @endif" hidden  name="file" />
                                <label for="fileupload" class="form-control file-control">
                                    <img src="{{url('/')}}/assets/imgs/file-upload.png" alt="" />
                                    <span>Select logo</span>
                                </label>
                                <div class="thumbnail-img" id="idMainLogo">
                                    @if($data && $data->splash_logo)
                                    <!--<button class="close" type="button"> <span aria-hidden="true">&times;</span></button>-->
                                    <img id="idLogo" src="{{url('/')}}/{{$data->splash_logo}}" />
                                    @endif
                                </div>
                            </div>                             
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group"> 
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="1" @if($data && $data->status==1) selected @endif>Active</option>
                                    <option value="0" @if($data && $data->status==0) selected @endif>Inctive</option>
                                </select>
                            </div>
                        </div> 
                        <div class="col-sm-12">


                            <div class="form-group">
                                <label>Splash background image OR background color </label>
                                <div class="radio-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio33" name="splash_image_or_color" @if(!$data) checked @endif class="custom-control-input splash_image_or_color" value="1" @if($data && $data->splash_image_or_color==1) checked @endif>
                                        <label class="custom-control-label" for="customRadio33">Background image</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio44" name="splash_image_or_color" class="custom-control-input splash_image_or_color" value="2" @if($data && $data->splash_image_or_color==2) checked @endif>
                                        <label class="custom-control-label" for="customRadio44">Background color</label>
                                    </div>
                                </div>                                           
                            </div>
                        </div>
                        <div class="col-sm-12" id="splashLogoImage" style="display: @if($data && $data->splash_image_or_color==2) none @endif" >
                            <div class="form-group">
                                <label class="mb-1">Select image</label>                                
                                <input type="file" id="fileupload1" class="@if($data && $data->splash_logo) @else  @endif" hidden  name="file_color" />
                                <label for="fileupload1" class="form-control file-control">
                                    <img src="{{url('/')}}/assets/imgs/file-upload.png" alt="" />
                                    <span>Select image</span>
                                </label>
                                <div class="thumbnail-img" id="idMainLogo1">
                                    @if($data && $data->splash_image_or_color==1)
                                     <!--<button class="close" type="button"> <span aria-hidden="true">&times;</span></button>-->
                                    <img id="idLogo1" src="{{url('/')}}/{{$data->splash_background}}" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" id="splashColorShow" style="display: @if($data && $data->splash_image_or_color==1) none @endif" >
                            <div class="form-group"> 
                                <label>Select color</label>
                                <input type="text" id="splash_color" name="splash_color" class="form-control" value="@if($data){{$data->splash_background}}@else{{"#ff6161"}}@endif">
                            </div>
                        </div> 
                    </div>


                    <div class="text-right pt-3">
                        <button type="submit" class="btn btn-default mw-120" id="">Save</button>
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