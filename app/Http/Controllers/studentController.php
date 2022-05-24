<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use RealRashid\SweetAlert\Facades\Alert;

class studentController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = student::all();
        return view('student.view')->with(compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'dept' => 'required',
            'dept_id' => 'required|integer|unique:students',
            'batch' => 'required',
            'session' => 'required',
            'email' => 'required|email|unique:students',
            'student_phone' => 'required',
        ]);

        $student = new student();
        $student->name = $request->name;
        $student->dept = $request->dept;
        $student->dept_id = $request->dept_id;
        $student->batch = $request->batch;
        $student->session = $request->session;
        $student->email = $request->email;
        $student->student_phone = $request->student_phone;
        $student->save();
        Alert::success('Success', 'New Student Register Successfully');
        return redirect()->route('create.student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
