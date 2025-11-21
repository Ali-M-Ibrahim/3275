<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Traits\APIResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class StudentController extends Controller implements HasMiddleware
{
    use APIResponse;

    public static function middleware(): array
    {
        return [
            'middleware2'
        ];
    }

    public function index(){
        $students = Student::all();
        $data = StudentResource::collection($students);
        return $this->successResponse($data,201);
    }

    public function getById($id){
        $student = Student::find($id);
        $obj = new StudentResource($student);
        return $this->successResponse($obj);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->errorResponse($errors);
        }
        return "ok";
    }
}
