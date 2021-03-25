<?php

namespace App\Http\Controllers;

use App\TeacherDetails;
use App\Faculties;
use App\Nationalities;
use App\FacultyModules;
use App\Genders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class TeacherDetailsController extends Controller
{
   public function __construct(Request $request)
   {
    $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $genders = Genders::orderby('id', 'asc')->get();
        $teachers = TeacherDetails::orderby('id', 'desc')->paginate(5);
        $faculties = Faculties::orderby('id', 'desc')->get();
        $nationalities = Nationalities::orderby('id', 'desc')->get();
        $faculty_modules = FacultyModules::orderby('id', 'desc')->get();

        return view('welcome', compact('teachers','genders','nationalities', 'faculties','faculty_modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //form validation
        $rules = array(
            'lecturer_name' => 'required',
            'gender_id' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'nationality_id' => 'required',
            'dob' => 'required',
            'faculty_id' => 'required',
            'faculty_module_id' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return back()->withInput()
            ->withErrors($validator)
            ->withInput();
        }
        // echo $request->phone; die();
        // add to DB
            $teacher = new teacherDetails();
            $teacher->lecturer_name=$request->lecturer_name;
            $teacher->gender_id=$request->gender_id;
            $teacher->phone=$request->phone;
            $teacher->email=$request->email;
            $teacher->address=$request->address;
            $teacher->nationality_id=$request->nationality_id;
            $teacher->dob=$request->dob;
            $teacher->faculty_id=$request->faculty_id;
            $teacher->faculty_module_id=$request->nationality_id;
            if($teacher->save())
            {
                $this->request->session()->flash('alert-success', 'Added successfully!');
            } else {
                $this->request->session()->flash('alert-warning', 'Data could not add!');
            }
        return redirect()->back();
    }

    public function facultyModule(Request $request) {
    $this->validate($request, [ 'id' => 'required|numeric' ]);
      $modules = FacultyModules::where('faculty_id', $request->get('id') )->get();
      $output = [];
      foreach( $modules as $module )
      {
         $output[$module->id] = $module->name;
      }
      return $output;
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeacherDetails  $teacherDetails
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherDetails $teacherDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeacherDetails  $teacherDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherDetails $teacherDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeacherDetails  $teacherDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherDetails $teacherDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeacherDetails  $teacherDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherDetails $teacherDetails)
    {
        //
    }
}
