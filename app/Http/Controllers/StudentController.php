<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Classes;
use App\Models\Student;


class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('students')
            ->join('classes', 'students.class_id', '=', 'classes.id')
            ->select('students.id', 'students.name', 'classes.faculty', 'students.email', 'students.address')
            ->get();
        return view('student', compact('students'));
    }
    public function create()
    {
        $faculties = Classes::all(); // Retrieve all faculties
        return view('addstudent', compact('faculties'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address'=>'required|string|max:255',
            'class_id' => 'required|exists:classes,id' 
        ]);

        // Create a new student record
        Student::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'address'=> $validatedData['address'],
            'class_id' => $validatedData['class_id']
        ]);

    
        return redirect()->route('student');
    }
    public function edit($id)
{
    $student= Student::find($id);
    $classes = Classes::all();
    return view('editstudent',compact('student','classes'));
}
public function update(Request $request, $id)
{
    $student = Student::find($id);

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'address' => 'required|string|max:255',
        'class_id' => 'required|exists:classes,id',
    ]);
    $student->name = $validatedData['name'];
    $student->email = $validatedData['email'];
    $student->address = $validatedData['address'];
    $student->class_id = $validatedData['class_id'];
    $res = $student->update();
    if ($res) {
        return redirect()->route('student')->with('success', 'Student details updated successfully!');
    } else {
        return redirect()->route('student.edit', $id)->with('error', 'Failed to update student details.');
    }
}


    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect('/');
        }
        $student->delete();
        return redirect('/');
    }
}
