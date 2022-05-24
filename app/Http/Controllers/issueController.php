<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use App\book;
use App\bookissue;
use RealRashid\SweetAlert\Facades\Alert;
use Nexmo\Laravel\Facade\Nexmo;
use Session;
use Carbon;
class issueController extends Controller
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
        if (Session::has('checked')) {
            Alert::success('Success', Session::get('checked'));
        }
        if (Session::has('Success')) {
            Alert::success('Success', Session::get('Success'));
        }
        $bookissue = bookissue::all();
        return view('book_issue.view')->with(compact('bookissue'));
    }

    public function send(Request $request) {
        $this->validate($request, [
            'msg' => 'required'
        ]);
        Nexmo::message()->send([
            'to'   => '8801780018692',
            'from' => '16105552344',
            'text' => $request->msg,
        ]);
        $bookissue = bookissue::all();
        return view('book_issue.view')->with(compact('bookissue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $student = student::all();
        return view('book_issue.create')->with(compact('student','id'));
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
            'student_id' => 'required',
            'book_id' => 'required',
            'issue_date' => 'required',
            'return_date' => 'required'
        ]);

        $bookissue = new bookissue();
        $bookissue->student_id = $request->student_id;
        $bookissue->book_id = $request->book_id;
        $bookissue->issue_date = $request->issue_date;
        $bookissue->return_date = $request->return_date;
        $bookissue->save();

        $bookid = $bookissue->book_id;
        $book = book::find($bookid);
        $book->availablity = 0;
        $book->save();
        $request->session()->flash('Success', 'New Book Issue is Added Successfully!');

        return redirect()->route('view.book');
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

    public function checked(Request $request,  $id){
        $mytime = Carbon\Carbon::now();
        $issue = bookissue::find($id);
        $issue->checked = 1;
        $issue->checked_date = $mytime;
        $issue->save();
        $bookid = $issue->book_id;
        $book = book::find($bookid);
        $book->availablity = 1;
        $book->save();
        $request->session()->flash('checked', 'Item has been Updated!');
        return redirect()->route('viewissue.book');
    }
}
