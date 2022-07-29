<?php

namespace App\Http\Controllers;

use App\Models\school;
use Illuminate\Http\Request;
use App\Models\student;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the sharks
        $students = student::select('students.id','schools.name as school_name','students.name','students.order')
        ->join('schools','students.school_id','schools.id')
        ->get();

        return view('student.index')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = school::all();
        return view('student.create')->with('schools',$schools);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $school_id = $form['school_id'];
        $school = school::find($school_id);
        $order = student::select('order')->join('schools','students.school_id','schools.id')
        ->where('students.school_id',$school_id)->max('order');
        $order = $order + 1;
        $form['order'] = $order;
        // dd($form);
        student::create($form);
       return redirect('student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = student::find($id);
        return view('school.index')->with('school',$school);
    }
    public function show()
    {
        $id = Auth::id();
        $school = student::find($id);
        return json_encode($school);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $student = student::select('students.id as id','schools.name as school_name','students.name','students.school_id')
        ->join('schools','students.school_id','schools.id')
        ->where('students.id',$id)
        ->first();
        $schools = school::all();
        $data = array(
            'schools' => $schools,
            'student' => $student
        );
        return view('student.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $student =  student::where('id',$id)->first();
       $student->name = $request->post('name');
       $student->school_id = $request->post('school_id');
       $student->save();
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        student::where('id',$id)->delete();
        return redirect()->back();
    }
}
