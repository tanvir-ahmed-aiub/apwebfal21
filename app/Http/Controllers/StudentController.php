<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function Create(){
        return view('pages.students.create');
    }
    public function createSubmit(Request $request){
        //using requests validate method
        /*$validate = $request->validate([
                'name'=>'required|min:5|max:10',
                'id'=>'required',
                'dob'=>'required',
                'email'=>'email'
            ],
            [
                'name.required'=>'Please put your name',
                'name.min'=>'Name must be greater than 2 charcters'
            ]
        );*/
        //using class validate method
        $this->validate(
            $request,
            [
                'name'=>'required|min:5|max:10|regex:/^[A-Za-z]+$/',
                'id'=>'required',
                'dob'=>'required',
                'email'=>'email',
                'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/'
            ],
            [
                'name.required'=>'Please put your name',
                'name.min'=>'Name must be greater than 2 charcters'
            ]
        );

        return "OK";      
    }
    public function list(){
        $students = array();
        for($i=0;$i<10;$i++){
            $student=array(
                "name"=>"Student ".($i+1),
                "id" =>($i+1),
                "dob" =>"12.12.12"
            );
            $students[] = (object)$student;
        }
        return view('pages.students.list')->with('students',$students);
    }
    public function edit(Request $request){
        return $request->id;

    }

}
