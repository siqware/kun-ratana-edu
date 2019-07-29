@extends('dashboard.layout')
@section('page-title')
    User
@stop
@section('page-header')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Student</span> - Student List</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="{{route('student.index')}}" class="btn btn-link btn-float text-default"><i class="icon-list-numbered text-primary"></i><span>List</span></a>
                    <a href="{{route('student.create')}}" class="btn btn-link btn-float text-default"><i class="icon-add text-primary"></i> <span>Higher Class</span></a>
                    <a href="{{route('student.create.lower')}}" class="btn btn-link btn-float text-default"><i class="icon-add text-primary"></i> <span>Lower Class</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('student.index')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Student</a>
                    <span class="breadcrumb-item active">Student List</span>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-content')
    <!-- Scrollable datatable -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Student List</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-sm table-striped datatable-scroll-y" width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th></th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
    <!-- /scrollable datatable -->
@stop
@section('page-script')
    @routes
    <script>
        console.log('app started')
    </script>
@stop
@section('page-style')
    <style>
        body{
            /*color: red;*/
        }
    </style>
@stop
@push('page-js')
    <script src="{{asset('dashboard-ui/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('dashboard-ui/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('js/pages/user/index.js')}}"></script>
@endpush
