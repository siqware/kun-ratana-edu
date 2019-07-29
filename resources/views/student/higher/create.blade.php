@extends('dashboard.layout')
@section('page-title')
    New Student
@stop
@section('page-header')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Student</span> - New Higher Student</h4>
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
                    <span class="breadcrumb-item active">New Higher Student</span>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-content')
    <!-- Form layouts -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">សម្រាប់អនុ និងវិទ្យាល័យ</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{route('student.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <fieldset>
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> ពត៌មានសិស្ស</legend>

                            {{--Profile--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ប្រូហ្វាល:</label>
                                <div class="col-lg-9" id="lfm" data-input="thumbnail" data-preview="holder">
                                    <img id="holder" class="rounded-circle shadow" src="{{asset('dashboard-ui/global_assets/images/image.png')}}" style="margin-top:15px;max-height:100px;">
                                    <input id="thumbnail" value="dashboard-ui/global_assets/images/image.png" type="hidden" name="picture">
                                </div>
                            </div>
                            {{--Name--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ឈ្មោះ:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="khmer" value="{{old('khmer')}}" placeholder="ខ្មែរ" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" name="latin" value="{{old('latin')}}" placeholder="ឡាតាំង" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--gender--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ភេទ:</label>
                                <div class="col-lg-9">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" {{old('gender')=='ប្រុស'?'checked':''}} value="ប្រុស" class="form-check-input-styled" name="gender" data-fouc>
                                            ប្រុស
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" {{old('gender')=='ស្រី'?'checked':''}} value="ស្រី" class="form-check-input-styled" name="gender" data-fouc>
                                            ស្រី
                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{--DOB--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ថ្ងៃខែឆ្នាំកំណើត:</label>
                                <div class="col-lg-9">
                                    <input type="date" name="dob" value="{{old('dob')}}" class="form-control">
                                </div>
                            </div>
                            {{--Place of birth--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ទីកន្លែងកំណើត:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="pob[village]" value="{{old('pob.village')}}" placeholder="ភូមិ" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" name="pob[commune]" value="{{old('pob.commune')}}" placeholder="ឃំុ | សង្កាត់" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <input type="text" name="pob[district]" value="{{old('pob.district')}}" placeholder="ស្រុក | ខណ្ឌ" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <select name="pob[province]" data-placeholder="ជ្រើសរើស ខេត្ត | ក្រុង" class="form-control form-control-select2" data-fouc>
                                                <option></option>
                                                <option value="Phnom Penh">Phnom Penh </option>
                                                <option value="Banteay Meanchey">Banteay Meanchey</option>
                                                <option value="Battambang">Battambang</option>
                                                <option value="Kampong Cham">Kampong Cham</option>
                                                <option value="Kampong Chhnang">Kampong Chhnang</option>
                                                <option value="Kampong Speu">Kampong Speu</option>
                                                <option value="Kampong Thom">Kampong Thom</option>
                                                <option value="Kampot">Kampot</option>
                                                <option value="Kandal">Kandal</option>
                                                <option value="Koh Kong">Koh Kong</option>
                                                <option value="Kep">Kep</option>
                                                <option value="Kratié">Kratié</option>
                                                <option value="Mondulkiri">Mondulkiri</option>
                                                <option value="Oddar Meanchey">Oddar Meanchey</option>
                                                <option value="Pailin">Pailin</option>
                                                <option value="Sihanoukville">Sihanoukville</option>
                                                <option value="Preah Vihear">Preah Vihear</option>
                                                <option value="Pursat">Pursat</option>
                                                <option value="Prey Veng">Prey Veng</option>
                                                <option value="Ratanakiri">Ratanakiri</option>
                                                <option value="Siem Reap">Siem Reap</option>
                                                <option value="Stung Treng">Stung Treng</option>
                                                <option value="Svay Rieng">Svay Rieng</option>
                                                <option value="Takéo">Takéo</option>
                                                <option value="Tbong Khmum">Tbong Khmum</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Current Address--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ទីលំនៅបច្ចុប្បន្ន:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="curr_addr[village]" value="{{old('curr_addr.village')}}" placeholder="ភូមិ" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" name="curr_addr[commune]" value="{{old('curr_addr.commune')}}" placeholder="ឃំុ | សង្កាត់" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <input type="text" name="curr_addr[district]" value="{{old('curr_addr.district')}}" placeholder="ស្រុក | ខណ្ឌ" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <select name="curr_addr[province]" data-placeholder="ជ្រើសរើស ខេត្ត | ក្រុង" class="form-control form-control-select2" data-fouc>
                                                <option></option>
                                                <option value="Phnom Penh">Phnom Penh </option>
                                                <option value="Banteay Meanchey">Banteay Meanchey</option>
                                                <option value="Battambang">Battambang</option>
                                                <option value="Kampong Cham">Kampong Cham</option>
                                                <option value="Kampong Chhnang">Kampong Chhnang</option>
                                                <option value="Kampong Speu">Kampong Speu</option>
                                                <option value="Kampong Thom">Kampong Thom</option>
                                                <option value="Kampot">Kampot</option>
                                                <option value="Kandal">Kandal</option>
                                                <option value="Koh Kong">Koh Kong</option>
                                                <option value="Kep">Kep</option>
                                                <option value="Kratié">Kratié</option>
                                                <option value="Mondulkiri">Mondulkiri</option>
                                                <option value="Oddar Meanchey">Oddar Meanchey</option>
                                                <option value="Pailin">Pailin</option>
                                                <option value="Sihanoukville">Sihanoukville</option>
                                                <option value="Preah Vihear">Preah Vihear</option>
                                                <option value="Pursat">Pursat</option>
                                                <option value="Prey Veng">Prey Veng</option>
                                                <option value="Ratanakiri">Ratanakiri</option>
                                                <option value="Siem Reap">Siem Reap</option>
                                                <option value="Stung Treng">Stung Treng</option>
                                                <option value="Svay Rieng">Svay Rieng</option>
                                                <option value="Takéo">Takéo</option>
                                                <option value="Tbong Khmum">Tbong Khmum</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Father--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ឪពុក:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="parent[father][name]" value="{{old('parent.father.name')}}" placeholder="ឈ្មោះ" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" name="parent[father][job]" value="{{old('parent.father.job')}}" placeholder="មុខរបរ" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Mother--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ម្តាយ:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="parent[mother][name]" value="{{old('parent.mother.name')}}" placeholder="ឈ្មោះ" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" name="parent[mother][job]" value="{{old('parent.mother.job')}}" placeholder="មុខរបរ" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Contact--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ពត៌មានទំនាក់ទំនង:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input name="contact[tel]" value="{{old('contact.tel')}}" type="text" class="form-control form-control-lg" placeholder="លេខទូរស័ព្ទ">
                                                <div class="form-control-feedback form-control-feedback-lg">
                                                    <i class="icon-mobile"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input name="contact[fb]" value="{{old('contact.fb')}}" type="text" class="form-control form-control-lg" placeholder="ហ្វេសប៊ុក">
                                                <div class="form-control-feedback form-control-feedback-lg">
                                                    <i class="icon-facebook"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input name="contact[email]" value="{{old('contact.email')}}" type="text" class="form-control form-control-lg" placeholder="អ៊ីម៉ែល">
                                                <div class="form-control-feedback form-control-feedback-lg">
                                                    <i class="icon-mail5"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input name="contact[line]" value="{{old('contact.line')}}" type="text" class="form-control form-control-lg" placeholder="លេខឡាញ">
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
                            <legend class="font-weight-semibold"><i class="icon-pen mr-2"></i> ពត៌មានការសិក្សា</legend>
                            {{--Studying--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">អតីតការសិក្សា:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="study[former_grade]" value="{{old('study.former_grade')}}" type="text" placeholder="សិស្សថ្នាក់ទី" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input name="study[former_school]" value="{{old('study.former_school')}}" type="text" placeholder="នៃសាលា" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <input name="study[card_id]" value="{{old('study.card_id')}}" type="text" placeholder="អត្តលេខ" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{--Studying shift--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">វេន្តសិក្សា:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="shift[time]" class="form-control form-control-uniform" data-fouc>
                                                <option value="ព្រឹក">ជ្រើសរើសវេន្ត</option>
                                                <option value="ព្រឹក">ព្រឹក</option>
                                                <option value="រសៀល">រសៀល</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <select name="shift[grade]" class="form-control form-control-uniform" data-fouc name="role">
                                                <option value="ថ្នាក់ទី ៧">ជ្រើសថ្នាក់</option>
                                                <option value="ថ្នាក់ទី ៧">ថ្នាក់ទី ៧</option>
                                                <option value="ថ្នាក់ទី ៨">ថ្នាក់ទី ៨</option>
                                                <option value="ថ្នាក់ទី ៩">ថ្នាក់ទី ៩</option>
                                                <option value="ថ្នាក់ទី ១០">ថ្នាក់ទី ១០</option>
                                                <option value="ថ្នាក់ទី ១១">ថ្នាក់ទី ១១</option>
                                                <option value="ថ្នាក់ទី ១២">ថ្នាក់ទី ១២</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Class Type--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ប្រភេទថ្នាក់:</label>
                                <div class="col-lg-9">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input {{old('shift.study_type')=='ថ្នាក់វិទ្យាសាស្រ្ត'?'checked':''}} type="radio" value="ថ្នាក់វិទ្យាសាស្រ្ត" class="form-check-input-styled" name="shift[study_type]" data-fouc>
                                            ថ្នាក់វិទ្យាសាស្រ្ត
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input {{old('shift.study_type')=='ថ្នាក់វិទ្យាសាស្រ្តសង្គម'?'checked':''}} type="radio" value="ថ្នាក់វិទ្យាសាស្រ្តសង្គម" class="form-check-input-styled" name="shift[study_type]" data-fouc>
                                            ថ្នាក់វិទ្យាសាស្រ្តសង្គម
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">ចុះឈ្មោះ <i class="icon-add ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /form layouts -->
@stop
@section('page-script')
    @routes
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
