<?php

namespace App\Http\Controllers\API;

use App\Models\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    public function index(){
       $students = Students::all();

       
    if($students ->count() > 0){
        $data =[ 
            'status' => 200,
            'message' => $students
        
            ];
        return response()->json($data, 200);
    }else{
        return response()->json([
            'status' => 404,
            'message' => 'No Records Found'
        ], 404);
    }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:191',
            'course' => 'required|string|max:191',
            'email' => 'required|string|max:191',
            'phone' => 'required|digits:11',
        ]);

        if($validator->fails()){
            return response()->json([
            'status' => 422,
            'error' => $validator->messages()
            ],422);
        }else{
            $students = Students::create([

            'name' => $request->name,
            'course' =>  $request->course,
            'email' =>  $request->email,
            'phone' =>  $request->phone
            ]);

            if($students){
                return response()->json([
                    'status' => 200,
                    'message' => 'Students registered Successfully'
                ], 200);

            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong!'
                ], 500);
                

            }

        }

        
    }

    public function show($id)
    {
        $student = Students::find($id);

        if($student){
            return response()->json([
                'status' => 200,
                'student' => $student
            ], 200);
            
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Student Not Found :('
            ], 404);
            

        }

        
        
    }

    public function edit($id){
        $student = Students::find($id);

        if($student){
            return response()->json([
                'status' => 200,
                'student' => $student
            ], 200);
            
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Student Not Found :('
            ], 404);
            

        }

    }

    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:191',
            'course' => 'required|string|max:191',
            'email' => 'required|string|max:191',
            'phone' => 'required|digits:11',
        ]);

        if($validator->fails()){
            return response()->json([
            'status' => 422,
            'error' => $validator->messages()
            ],422);
        }else{

            $students = Students::find($id);

          

            if($students){

                $students->update([

                    'name' => $request->name,
                    'course' =>  $request->course,
                    'email' =>  $request->email,
                    'phone' =>  $request->phone
                    ]);

                return response()->json([
                    'status' => 200,
                    'message' => 'Students Updated Successfully'
                ], 200);

            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Studnet Not Found! :('
                ], 404);
                

            }
        
    }
}
public function destroy($id){
    $students = Students::find($id);
    if($students){
        $students->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Studnet Deleted Successfully'
        ], 200);

    }else{
        return response()->json([
            'status' => 404,
            'message' => 'Studnet Not Found! :('
        ], 404);
    }


}





}
