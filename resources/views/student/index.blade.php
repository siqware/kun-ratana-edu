@extends('dashboard.layout')
@section('page-title')
    បញ្ជីសិស្ស
@stop
@section('page-header')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">សិស្ស</span> - បញ្ជីសិស្ស</h4>
                <a href="#" class="ml-auto align-self-center text-default d-md-none" data-toggle="collapse" data-target="#navbar-mobile-top-header"><i class="icon-more"></i></a>
            </div>

            <div class="navbar navbar-expand-md navbar-dark bg-teal-400">
                <div class="collapse navbar-collapse" id="navbar-mobile-top-header">
                    <ul class="navbar-nav">
                    <li class="nav-item"><a href="{{route('student.index')}}" class="navbar-nav-link {{request()->is('student')? 'active':''}}"><i class="icon-list-numbered mr-2"></i> បញ្ជី</a></li>
                    <li class="nav-item"><a href="{{route('student.create')}}" class="navbar-nav-link {{request()->is('student/create')? 'active':''}}"><i class="icon-add mr-2"></i> ថ្នាក់ធំ</a></li>
                    <li class="nav-item"><a href="{{route('student.create.lower')}}" class="navbar-nav-link {{request()->is('student-lower/create')? 'active':''}}"><i class="icon-add mr-2"></i> ថ្នាក់តូច</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('student.index')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> សិស្ស</a>
                    <span class="breadcrumb-item active">បញ្ជីសិស្ស</span>
                </div>
                <a href="#" class="ml-auto align-self-center text-default d-md-none" data-toggle="collapse" data-target="#navbar-mobile-header"><i class="icon-more"></i></a>
            </div>

            <div class="navbar navbar-expand-md navbar-light header-elements">
                <div class="collapse navbar-collapse" id="navbar-mobile-header">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-list"></i>
                                <span class="ml-2">ថ្នាក់ធំ</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item" id="btn_by_year" data-id="1">២០១៨-២០១៩</a>
                                <a href="#" class="dropdown-item" id="btn_by_year" data-id="2">២០១៩-២០២០</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-content')
    <!-- Scrollable datatable -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">បញ្ជីសិស្សសម្រាប់ឆ្នាំសិក្សា (<span id="year_study">២០១៨-២០១៩</span>)</h5>
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
                <th>ឈ្មោះខ្មែរ</th>
                <th>ឈ្មោះឡាតាំង</th>
                <th>ភេទ</th>
                <th>ថ្ងៃខែឆ្នាំកំណើត</th>
                <th>ថ្ងៃចុះឈ្មោះ</th>
                <th>ប្រតិបត្តិការ</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
    <!-- /scrollable datatable -->
@stop
@section('page-script')
    @routes
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
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
    <script src="{{asset('js/pages/student/index.js')}}"></script>
@endpush
