<div class="mr-2">
  <label class="page-title font-italic">{{ Session::get('app_name') }}</label>
</div>


<div class="dropdown dropright ml-2">
  <a href="#" class="btn head-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="{{ asset('assets/imgs/app.png') }}" /> 
  </a>
  <div class="dropdown-menu p-2 w-100" aria-labelledby="dropdownMenuLink">
    @foreach (getAppNameTop() as $value) 
      <a class="dropdown-item" href="{{route('admin.app.select',$value->app_key)}}">{{$value->app_name}}</a>
    @endforeach
  </div>
</div>
     
<div class="dropdown dropright ml-2"> 
  <a href="{{ route('admin.settings') }}" class="btn head-btn">
    <img src="{{url('/')}}/assets/imgs/settings.png" />
  </a>
</div> 

<div class="dropdown dropright">
  <a href="#" class="btn head-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="{{ asset('assets/imgs/artist.png') }}" class="avatar-img" />
  </a>
  <div class="dropdown-menu p-2 mt-2" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#">
        <?php $data =adminEmails(); if($data){echo $data[0];} ?>
        <br>
    </a>
    <a class="dropdown-item" href="{{ url('/') }}" style="color:#4E45B8;"><span><img src="{{ asset('assets/imgs/Logout-sm.png') }}" class="mr-2"></span>Logout</a>
  </div>
</div>