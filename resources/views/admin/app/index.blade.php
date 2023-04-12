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
            <h1 class="page-title">App</h1>
        </div>
        <div class="head-control">
            @include('layout.header_setting')
        </div>
    </header>

    <div class="body-content">
        @include('message_error_success')
        @include('javascript_message_error_success')
        <!-- mobile title -->
        <h1 class="page-title-sm">App</h1>

        <div class="border-bottom mb-3 pb-3">
            <a href="{{ route('admin.app.add')}}" class="btn btn-default mw-120">Add</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" id="datatable">
                <thead>
                <th>ID</th>
                <th>App Name</th>
                <th>App Icon</th>
                <th>Is Default App</th>
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
            ajax: "{{ route('admin.app') }}",
            columns: [
                {data: 'id', name: 'id',visible:false},
                {data: 'app_name', name: 'app_name'},
                {data: 'app_icon', name: 'app_icon'},
                {data: 'is_default', name: 'is_default',
                    "render": function(data, is_default, full,meta) {
                        if(data == 1) {
                            return "Yes";
                        } else {
                            return "No";
                        }
                    }
                },
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endsection
