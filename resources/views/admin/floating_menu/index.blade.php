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
          <h1 class="page-title">Floating Menu</h1>
      </div>
      <div class="head-control">
          @include('layout.header_setting')
      </div>
  </header>

  <div class="body-content">
    @include('message_error_success')
    @include('javascript_message_error_success')
    <!-- mobile title -->
    <h1 class="page-title-sm">Floating Menu</h1>

    <div class="card custom-border-card">
      <div class="card-body">
        <form name="formSettings" id="formSettings" method="post" enctype="multipart/form-data" action="{{route('admin.floating_menu.save')}}">
          @csrf
            
          <input type="hidden" name="app_id" value="@if($result){{$result[0]->app_id}}@endif">
          
          <div class="row col-lg-12">
            <div class="form-group col-lg-5">
              <label class="N_1">Name</label>
              <input type="text" name="N_1"class="form-control" id="N_1" value="@if($result){{$result[0]->name}}@endif">
            </div>
            <div class="form-group col-lg-5">
              <label class="L_1">Link</label>
              <input type="text" name="L_1"class="form-control" id="L_1" value="@if($result){{$result[0]->link}}@endif">
            </div>
            <div class="form-group col-lg-2">
              <label class="S_1">Status</label>
              <div class="radio-group">
                <div class="custom-control custom-radio">
                  <input type="radio" id="S_1" name="S_1" class="custom-control-input" @if($result){{$result[0]->status == 1 ? 'checked' : ''}}@endif value="1">
                  <label class="custom-control-label" for="S_1">YES</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="S_11" name="S_1" class="custom-control-input" @if($result){{$result[0]->status == 0 ? 'checked' : ''}} @else checked @endif value="0">
                  <label class="custom-control-label" for="S_11">NO</label>
                </div>
              </div>
            </div>
            <div class="form-group col-lg-5">
              <label for="image1">Image</label>
              <input type="file" class="form-control" id="image1" name="image1">
            </div>
            <div class="form-group col-lg-5"> 
              <div class="form-group">
                <div class="custom-file"> 
                  <?php 
                    if($result && $result[0]->image){
                      $app = URL::asset('/').$result[0]->image;
                    } else {
                      $app = URL::asset('/images/1.png');                      
                    }
                  ?>
                  <img  src="{{$app}}" height="80px" width="80px" class="mt-2" id="preview-image-before-upload1">
                </div>
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="row col-lg-12 mt-3">
              <div class="form-group col-lg-5">
              <label class="N_2">Name</label>
                <input type="text" name="N_2"class="form-control" id="N_2" value="@if($result){{$result[1]->name}}@endif">
              </div><div class="form-group col-lg-5">
              <label class="L_2">Link</label>
                <input type="text" name="L_2"class="form-control" id="L_2" value="@if($result){{$result[1]->link}}@endif">
              </div>
              <div class="form-group col-lg-2">
                <label class="S_2">Status</label>
                <div class="radio-group">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="S_2" name="S_2" class="custom-control-input" @if($result){{$result[1]->status == 1 ? 'checked' : ''}}@endif value="1">
                    <label class="custom-control-label" for="S_2">YES</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="S_21" name="S_2" class="custom-control-input" @if($result){{$result[1]->status == 0 ? 'checked' : ''}} @else checked @endif value="0">
                    <label class="custom-control-label" for="S_21">NO</label>
                  </div>
                </div>
              </div>
              <div class="form-group col-lg-5">
                <label for="image2">Image</label>
                <input type="file" class="form-control" id="image2" name="image2">
              </div>
              <div class="form-group col-lg-5"> 
                <div class="form-group">
                  <div class="custom-file"> 
                    <?php 
                      if($result && $result[1]->image){
                        $app = URL::asset('/')."/".$result[1]->image;
                      } else {
                        $app = URL::asset('/images/1.png');                      
                      }
                    ?>
                    <img  src="{{$app}}" height="80px" width="80px" class="mt-2" id="preview-image-before-upload2">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="row col-lg-12 mt-3">
              <div class="form-group col-lg-5">
                <label class="N_3">Name</label>
                <input type="text" name="N_3"class="form-control" id="N_3" value="@if($result){{$result[2]->name}}@endif">
              </div><div class="form-group col-lg-5">
                <label class="L_3">Link</label>
                <input type="text" name="L_3"class="form-control" id="L_3" value="@if($result){{$result[2]->link}}@endif">
              </div>
              <div class="form-group col-lg-2">
                <label class="S_3">Status</label>
                <div class="radio-group">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="S_3" name="S_3" class="custom-control-input" @if($result){{$result[2]->status == 1 ? 'checked' : ''}}@endif value="1">
                    <label class="custom-control-label" for="S_3">YES</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="S_31" name="S_3" class="custom-control-input" @if($result){{$result[2]->status == 0 ? 'checked' : ''}} @else checked @endif value="0">
                    <label class="custom-control-label" for="S_31">NO</label>
                  </div>
                </div>
              </div>
              <div class="form-group col-lg-5">
                <label for="image3">Image</label>
                <input type="file" class="form-control" id="image3" name="image3">
              </div>
              <div class="form-group col-lg-5"> 
                <div class="form-group">
                  <div class="custom-file"> 
                    <?php 
                      if($result && $result[2]->image){
                        $app = URL::asset('/').$result[2]->image;
                      } else {
                        $app = URL::asset('/images/1.png');                      
                      }
                    ?>
                    <img  src="{{$app}}" height="80px" width="80px" class="mt-2" id="preview-image-before-upload3">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="row col-lg-12 mt-3">
              <div class="form-group col-lg-5">
                <label class="N_4">Name</label>
                <input type="text" name="N_4"class="form-control" id="N_4" value="@if($result){{$result[3]->name}}@endif">
              </div>
              <div class="form-group col-lg-5">
                <label class="L_2">Link</label>
                <input type="text" name="L_4"class="form-control" id="L_4" value="@if($result){{$result[3]->link}}@endif">
              </div>
              <div class="form-group col-lg-2">
                <label class="S_4">Status</label>
                <div class="radio-group">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="S_4" name="S_4" class="custom-control-input" @if($result){{$result[3]->status == 1 ? 'checked' : ''}}@endif value="1">
                    <label class="custom-control-label" for="S_4">YES</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="S_41" name="S_4" class="custom-control-input" @if($result){{$result[3]->status == 0 ? 'checked' : ''}} @else checked @endif value="0">
                    <label class="custom-control-label" for="S_41">NO</label>
                  </div>
                </div>
              </div>
              <div class="form-group col-lg-5">
                <label for="image4">Image</label>
                <input type="file" class="form-control" id="image4" name="image4">
              </div>
              <div class="form-group col-lg-5"> 
                <div class="form-group">
                  <div class="custom-file"> 
                    <?php 
                      if($result && $result[3]->image){
                        $app = URL::asset('/').$result[3]->image;
                      } else {
                        $app = URL::asset('/images/1.png');                      
                      }
                    ?>
                    <img  src="{{$app}}" height="80px" width="80px" class="mt-2" id="preview-image-before-upload4">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="border-top">
            <div class="row col-lg-12 mt-3">
              <div class="form-group col-lg-5">
                <label class="N_5">Name</label>
                <input type="text" name="N_5"class="form-control" id="N_5" value="@if($result){{$result[4]->name}}@endif">
              </div><div class="form-group col-lg-5">
                <label class="L_2">Link</label>
                <input type="text" name="L_5"class="form-control" id="L_5" value="@if($result){{$result[4]->link}}@endif">
              </div>
              <div class="form-group col-lg-2">
                <label class="S_5">Status</label>
                <div class="radio-group">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="S_5" name="S_5" class="custom-control-input" @if($result){{$result[4]->status == 1 ? 'checked' : ''}}@endif value="1">
                    <label class="custom-control-label" for="S_5">YES</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="S_51" name="S_5" class="custom-control-input" @if($result){{$result[4]->status == 0 ? 'checked' : ''}} @else checked @endif value="0">
                    <label class="custom-control-label" for="S_51">NO</label>
                  </div>
                </div>
              </div>
              <div class="form-group col-lg-5">
                <label for="image5">Image</label>
                <input type="file" class="form-control" id="image5" name="image5">
              </div>
              <div class="form-group col-lg-5"> 
                <div class="form-group">
                  <div class="custom-file"> 
                  <?php 
                    if($result && $result[4]->image){
                      $app = URL::asset('/').$result[4]->image;
                    } else {
                      $app = URL::asset('/images/1.png');                      
                    }
                  ?>
                  <img  src="{{$app}}" height="80px" width="80px" class="mt-2" id="preview-image-before-upload5">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="border-top pt-3 text-right">
            <button type="save" class="btn btn-default mw-120">SAVE</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('pagescript')
  <script type="text/javascript">

    $(document).ready(function (e) {
      $('#image1').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
          $('#preview-image-before-upload1').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
      });
    });
    $(document).ready(function (e) {
      $('#image2').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
          $('#preview-image-before-upload2').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
      });
    });
    $(document).ready(function (e) {
      $('#image3').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
          $('#preview-image-before-upload3').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
      });
    });
    $(document).ready(function (e) {
      $('#image4').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
          $('#preview-image-before-upload4').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
      });
    });
    $(document).ready(function (e) {
      $('#image5').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
          $('#preview-image-before-upload5').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
      });
    });
  </script>
@endsection 
