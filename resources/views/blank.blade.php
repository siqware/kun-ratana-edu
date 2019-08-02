@extends('dashboard.layout')
@section('page-title')
    Blank
@stop
@section('page-header')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Student</span> - Student List</h4>
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
                    <a href="{{route('student.index')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Student</a>
                    <span class="breadcrumb-item active">Student List</span>
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
                                <a href="#" class="dropdown-item" data-id="២០១៨-២០១៩">២០១៨-២០១៩</a>
                                <a href="#" class="dropdown-item" data-id="២០១៩-២០២០">២០១៩-២០២០</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-list"></i>
                                <span class="ml-2">ថ្នាក់តូច</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item" data-id="២០១៨-២០១៩">២០១៨-២០១៩</a>
                                <a href="#" class="dropdown-item" data-id="២០១៩-២០២០">២០១៩-២០២០</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-content')
    {{--Basic Card--}}
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Basic card</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <h6 class="font-weight-semibold">Start your development with no hassle!</h6>
        </div>
    </div>
    <!-- /basic card -->

    {{--Basic table--}}
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Basic table</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            Seed project includes the most basic components that can help you in development process - basic grid example, card, table and form layouts with standard components. Nothing extra. Easily turn on and off styles of different components in <code>_config.scss</code> file so that your CSS is always as clean as possible. Bootstrap components are always enabled though.
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Eugene</td>
                    <td>Kopyov</td>
                    <td>@Kopyov</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Victoria</td>
                    <td>Baker</td>
                    <td>@Vicky</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>James</td>
                    <td>Alexander</td>
                    <td>@Alex</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Franklin</td>
                    <td>Morrison</td>
                    <td>@Frank</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{--Basic table--}}

    {{--Form layouts--}}
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Multiple columns</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="#">
                <div class="row">
                    <div class="col-md-6">
                        <fieldset>
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Personal details</legend>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Enter your name:</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="Eugene Kopyov">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Enter your password:</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" placeholder="Your strong password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Select your state:</label>
                                <div class="col-lg-9">
                                    <select data-placeholder="Select your state" class="form-control form-control-select2" data-fouc>
                                        <option></option>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="KY">Kentucky</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Attach screenshot:</label>
                                <div class="col-lg-9">
                                    <input type="file" class="form-input-styled" data-fouc>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Your message:</label>
                                <div class="col-lg-9">
                                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Your message:</label>
                                <div class="col-lg-9">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input-styled" name="radio-inline-left" checked data-fouc>
                                            Selected styled
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input-styled" name="radio-inline-left" data-fouc>
                                            Unselected styled
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="col-md-6">
                        <fieldset>
                            <legend class="font-weight-semibold"><i class="icon-truck mr-2"></i> Shipping details</legend>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Your name:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" placeholder="First name" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" placeholder="Last name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Email:</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="eugene@kopyov.com" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Phone #:</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="+99-99-9999-9999" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Location:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <select data-placeholder="Select your country" class="form-control form-control-select2" data-fouc>
                                                    <option></option>
                                                    <option value="1">Canada</option>
                                                    <option value="2">USA</option>
                                                    <option value="3">Australia</option>
                                                    <option value="4">Germany</option>
                                                </select>
                                            </div>

                                            <input type="text" placeholder="ZIP code" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" placeholder="State/Province" class="form-control mb-3">
                                            <input type="text" placeholder="City" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Address:</label>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Your address of living" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Additional message:</label>
                                <div class="col-lg-9">
                                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
    {{--form layouts--}}
@stop
@section('page-script')
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
    <script src="{{asset('dashboard-ui/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('dashboard-ui/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('js/pages/blank/index.js')}}"></script>
@endpush
