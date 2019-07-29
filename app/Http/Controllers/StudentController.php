<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
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
            'latin' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'pob.*' => 'required',
            'curr_addr.*' => 'required',
            'parent.*' => 'required',
            'contact.tel' => 'required',
            'study' => 'required',
            'shift' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
        /*student*/
        $student = new Student();
        $student->profile = $input['picture'];
        $student->khmer = $input['khmer'];
        $student->latin = $input['latin'];
        $student->gender = $input['gender'];
        $student->dob = $input['dob'];
        $student->save();
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
        ];
        $student->curr_addr()->create($curr_addr);
        /*Parents*/
        $parent = [];
        foreach ($input['parent']  as $key => $value){
            $parent[]=[
                'name'=>$value['name'],
                'job'=>$value['job'],
                'parent_type'=>$key
            ];
        }
        $student->parents()->createMany($parent);
        /*contact*/
        $contact = [
            'tel'=>$input['contact']['tel'],
            'fb'=>$input['contact']['fb'],
            'email'=>$input['contact']['email'],
            'line'=>$input['contact']['line'],
        ];
        $student->contact()->create($contact);
        /*former study*/
        $former_study = [
            'grade'=>$input['study']['former_grade'],
            'school'=>$input['study']['former_school'],
            'card_id'=>$student->id,
        ];
        $student->former_study()->create($former_study);
        /*shift*/
        $shift = [
            'time'=>$input['shift']['time'],
            'grade'=>$input['shift']['grade'],
            'study_type'=>$input['shift']['study_type']
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
    public function edit(Student $student)
    {
        //
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
