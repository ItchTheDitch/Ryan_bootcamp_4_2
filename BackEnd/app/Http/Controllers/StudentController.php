<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getStudent(Request $request){

      $studentlist = Student::get();

      return response()->json($studentlist,201);

    }

    public function addStudent(Request $request){

        DB::Transaction();
      try {
          $this->validate($request,[
          'name'=> 'required',
          'email' => 'required|email',
          'gender'=> 'required',
          'dob' =>    'required|date',

        ]);

          $id = $request->input('id');
          $name = $request->input('name');
          $gender = $request->input('gender');
          $date = $request->input('dob');
          $address = $request->input('address');
          $email = $request->input('email');
          $phone = $request->input('phone');

            $slist = new Student;
            $slist->name = $name;
            $slist->gender = $gender;
            $slist->date = $date;
            $slist->address = $address;
            $slist->email = $email;
            $slist->phone =$phone;
            $slist->save();


            $studentedit = Student::updateOrCreate(
            ['id' => $id],
            ['name' => $name],
            ['gender'=>$gender],
            ['date'=>$date],
            ['address'=>$address],
            ['email'=>$email],
            ['phone'=>$phone],
            );

      $studentlist = transactions::get();

        DB::commit();
        return response()->json($studentlist,201);

      } catch (Exception $e) {
          DB::rollBack();
          return response()->json(["message" => $e->getMessage()],500);
      }

    }

    // public function editStudent(Request $request){
    //
    //   DB::Transaction();
    //
    //   try {
    //         $this->validate($request,[
    //         'name'=> 'required',
    //         'email' => 'required|email',
    //         'gender'=> 'required',
    //         'dob' =>    'required|date',
    //
    //       ]);
    //
    //     $id = $request->input('id');
    //     $name = $request->input('name');
    //     $name = $request->input('name');
    //     $gender = $request->input('gender');
    //     $date = $request->input('dob');
    //     $address = $request->input('address');
    //     $email = $request->input('email');
    //     $phone = $request->input('phone');
    //
    //     $slist = students::where ('id','=',$id)->first();
    //     $slist->name = $name;
    //     $slist->gender = $gender;
    //     $slist->date = $date;
    //     $slist->address = $address;
    //     $slist->email = $email;
    //     $slist->phone =$phone;
    //     $slist->save();
    //
    //     $studentlist = transactions::get();
    //
    //     DB::commit();
    //     return response()->json($studentlist,201);
    //
    //   } catch (Exception $e) {
    //     DB::rollBack();
    //     return response()->json(["message" => $e->getMessage()],500);
    //
    //   }
    //
    //
    // }
}
