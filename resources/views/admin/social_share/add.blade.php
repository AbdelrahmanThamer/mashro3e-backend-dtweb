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
            <h1 class="page-title">@if($data) Edit @else Add @endif  Social Share</h1>
        </div>
        <div class="head-control">            
            @include('layout.header_setting')
        </div>
    </header>
    <div class="body-content">
        @include('message_error_success')
        @include('javascript_message_error_success')
        <!-- mobile title -->
        <h1 class="page-title-sm">@if($data) Edit @else Add @endif Social Share</h1>
        <div class="card custom-border-card">
            <!--<h5 class="card-header">Add</h5>-->
            <div class="card-body">
                <form name="formSettings" id="formSettings" method="post" enctype="multipart/form-data" action="{{route("admin.social_share.save")}}">
                    @csrf 
                    <input type="hidden" name="id" value="@if($data){{$data->id}}@endif">
                    <div class="row">                    
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" value="@if($data){{$data->name}}@endif" name="name" class="form-control required" placeholder="Enter name">
                            </div>
                        </div>  
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-1">Icon</label>                                
                                <input type="file" id="fileupload" class="@if($data && $data->icon) @else required @endif" hidden  name="file" />
                                <label for="fileupload" class="form-control file-control">
                                    <img src="{{url('/')}}/assets/imgs/file-upload.png" alt="" />
                                    <span>Select Icon</span>
                                </label>
                                <div class="thumbnail-img" id="idMainLogo">
                                    @if($data && $data->icon)
                                    <!-- <button class="close" type="button"> <span aria-hidden="true">&times;</span></button> -->
                                    <img id="idLogo" src="{{url('/')}}/{{$data->icon}}" />
                                    @endif
                                </div>
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