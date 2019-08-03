@extends('dashboard.layout')
@section('page-title')
    New Student
@stop
@section('page-header')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Student</span> - New
                    Higher Student</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="navbar-expand-md navbar-dark bg-teal-400">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{route('student.index')}}"
                                                class="navbar-nav-link {{request()->is('student')? 'active':''}}"><i
                                    class="icon-list-numbered mr-2"></i> បញ្ជី</a></li>
                        <li class="nav-item"><a href="{{route('student.create')}}"
                                                class="navbar-nav-link {{request()->is('student/create')? 'active':''}}"><i
                                    class="icon-add mr-2"></i> ថ្នាក់ធំ</a></li>
                        <li class="nav-item"><a href="{{route('student.create.lower')}}"
                                                class="navbar-nav-link {{request()->is('student-lower/create')? 'active':''}}"><i
                                    class="icon-add mr-2"></i> ថ្នាក់តូច</a></li>
                    </ul>
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
            <form action="{{route('student.higher.upgrade',$value->id)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="row">
                    <div class="col-md-12">
                        <fieldset>
                            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> ពត៌មានសិស្ស</legend>

                            {{--Profile--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ប្រូហ្វាល:</label>
                                <div class="col-lg-9" id="lfm" data-input="thumbnail" data-preview="holder">
                                    <img id="holder" class="rounded-circle shadow"
                                         src="{{asset($value->profile)}}"
                                         style="margin-top:15px;max-height:100px;">
                                    <input readonly id="thumbnail" value="{{$value->profile}}" type="hidden" name="picture">
                                </div>
                            </div>
                            {{--Name--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ឈ្មោះ:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input readonly type="text" name="khmer" value="{{old('khmer')}}{{$value->khmer}}" placeholder="ខ្មែរ"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input readonly type="text" name="latin" value="{{old('latin')}}{{$value->latin}}"
                                                   placeholder="ឡាតាំង" class="form-control">
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
                                            <input readonly type="radio" {{$value->gender=='ប្រុស'?'checked':''}} value="ប្រុស"
                                                   class="form-check-input-styled" name="gender" data-fouc>
                                            ប្រុស
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input readonly type="radio" {{$value->gender=='ស្រី'?'checked':''}} value="ស្រី"
                                                   class="form-check-input-styled" name="gender" data-fouc>
                                            ស្រី
                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{--DOB--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ថ្ងៃខែឆ្នាំកំណើត:</label>
                                <div class="col-lg-9">
                                    <input readonly type="date" name="dob" value="{{old('dob')}}{{$value->dob}}" class="form-control">
                                </div>
                            </div>
                            {{--Place of birth--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ទីកន្លែងកំណើត:</label>
                                <div class="col-lg-9" id="clone_mark_same">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input readonly type="text" name="pob[village]" value="{{old('pob.village')}}{{$value->show_pob->village}}"
                                                   placeholder="ភូមិ" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input readonly type="text" name="pob[commune]" value="{{old('pob.commune')}}{{$value->show_pob->commune}}"
                                                   placeholder="ឃំុ | សង្កាត់" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <input readonly type="text" name="pob[district]" value="{{old('pob.district')}}{{$value->show_pob->district}}"
                                                   placeholder="ស្រុក | ខណ្ឌ" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <select disabled readonly name="pob[province]" data-placeholder="ជ្រើសរើស ខេត្ត | ក្រុង"
                                                    class="form-control form-control-select2" data-fouc>
                                                <option></option>
                                                <option value="{{$value->show_pob->village}}" selected>{{$value->show_pob->province}}</option>
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
                                <label class="col-lg-3 col-form-label pt-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            ទីលំនៅបច្ចុប្បន្ន:
                                        </div>
                                    </div>
                                </label>
                                <div class="col-lg-9" id="get_mark_same">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="curr_addr[village]"
                                                   value="{{old('curr_addr.village')}}{{$value->show_curr_addr->village}}" placeholder="ភូមិ"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" name="curr_addr[commune]"
                                                   value="{{old('curr_addr.commune')}}{{$value->show_curr_addr->commune}}" placeholder="ឃំុ | សង្កាត់"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <input type="text" name="curr_addr[district]"
                                                   value="{{old('curr_addr.district')}}{{$value->show_curr_addr->district}}" placeholder="ស្រុក | ខណ្ឌ"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <select name="curr_addr[province]" data-placeholder="ជ្រើសរើស ខេត្ត | ក្រុង"
                                                    class="form-control form-control-select2" data-fouc>
                                                <option></option>
                                                <option value="{{$value->show_curr_addr->province}}" selected>{{$value->show_curr_addr->province}}</option>
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
                                        <div class="col-md-4">
                                            <input readonly type="text" name="parent[father][name]"
                                                   value="{{old('parent.father.name')}}{{$value->show_parents[0]->name}}" placeholder="ឈ្មោះ"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-3">
                                            <input readonly type="text" name="parent[father][job]"
                                                   value="{{old('parent.father.job')}}{{$value->show_parents[0]->job}}" placeholder="មុខរបរ"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-5">
                                            <input type="text" name="parent[father][tel]"
                                                   value="{{old('parent.father.tel')}}{{$value->show_parents[0]->tel}}" placeholder="លេខទូរស័ព្ទ"
                                                   class="form-control tagsinput-max-tags">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{--Mother--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ម្តាយ:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input readonly type="text" name="parent[mother][name]"
                                                   value="{{old('parent.mother.name')}}{{$value->show_parents[1]->name}}" placeholder="ឈ្មោះ"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-3">
                                            <input readonly type="text" name="parent[mother][job]"
                                                   value="{{old('parent.mother.job')}}{{$value->show_parents[1]->job}}" placeholder="មុខរបរ"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-5">
                                            <input type="text" name="parent[mother][tel]"
                                                   value="{{old('parent.mother.tel')}}{{$value->show_parents[1]->tel}}" placeholder="លេខទូរស័ព្ទ"
                                                   class="form-control tagsinput-max-tags">
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
                                            <input name="contact[tel]" value="{{old('contact.tel')}}{{$value->show_contact->tel}}" type="text"
                                                   class="form-control tagsinput-max-tags" placeholder="លេខទូរស័ព្ទ">
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input name="contact[fb]" value="{{old('contact.fb')}}{{$value->show_contact->fb}}" type="text"
                                                       class="form-control form-control-lg" placeholder="ហ្វេសប៊ុក">
                                                <div class="form-control-feedback form-control-feedback-lg">
                                                    <i class="icon-facebook"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input name="contact[email]" value="{{old('contact.email')}}{{$value->show_contact->email}}"
                                                       type="text" class="form-control form-control-lg"
                                                       placeholder="អ៊ីម៉ែល">
                                                <div class="form-control-feedback form-control-feedback-lg">
                                                    <i class="icon-mail5"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input name="contact[line]" value="{{old('contact.line')}}{{$value->show_contact->line}}" type="text"
                                                       class="form-control form-control-lg" placeholder="លេខឡាញ">
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
                                            <input readonly type="text" name="study[former_grade]" class="form-control" placeholder="ថ្នាក់ទី" value="{{$value->show_former_study->grade}}">
                                        </div>

                                        <div class="col-md-6">
                                            <input readonly name="study[former_school]" value="{{old('study.former_school')}}{{$value->show_former_study->school}}"
                                                   type="text" placeholder="នៃសាលា" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <input readonly name="study[card_id]" value="{{old('study.card_id')}}{{$value->show_former_study->card_id}}"
                                                   type="text" placeholder="អត្តលេខស្វ័យប្រវត្តិ" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{--Studying shift--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">វេន្តសិក្សា:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select required name="shift[time]" class="form-control form-control-uniform"
                                                    data-fouc>
                                                <option value="ព្រឹក">ជ្រើសរើសវេន្ត</option>
                                                <option value="ព្រឹក">ព្រឹក</option>
                                                <option value="រសៀល">រសៀល</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <select required name="shift[grade_type]" class="form-control form-control-uniform" data-fouc>
                                                <option value="ថ្នាក់ទី ៧">ជ្រើសប្រភេទថ្នាក់</option>
                                                <option value="ថ្នាក់ទី ៧">ថ្នាក់ទី ៧</option>
                                                <option value="ថ្នាក់ទី ៨">ថ្នាក់ទី ៨</option>
                                                <option value="ថ្នាក់ទី ៩">ថ្នាក់ទី ៩</option>
                                                <option value="ថ្នាក់ទី ១០">ថ្នាក់ទី ១០</option>
                                                <option value="ថ្នាក់ទី ១១">ថ្នាក់ទី ១១</option>
                                                <option value="ថ្នាក់ទី ១២">ថ្នាក់ទី ១២</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <select required name="shift[grade]" data-placeholder="ជ្រើសរើសថ្នាក់ទី" class="form-control form-control-select2">
                                                <option></option>
                                                <option value="7A">7A</option>
                                                <option value="7B">7B</option>
                                                <option value="7C">7C</option>
                                                <option value="7D">7D</option>
                                                <option value="7C">7C</option>
                                                <option value="7D">7D</option>
                                                <option value="7E">7E</option>
                                                <option value="7F">7F</option>
                                                <option value="7G">7G</option>

                                                <option value="8A">8A</option>
                                                <option value="8B">8B</option>
                                                <option value="8C">8C</option>
                                                <option value="8D">8D</option>
                                                <option value="8C">8C</option>
                                                <option value="8D">8D</option>
                                                <option value="8E">8E</option>
                                                <option value="8F">8F</option>

                                                <option value="9A">9A</option>
                                                <option value="9B">9B</option>
                                                <option value="9C">9C</option>
                                                <option value="9D">9D</option>
                                                <option value="9C">9C</option>
                                                <option value="9D">9D</option>
                                                <option value="9E">9E</option>

                                                <option value="10A">10A</option>
                                                <option value="10B">10B</option>
                                                <option value="10C">10C</option>
                                                <option value="10D">10D</option>
                                                <option value="10C">10C</option>
                                                <option value="10D">10D</option>
                                                <option value="10E">10E</option>

                                                <option value="11A">11A</option>
                                                <option value="11B">11B</option>
                                                <option value="11C">11C</option>
                                                <option value="11D">11D</option>
                                                <option value="11C">11C</option>
                                                <option value="11D">11D</option>
                                                <option value="11E">11E</option>

                                                <option value="12A">12A</option>
                                                <option value="12B">12B</option>
                                                <option value="12C">12C</option>
                                                <option value="12D">12D</option>
                                                <option value="12C">12C</option>
                                                <option value="12D">12D</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Year of studying--}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ឆ្នាំសិក្សា:</label>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" value="២០១៩-២០២០" readonly class="form-control">
                                            <input type="hidden" name="study_year" value="២០១៩-២០២០">
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
                            <button type="submit" class="btn btn-primary">ចុះឈ្មោះ <i class="icon-add ml-2"></i>
                            </button>
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
    <script src="{{asset('dashboard-ui/global_assets/js/plugins/forms/tags/tagsinput.min.js')}}"></script>
    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script src="{{asset('js/pages/student/create.js')}}"></script>
@endpush
