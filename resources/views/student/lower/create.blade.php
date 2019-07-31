@extends('dashboard.layout')
@section('page-title')
    New Student
@stop
@section('page-header')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Student</span> - New Lower
                    Student</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="navbar-expand-md navbar-dark bg-teal-400">
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
                    <span class="breadcrumb-item active">New Lower Student</span>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-content')
    <!-- Form layouts -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Primary and Kindergarten's Class</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="#">
                <div class="row">
                    <div class="col-md-12">
                        <fieldset>
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Personal details</legend>

                            {{--Profile--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Profile:</label>
                                <div class="col-lg-9" id="lfm" data-input="thumbnail" data-preview="holder">
                                    <img id="holder" class="rounded-circle shadow" src="{{asset('dashboard-ui/global_assets/images/image.png')}}" style="margin-top:15px;max-height:100px;">
                                    <input id="thumbnail" value="dashboard-ui/global_assets/images/image.png" type="hidden" name="picture">
                                </div>
                            </div>
                            {{--Name--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Your name:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="khmer" value="{{old('khmer')}}" placeholder="Khmer" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" name="latin" value="{{old('latin')}}" placeholder="Latin" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--gender--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Gender:</label>
                                <div class="col-lg-9">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" {{old('gender')=='male'?'checked':''}} value="male" class="form-check-input-styled" name="gender" data-fouc>
                                            Male
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" {{old('gender')=='female'?'checked':''}} value="female" class="form-check-input-styled" name="gender" data-fouc>
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{--DOB--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date of Birth:</label>
                                <div class="col-lg-9">
                                    <input type="date" name="dob" value="{{old('dob')}}" class="form-control">
                                </div>
                            </div>
                            {{--Place of birth--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Place of Birth:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="pob[village]" value="{{old('pob.village')}}" placeholder="Village" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" name="pob[commune]" value="{{old('pob.commune')}}" placeholder="Commune" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <input type="text" name="pob[district]" value="{{old('pob.district')}}" placeholder="District | city" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <select name="pob[province]" data-placeholder="Select your province | town" class="form-control form-control-select2" data-fouc>
                                                <option></option>
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="WV">West Virginia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Current Address--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Current Address:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="curr_addr[village]" value="{{old('curr_addr.village')}}" placeholder="Village" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" name="curr_addr[commune]" value="{{old('curr_addr.commune')}}" placeholder="Commune" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <input type="text" name="curr_addr[district]" value="{{old('curr_addr.district')}}" placeholder="District | city" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <select name="curr_addr[province]" data-placeholder="Select your province | town" class="form-control form-control-select2" data-fouc>
                                                <option></option>
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="WV">West Virginia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Father--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Father:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="parent[father][name]" value="{{old('parent.father.name')}}" placeholder="Name" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" name="parent[father][job]" value="{{old('parent.father.job')}}" placeholder="Job" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Mother--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Father:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="parent[mother][name]" value="{{old('parent.mother.name')}}" placeholder="Name" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" name="parent[mother][job]" value="{{old('parent.mother.job')}}" placeholder="Job" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Contact--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Contact info:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input name="contact[tel]" value="{{old('contact.tel')}}" type="text" class="form-control form-control-lg" placeholder="Phone number">
                                                <div class="form-control-feedback form-control-feedback-lg">
                                                    <i class="icon-mobile"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input name="contact[fb]" value="{{old('contact.fb')}}" type="text" class="form-control form-control-lg" placeholder="FB name">
                                                <div class="form-control-feedback form-control-feedback-lg">
                                                    <i class="icon-facebook"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input name="contact[email]" value="{{old('contact.email')}}" type="text" class="form-control form-control-lg" placeholder="Email address">
                                                <div class="form-control-feedback form-control-feedback-lg">
                                                    <i class="icon-mail5"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input name="contact[line]" value="{{old('contact.line')}}" type="text" class="form-control form-control-lg" placeholder="Line ID">
                                                <div class="form-control-feedback form-control-feedback-lg">
                                                    <i class="icon-bubble-lines3"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <fieldset>
                            <legend class="font-weight-semibold"><i class="icon-pen mr-2"></i> Studying Information
                            </legend>
                            {{--Studying shift--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label pt-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Studying Shift:
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button type="button" id="clone-btn" class="btn btn-primary"><i
                                                    class="icon-add"></i></button>
                                            <button type="button" id="clone-btn-minus" class="btn btn-warning" disabled>
                                                <i class="icon-minus2"></i></button>
                                        </div>
                                    </div>
                                </label>
                                <div class="col-lg-9" id="get-clone-shift">
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <select class="form-control form-control-uniform" data-fouc name="shift">
                                                <option value="morning">Select shift</option>
                                                <option value="morning">Morning</option>
                                                <option value="afternoon">Afternoon</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <select data-placeholder="Select grade" class="form-control-uniform"
                                                    data-fouc name="role">
                                                <option value="grade-7">Kindergarten</option>
                                                <option value="grade-8">Grade 1</option>
                                                <option value="grade-9">Grade 2</option>
                                                <option value="grade-10">Grade 3</option>
                                                <option value="grade-11">Grade 4</option>
                                                <option value="grade-12">Grade 5</option>
                                                <option value="grade-12">Grade 6</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <select data-placeholder="Select teacher"
                                                    class="form-control form-control-select2" data-fouc name="role">
                                                <option></option>
                                                <option value="grade-7">Grade 7</option>
                                                <option value="grade-8">Grade 8</option>
                                                <option value="grade-9">Grade 9</option>
                                                <option value="grade-10">Grade 10</option>
                                                <option value="grade-11">Grade 11</option>
                                                <option value="grade-12">Grade 12</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Aditional service--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label pt-0">
                                    Additional Service:
                                </label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input-styled" data-fouc>
                                                            Morning Course?
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <select disabled data-placeholder="Select teacher" class="form-control form-control-select2" data-fouc name="role">
                                                        <option></option>
                                                        <option value="grade-7">Grade 7</option>
                                                        <option value="grade-8">Grade 8</option>
                                                        <option value="grade-9">Grade 9</option>
                                                        <option value="grade-10">Grade 10</option>
                                                        <option value="grade-11">Grade 11</option>
                                                        <option value="grade-12">Grade 12</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input-styled" data-fouc>
                                                            Afternoon Course?
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <select disabled data-placeholder="Select teacher"
                                                            class="form-control form-control-select2" data-fouc
                                                            name="role">
                                                        <option></option>
                                                        <option value="grade-7">Grade 7</option>
                                                        <option value="grade-8">Grade 8</option>
                                                        <option value="grade-9">Grade 9</option>
                                                        <option value="grade-10">Grade 10</option>
                                                        <option value="grade-11">Grade 11</option>
                                                        <option value="grade-12">Grade 12</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-2">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input-styled" data-fouc>
                                                            Staying?
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input-styled" data-fouc>
                                                            Transport?
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <input disabled type="number" placeholder="Direction count" class="form-control">
                                                </div>
                                                <div class="col-lg-5">
                                                    <input disabled type="text" placeholder="Direction" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i
                                    class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /form layouts -->
@stop
@section('page-script')
    <script>
        console.log('app started')
    </script>
@stop
@section('page-style')
    <style>
        body {
            /*color: red;*/
        }
    </style>
@stop
@push('page-js')
    <script src="{{asset('dashboard-ui/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('dashboard-ui/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script src="{{asset('js/pages/student/create.js')}}"></script>
@endpush
