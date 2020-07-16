<?php

namespace App\Http\Controllers\Api;

use App\Subject;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Resources\SubjectCollection;
use App\Http\Resources\SubjectResource;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::simplePaginate();

        return ApiResponse::success(
            new SubjectCollection($subjects)
        );
    }

    public function store(CreateSubjectRequest $request)
    {
        $subject = Subject::create([
            'name'          => $request->name,
            'max_mark'      => $request->max_mark
        ]);

        return ApiResponse::success(
            new SubjectResource($subject)
        );
    }

    public function update(Subject $subject, UpdateSubjectRequest $request)
    {
        $subject->update([
            'name'      => $request->name,
            'max_mark'  => $request->max_mark
        ]);

        return ApiResponse::success(
            new SubjectResource($subject)
        );
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return ApiResponse::success();
    }
}
