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
            <h1 class="page-title">Messages</h1>
        </div>
        <div class="head-control">          
            @include('layout.header_setting')
        </div>
    </header>

    <div class="body-content">
        @include('message_error_success')
        @include('javascript_message_error_success')
        <!-- mobile title -->
        <h1 class="page-title-sm">Messages</h1>

        <div class="border-bottom mb-3 pb-3">
            <a href="#" onclick="app_chack({{chack_app_list()}})" class="btn btn-default mw-120">Add</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" id="datatable">
                <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Message</th>
                <th>Image</th>
                <th>Url</th>                
                <th>Actions</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>        
    </div>
</div>
@endsection
@section('pagescript')

<script>   
    $(function () {
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: true,
            language: {
                oPaginate: {
                    sNext: '<i class="arrow-icon next-arrow"></i>',
                    sPrevious: '<i class="arrow-icon"></i>',
                }
            },
            order: [[0, "desc"]],
            ajax: "{{ route('admin.messages') }}",
            columns: [
                {data: 'id', name: 'id',visible:false},
                {data: 'title', name: 'title'},
                {data: 'message', name: 'message'},                
                {data: 'image', name: 'image', orderable: false, searchable: false},                
                {data: 'url', name: 'url', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>

<script type="text/javascript">
    function app_chack(app)
    {   
        if(app){
            window.location.href = "{{ route('admin.messages.add')}}";       
        } else {
            alert("No Any App So Please Create App !!!");
            window.location.href = "{{ route('admin.app.add')}}"; 
        }
    }
</script>
@endsection