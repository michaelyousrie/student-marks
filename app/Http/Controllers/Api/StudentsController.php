<?php

namespace App\Http\Controllers\Api;

use App\Student;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\MarkResource;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\StudentMark;
use Facade\FlareClient\Api;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return ApiResponse::success(
            StudentResource::collection($students)
        );
    }

    /** 
     * Unused in the front end to save time. 
     * Tested with postman.
     * */
    public function indexPaginated()
    {
        $students = Student::simplePaginate();

        return ApiResponse::success(
            new StudentCollection($students)
        );
    }

    public function store(CreateStudentRequest $request)
    {
        $student = Student::create([
            'name'          => $request->name
        ]);

        return ApiResponse::success(
            new StudentResource($student)
        );
    }

    public function update(Student $student, UpdateStudentRequest $request)
    {
        $student->update(['name' => $request->name]);

        return ApiResponse::success(
            new StudentResource($student)
        );
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return ApiResponse::success();
    }

    public function listMarks(Student $student)
    {
        return ApiResponse::success(
            MarkResource::collection($student->marks)
        );
    }
}
