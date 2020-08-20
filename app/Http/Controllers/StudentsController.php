<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    public function storeStudent(Request $request)
    {
        $student = new Students();
        $student->name = $request->name;
        $student->major = $request->major;
        $student->save();

        return $student;
    }

    public function getStudents(Request $request)
    {
        $students = Students::all();

        return $students;
    }

    public function deleteStudent(Request $request)
    {
        $student = Students::find($request->id)->delete();
    }

    public  function editStudent(Request $request, $id)
    {
        $student = Students::where('id', $id)->first();

        $student->name = $request->get('val_1');
        $student->major = $request->get('val_2');
        $student->save();

        return $student;
    }
}
