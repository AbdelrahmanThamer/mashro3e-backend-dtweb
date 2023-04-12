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
            <h1 class="page-title">Dashboard</h1>
        </div>
        <div class="head-control">
            @include('layout.header_setting')
        </div>
    </header>
    <div class="body-content">
        <!-- mobile title -->
        <h1 class="page-title-sm">Dashboard</h1>

        <div class="row counter-row">
            <div class="col-6 col-sm-4 col-md col-lg-4 col-xl">
                <a href="{{route('admin.introduction')}}">
                    <div class="db-color-card">
                        <img src="{{url('/')}}/assets/imgs/video-green.png" alt="" class="card-icon" />
                        <!--                    <div class="dropdown dropright">
                                                <a href="#" class="btn head-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="{{url('/')}}/assets/imgs/dot.png" class="dot-icon" />
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>-->
                        <h2 class="counter">
                            {{$totalIntroScreen}}
                            <span>Total Welcome screen</span>
                        </h2>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md col-lg-4 col-xl">
                <a href="{{route('admin.menu')}}">
                    <div class="db-color-card cate-card">
                        <img src="{{url('/')}}/assets/imgs/categories-purple.png" alt="" class="card-icon" />
                        <!--                    <div class="dropdown dropright">
                                                <a href="#" class="btn head-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="{{url('/')}}/assets/imgs/dot.png" class="dot-icon" />
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>-->
                        <h2 class="counter">
                            {{$totalMenu}}
                            <span>Total Menu</span>
                        </h2>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md col-lg-4 col-xl">
                <a href="{{route('admin.users')}}">
                    <div class="db-color-card user-card">
                        <img src="{{url('/')}}/assets/imgs/user-brown.png" alt="" class="card-icon" />
                        <!--                    <div class="dropdown dropright">
                                                <a href="#" class="btn head-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="{{url('/')}}/assets/imgs/dot.png" class="dot-icon" />
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>-->
                        <h2 class="counter">
                            {{$totalUsers}}
                            <span>Total Register users</span>
                        </h2>
                    </div>
                </a>
            </div>


        </div>
        <div class="row">
            <div class="col-12 col-xl-9">
                <div class="box-title">
                    <h2 class="title">Recent Added Users</h2>
                    <a class="btn btn-link" href="{{route('admin.users')}}">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    FullName
                                </th>
                                <th>
                                    Email/Number
                                </th>                               
                                <th>
                                    Type
                                </th>
                                <th>
                                    Created Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                            <tr>
                                <td>
                                    <span class="clamp-text">{{$u->username}}</span>
                                </td>
                                <td>
                                    <span class="clamp-text">{{$u->email}}</span>
                                </td>                                
                                <td>
                                    <span class="clamp-text">
                                        @if($u->type == 1)
                                            Mobile
                                        @elseif($u->type == 2)
                                            Facebook
                                        @elseif($u->type == 3)
                                            Gmail
                                        @elseif($u->type == 4)
                                            Apple
                                        @endif
                                    </span>
                                </td>                                
                                <td>
                                    {{date('d-M-Y h:i A',strtotime($u->created_at))}}
                                </td>
                            </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
@section('pagescript')
<script>
    $(document).ready(function () {
        $('#fileupload').change(function () {
            var html = '<button class="close" type="button"> <span aria-hidden="true">&times;</span></button>';
            html += '<img src="" id="idLogo"/>';
            $('#idMainLogo').html(html)
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('idLogo');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });


        $('#formSettings').validate({
            rules: {
                base_url: {
                    required: true,
                    url: true
                }
            }
        });
    });
</script>
@endsection