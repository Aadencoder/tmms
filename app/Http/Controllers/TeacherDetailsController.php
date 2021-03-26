<?php

namespace App\Http\Controllers;

use App\Faculties;
use App\FacultyModules;
use App\Genders;
use App\Nationalities;
use App\TeacherDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


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
            'gender_id' => 'required|numeric',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required|max:150',
            'nationality_id' => 'required|numeric',
            'dob' => 'required',
            'faculty_id' => 'required|numeric',
            'faculty_module_id' => 'required|numeric',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return back()->withInput()
            ->withErrors($validator)
            ->withInput();
        }
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

 public function export($type = "CSV")
  {
        $data = TeacherDetails::get()->toArray();

         foreach ($data as $key => $dat) {
            
             $gender = Genders::where('id', $dat['gender_id'])->value('type'); 
             $faculty = Faculties::where('id', $dat['faculty_id'])->value('name'); 
             $facultyModule = FacultyModules::where('id', $dat['faculty_module_id'])->value('name'); 
             $nationality = Nationalities::where('id', $dat['nationality_id'])->value('name'); 

             // Reseting array key name
            $data[$key]['gender_id']= $gender;
            $data[$key]['gender'] = $data[$key]['gender_id'];
            unset($data[$key]['gender_id']);

            $data[$key]['nationality_id']= $nationality;
            $data[$key]['nationality'] = $data[$key]['nationality_id'];
            unset($data[$key]['nationality_id']);

            $data[$key]['faculty_id']= $faculty;
            $data[$key]['faculty'] = $data[$key]['faculty_id'];
            unset($data[$key]['faculty_id']);
            
            $data[$key]['faculty_module_id']= $facultyModule;
            $data[$key]['faculty_module'] = $data[$key]['faculty_module_id'];
            unset($data[$key]['faculty_module_id']);

        }

        return Excel::create('teachers_details', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
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
