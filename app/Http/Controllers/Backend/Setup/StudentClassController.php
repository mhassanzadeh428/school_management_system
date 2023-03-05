<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class StudentClassController extends Controller
{
    public function ViewStudent()
    {
        $data['allData'] = Models\StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }

    public function StudentClassAdd()
    {
        return view('backend.setup.student_class.add_class');
    }

    public function StudentClassStore(Request $request)
    {
        $validatedData = $request->validate(['name' => 'required|unique:student_classes,name',]);

        $data = new Models\StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Inserted Successfully',
            'alert-type' => 'success'


        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassEdit($id)
    {
        $editData = Models\StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', compact('editData'));
    }


    public function StudentClassUpdate(Request $request, $id)
    {

        $data = Models\StudentClass::find($id);
        $validatedData = $request->validate(['name' => 'required|unique:student_classes,name,' . $data->id]);


        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'success'


        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassDelete($id)
    {
        $user = Models\StudentClass::find($id);
        $user->Delete();
        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'info'


        );

        return redirect()->route('student.class.view')->with($notification);
    }
}
