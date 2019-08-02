<?php

namespace App\Http\Controllers;

use App\StdYear;
use App\StdYearDetail;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Rap2hpoutre\FastExcel\FastExcel;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    /*upgrade higher student store*/
    public function student_higher_upgrade_store(Request $request, $id)
    {
        $input = $request->all();
        /*validation*/
        $validator = Validator::make($input, [
            'picture' => 'required',
            'khmer' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'pob.*' => 'required',
            'curr_addr.*' => 'required',
            'parent.*.name' => 'required',
            'parent.*.job' => 'required',
            'contact.tel' => 'required',
            'study' => 'required',
            'shift' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
        /*student*/
        /*nullable*/
        if ($input['latin']==null){
            $input['latin']='blank';
        }
        $student = Student::findOrFail($id);
        /*year study*/
        /*check year in database*/
        $stdYear = DB::table('std_years')->where('year','=',$input['study_year']);
        $isYear = $stdYear->count();
        /*if exist use database value*/
        if ($isYear==1){
            $get_year = $stdYear->get();
            foreach ($get_year as $value){
                StdYearDetail::create([
                    'student_id'=>$student->id,
                    'std_year_id'=>$value->id,
                ]);
            }
        }else{
            /*if not create one*/
            $year_study = new StdYear();
            $year_study->year = $input['study_year'];
            if ($year_study->save()){
                /*year study detail*/
                $std_year_detail = $year_study->year_std_detail()->create([
                    'student_id' =>$student->id
                ]);
            }
        }
        /*pob*/
        $pob = [
            'village'=>$input['pob']['village'],
            'commune'=>$input['pob']['commune'],
            'district'=>$input['pob']['district'],
            'province'=>$input['pob']['province'],
        ];
        $student->pob()->create($pob);
        /*current address*/
        $curr_addr = [
            'village'=>$input['curr_addr']['village'],
            'commune'=>$input['curr_addr']['commune'],
            'district'=>$input['curr_addr']['district'],
            'province'=>$input['curr_addr']['province'],
            'study_year'=>$input['study_year'],
        ];
        $student->curr_addr()->create($curr_addr);
        /*Parents*/
        /*nullable*/
        if ($input['parent']['father']['tel']==null){
            $input['parent']['father']['tel'] = 'blank';
        }
        if ($input['parent']['mother']['tel']==null){
            $input['parent']['mother']['tel'] = 'blank';
        }
        $parent = [];
        foreach ($input['parent']  as $key => $value){
            $parent[]=[
                'name'=>$value['name'],
                'job'=>$value['job'],
                'tel'=>$value['tel'],
                'parent_type'=>$key,
                'study_year'=>$input['study_year']
            ];
        }
        $student->parents()->createMany($parent);
        /*contact*/
        /*nullable*/
        if ($input['contact']['fb']==null){
            $input['contact']['fb'] = 'blank';
        }
        if ($input['contact']['email']==null){
            $input['contact']['email'] = 'blank';
        }
        if ($input['contact']['line']==null){
            $input['contact']['line'] = 'blank';
        }
        $contact = [
            'tel'=>$input['contact']['tel'],
            'fb'=>$input['contact']['fb'],
            'email'=>$input['contact']['email'],
            'line'=>$input['contact']['line'],
            'study_year'=>$input['study_year']
        ];
        $student->contact()->create($contact);
        /*former study*/
        $former_study = [
            'grade'=>$input['study']['former_grade'],
            'school'=>$input['study']['former_school'],
            'card_id'=>$student->id,
            'study_year'=>$input['study_year']
        ];
        $student->former_study()->create($former_study);
        /*shift*/
        $shift = [
            'time'=>$input['shift']['time'],
            'grade'=>$input['shift']['grade'],
            'grade_type'=>$input['shift']['grade_type'],
            'study_year'=>$input['study_year']
        ];
        $student->shift()->create($shift);
    }
    /*upgrade higher student index*/
    public function student_higher_upgrade_show($id)
    {
        $student = Student::with(['show_pob','show_curr_addr','show_parents','show_contact','show_former_study','show_shift'])->where('id',$id)->get();
        foreach ($student as $value){
            return view('student.higher.upgrade',compact('value'));
        }
    }
    /*Import from excel index*/
    public function excel_import_index(){
        return view('student.import');
    }
    /*Import from excel*/
    public function excel_import(Request $request){
        $path = $request->file('import_file')->getRealPath();
        $collection = (new FastExcel)->import($path);
        foreach ($collection as $value){
            /*student*/
            $student = new Student();
            $student->profile = 'dashboard-ui/global_assets/images/image.png';
            $student->khmer = $value['khmer'];
            $student->latin = $value['latin'];
            $student->gender = $value['sex'];
            $student->dob = $value['dob'];
            $student->save();
            /*year study*/
            /*check year in database*/
            $stdYear = DB::table('std_years')->where('year','=',$value['study_year']);
            $isYear = $stdYear->count();
            /*if exist use database value*/
            if ($isYear==1){
                $get_year = $stdYear->get();
                foreach ($get_year as $val){
                    StdYearDetail::create([
                        'student_id'=>$student->id,
                        'std_year_id'=>$val->id,
                    ]);
                }
            }else{
                /*if not create one*/
                $year_study = new StdYear();
                $year_study->year = $value['study_year'];
                if ($year_study->save()){
                    /*year study detail*/
                    $std_year_detail = $year_study->year_std_detail()->create([
                        'student_id' =>$student->id
                    ]);
                }
            }
            /*pob*/
            $pob = [
                'village'=>$value['pob_village'],
                'commune'=>$value['pob_commune'],
                'district'=>$value['pob_district'],
                'province'=>$value['pob_province'],
            ];
            $student->pob()->create($pob);
            /*current address*/
            $curr_addr = [
                'village'=>$value['curr_village'],
                'commune'=>$value['curr_commune'],
                'district'=>$value['curr_district'],
                'province'=>$value['curr_province'],
                'study_year'=>$value['study_year'],
            ];
            $student->curr_addr()->create($curr_addr);
            /*Parents*/
            $father =[
                    'name'=>$value['father_name'],
                    'job'=>$value['father_job'],
                    'tel'=>$value['father_tel'],
                    'parent_type'=>'father',
                    'study_year'=>$value['study_year']
                ];
            $mother =[
                'name'=>$value['mother_name'],
                'job'=>$value['mother_job'],
                'tel'=>$value['mother_tel'],
                'parent_type'=>'mother',
                'study_year'=>$value['study_year']
            ];
            $student->parents()->createMany([$father,$mother]);
            /*contact*/
            /*nullable*/
            $contact = [
                'tel'=>$value['student_tel'],
                'fb'=>'blank',
                'email'=>'blank',
                'line'=>'blank',
                'study_year'=>$value['study_year']
            ];
            $student->contact()->create($contact);
            /*former study*/
            $former_study = [
                'grade'=>$value['class_type'],
                'school'=>'ពន្លកខ្មែរ',
                'card_id'=>$value['card_id'],
                'study_year'=>$value['study_year']
            ];
            $student->former_study()->create($former_study);
            /*shift*/
            $shift = [
                'time'=>'NA',
                'grade'=>'NA',
                'grade_type'=>'NA',
                'study_year'=>$value['study_year']
            ];
            $student->shift()->create($shift);
        }
    }
    public function show_higher_students(){
        $student_by_year = StdYearDetail::with('students')->where('std_year_id',2)->get();
        return Datatables::of($student_by_year)
            ->editColumn('students.profile',function ($picture){
                return '<img src="'.asset($picture->students->profile).'" width="35" height="35" class="rounded-circle">';
            })
            ->editColumn('students.created_at',function ($date){
                return Carbon::parse($date->students->created_at)->format('d-m-Y');
            })
            ->editColumn('students.dob',function ($date){
                return Carbon::parse($date->students->dob)->format('d-m-Y');
            })
            ->addColumn('action',function ($action){
                return '<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a href="'.route('student.higher.upgrade.show',$action->students->id).'" class="dropdown-item text-success"><i class="icon-database-edit2"></i> តម្លើងថ្នាក់ (២០១៩-២០២០)</a>
											</div>
										</div>
									</div>';
            })
            ->rawColumns(['students.profile','action'])
            ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.higher.create');
    }
    /*Lower Class Create*/
    public function create_lower()
    {
        return view('student.lower.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        /*validation*/
        $validator = Validator::make($input, [
            'picture' => 'required',
            'khmer' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'pob.*' => 'required',
            'curr_addr.*' => 'required',
            'parent.*.name' => 'required',
            'parent.*.job' => 'required',
            'contact.tel' => 'required',
            'study' => 'required',
            'shift' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
        /*student*/
        /*nullable*/
        if ($input['latin']==null){
            $input['latin']='blank';
        }
        $student = new Student();
        $student->profile = $input['picture'];
        $student->khmer = $input['khmer'];
        $student->latin = $input['latin'];
        $student->gender = $input['gender'];
        $student->dob = $input['dob'];
        $student->save();
        /*year study*/
        /*check year in database*/
        $stdYear = DB::table('std_years')->where('year','=',$input['study_year']);
        $isYear = $stdYear->count();
        /*if exist use database value*/
        if ($isYear==1){
            $get_year = $stdYear->get();
            foreach ($get_year as $value){
                StdYearDetail::create([
                    'student_id'=>$student->id,
                    'std_year_id'=>$value->id,
                ]);
            }
        }else{
            /*if not create one*/
            $year_study = new StdYear();
            $year_study->year = $input['study_year'];
            if ($year_study->save()){
                /*year study detail*/
                $std_year_detail = $year_study->year_std_detail()->create([
                    'student_id' =>$student->id
                ]);
            }
        }
        /*pob*/
         $pob = [
            'village'=>$input['pob']['village'],
             'commune'=>$input['pob']['commune'],
             'district'=>$input['pob']['district'],
             'province'=>$input['pob']['province'],
        ];
        $student->pob()->create($pob);
        /*current address*/
        $curr_addr = [
            'village'=>$input['curr_addr']['village'],
            'commune'=>$input['curr_addr']['commune'],
            'district'=>$input['curr_addr']['district'],
            'province'=>$input['curr_addr']['province'],
            'study_year'=>$input['study_year'],
        ];
        $student->curr_addr()->create($curr_addr);
        /*Parents*/
        /*nullable*/
        if ($input['parent']['father']['tel']==null){
            $input['parent']['father']['tel'] = 'blank';
        }
        if ($input['parent']['mother']['tel']==null){
            $input['parent']['mother']['tel'] = 'blank';
        }
        $parent = [];
        foreach ($input['parent']  as $key => $value){
            $parent[]=[
                'name'=>$value['name'],
                'job'=>$value['job'],
                'tel'=>$value['tel'],
                'parent_type'=>$key,
                'study_year'=>$input['study_year']
            ];
        }
        $student->parents()->createMany($parent);
        /*contact*/
        /*nullable*/
        if ($input['contact']['fb']==null){
            $input['contact']['fb'] = 'blank';
        }
        if ($input['contact']['email']==null){
            $input['contact']['email'] = 'blank';
        }
        if ($input['contact']['line']==null){
            $input['contact']['line'] = 'blank';
        }
        $contact = [
            'tel'=>$input['contact']['tel'],
            'fb'=>$input['contact']['fb'],
            'email'=>$input['contact']['email'],
            'line'=>$input['contact']['line'],
            'study_year'=>$input['study_year']
        ];
        $student->contact()->create($contact);
        /*former study*/
        $former_study = [
            'grade'=>$input['study']['former_grade'],
            'school'=>$input['study']['former_school'],
            'card_id'=>$student->id,
            'study_year'=>$input['study_year']
        ];
        $student->former_study()->create($former_study);
        /*shift*/
        $shift = [
            'time'=>$input['shift']['time'],
            'grade'=>$input['shift']['grade'],
            'grade_type'=>$input['shift']['grade_type'],
            'study_year'=>$input['study_year']
        ];
        $student->shift()->create($shift);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.higher.upgrade');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
