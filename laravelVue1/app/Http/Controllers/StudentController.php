<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return response()->json($students);
    }
    public function store(Request $request){
        $students = new Student([
            'name'=> $request->input('name'),
            'address'=> $request->input('address'),
            'phone'=> $request->input('phone')
        ]);
        $students->save();
        return response()->json('Student Information added');
    }
    public function show($id){
        $students = Student::find($id);
        return response()->json($students);

    }
    public function update(Request $request, $id){
        $students = Student::find($id);
        $students->update($request->all());
        return response()->json('Information Updated');
    }
    public function destroy( $id){
        $students = Student::find($id);
        $students->delete();
        return response()->json('Information Deleted');
    }
}
