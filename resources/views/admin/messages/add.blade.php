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
            <h1 class="page-title">@if($data) Edit @else Send @endif  Message</h1>
        </div>
        <div class="head-control">            
            @include('layout.header_setting')
        </div>
    </header>
    <div class="body-content">
        @include('message_error_success')
        @include('javascript_message_error_success')
        <!-- mobile title -->
        <h1 class="page-title-sm">@if($data) Send @else Add @endif Message</h1>
        <div class="card custom-border-card">
            <!--<h5 class="card-header">Add</h5>-->
            <div class="card-body">
                <form name="formSettings" id="formSettings" method="post" enctype="multipart/form-data" action="{{route("admin.messages.save")}}">
                    @csrf 
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="app_id" value="{{ session::get('app_key') }}"> 
                    <div class="row"> 
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" value="@if($data){{$data->title}}@endif" name="title" class="form-control required" placeholder="Enter title">
                            </div>
                        </div>  
                        <div class="col-sm-12">
                            <label>Messages</label>
                            <div class="form-group">                                
                                <input type="text" placeholder="Enter message" id="message" name="message" class="form-control required" value="@if($data){{$data->message}}@endif">
                            </div>
                        </div>  
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="mb-1">Image</label>                                
                                <input type="file" id="fileupload" class="" hidden  name="file" />
                                <label for="fileupload" class="form-control file-control">
                                    <img src="{{url('/')}}/assets/imgs/file-upload.png" alt="" />
                                    <span>Select image</span>
                                </label>
                                <div class="thumbnail-img" id="idMainLogo">
                                    @if($data && $data->image)
                                    <!--<button class="close" type="button"> <span aria-hidden="true">&times;</span></button>-->
                                    <img id="idLogo" src="{{url('/')}}/{{$data->image}}" />
                                    @endif
                                </div>
                            </div>                             
                        </div>                        
                        <div class="col-sm-12"  >
                            <div class="form-group"> 
                                <label>Url</label>
                                <input type="text" id="url" name="url" placeholder="Ex, http://google.com" class="form-control" value="@if($data){{$data->url}}@endif">
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


        $('#formSettings').validate({
            rules: {
                url: {                   
                    url: true
                }
            }
        });


    });
</script>
@endsection