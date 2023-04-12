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
            <h1 class="page-title">Menu List</h1>
        </div>
        <div class="head-control">          
            @include('layout.header_setting')
        </div>
    </header>

    <div class="body-content">
        @include('message_error_success')
        @include('javascript_message_error_success')
        <!-- mobile title -->
        <h1 class="page-title-sm">Menu List</h1>

        <div class="border-bottom mb-3 pb-3">
            <a href="#" onclick="app_chack({{chack_app_list()}})" class="btn btn-default mw-120">Add</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" id="example">
                <thead>                               
                <th>Title</th>
                <th>Url</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
                </thead>
                <tbody>
                    @if ($data->count() == 0)
                    <tr>
                        <td colspan="99" class="text-center">No data found.</td>
                    </tr>
                    @endif

                    @foreach ($data as $d)
                    <tr>                                    
                        <td>{{ $d->title }}</td>
                        <td>{{ $d->url }}</td>
                        <td>
                            @if($d->image)
                            <img src="{{url('/')}}/{{$d->image}}" height="50">
                            @else
                            -
                            @endif

                        </td>
                        <td>
                            @if($d->status==1)
                            Active
                            @else
                            Inactive
                            @endif

                        </td>
                        <td>
                            <a class="btn" href="{{ route('admin.menu.edit', [$d->id]) }}">
                                <img src="{{url('/')}}/assets/imgs/edit.png" />
                            </a>
                            <a class="btn" href="{{ route('admin.menu.delete', [$d->id]) }}">
                                <img src="{{url('/')}}/assets/imgs/trash.png" />
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
    </div>
</div>
@endsection
@section('pagescript')


<script type="text/javascript">
    function app_chack(app)
    {   
        if(app){
            window.location.href = "{{ route('admin.menu.add')}}";       
        } else {
            alert("No Any App So Please Create App !!!");
            window.location.href = "{{ route('admin.app.add')}}"; 
        }
    }
</script>
@endsection
