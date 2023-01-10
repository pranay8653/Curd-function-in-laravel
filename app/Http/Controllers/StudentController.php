<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    // open create data blade
    public function create()
    {
        return view('create_student');
    }

    // Store data
    public function store(Request $request)
     {
        $data = $request->validate([
            'name' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required'],
            'file_upload' => ['required']
        ]);

        $file_path = 'assets/uploads/profile_pictures';
        File::isDirectory($file_path) or File::makeDirectory($file_path, 0777, true, true);
        $file_name = Carbon::now()->timestamp;
        $file_extension = $request['file_upload']->getClientOriginalExtension();
        $data['file_upload']->move($file_path, $file_name.'.'.$file_extension);


        $student = Student::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'file_upload' => $file_name.'.'.$file_extension,
        ]);
        return redirect()->route('show.student');
     }

     // show Student list
     public function index()
     {
        $data = Student::all();
        return view('student_list',compact('data'));
     }

     // open edit blade
    public function edit($id)
    {
        $student = student::find($id);
        return view('edit_student', compact('student'));
    }

    // update data
    public function update(Request $request, $id)
    {
        $student = student::find($id);
        $student->update([
            'name' => $request['name'],
            'address' => $request['address'],
            'phone_number' => $request['phone_number'],
        ]);
        return redirect()->route('show.student');
    }

    // delete data
   public function delete($id)
   {
       $student = student::find($id);
       if(!is_null($student))
        {
           $student->delete();
        }
       return redirect()->route('show.student');
   }
}
