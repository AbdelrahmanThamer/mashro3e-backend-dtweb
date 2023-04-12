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
            <h1 class="page-title">Users</h1>
        </div>
        <div class="head-control">          
            @include('layout.header_setting')
        </div>
    </header>

    <div class="body-content">
        @include('message_error_success')
        @include('javascript_message_error_success')
        <!-- mobile title -->
        <h1 class="page-title-sm">Splash Screen</h1>

        <div class="border-bottom mb-3 pb-3">
            
        </div>
        <div class="table-responsive">
            <table class="table table-striped" id="datatable">
                <thead>
                <th>Id</th>
                <th>Fullname</th>
                <th>Email/Mobile</th>
                <th>Type</th>
                <th>Created Date</th>               
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
            ajax: "{{ route('admin.users') }}",
            columns: [
                {data: 'id', name: 'id',visible:false},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
                {data: 'type', name: 'type',
                    "render": function(data, type, full,meta) {
                        if(data == 1) {
                        return "Mobile";
                        } else if(data == 2) {
                        return "Facebook";
                        } else if(data == 3) {
                        return "Gmail";
                        } else if(data == 4) {
                        return "Apple";
                        }else if(data == 0) {
                        return "Mobile";
                        }
                    }
                },
                {data: 'created_at', name: 'created_at'},                
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endsection