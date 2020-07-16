<?php

namespace App\Http\Controllers\Api;

use App\Subject;
use App\StudentMark;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MarkResource;
use App\Http\Requests\CreateStudentMarkRequest;
use App\Http\Requests\UpdateStudentMarkRequest;

class MarksController extends Controller
{
    public function store(CreateStudentMarkRequest $request)
    {
        $validate = StudentMark::where('subject_id', $request->subject_id)
            ->where('student_id', $request->student_id)
            ->first();

        if ($validate) {
            return ApiResponse::failure([
                'subject'   => "The student already has a mark for that subject"
            ]);
        }

        $subject = Subject::find($request->subject_id);

        if (!$this->validateSubjectMark($subject, $request->mark)) {
            return ApiResponse::failure([
                'mark'   => "This mark ({$request->mark}) is greater than the max mark for this subject ({$subject->max_mark})."
            ]);
        }

        $mark = StudentMark::create([
            'student_id'    => $request->student_id,
            'subject_id'    => $request->subject_id,
            'mark'          => $request->mark
        ]);

        return ApiResponse::success(
            new MarkResource($mark)
        );
    }

    public function update(UpdateStudentMarkRequest $request, StudentMark $mark)
    {
        if (!$this->validateSubjectMark($mark->subject, $request->mark)) {
            return ApiResponse::failure([
                'mark'   => "This mark ({$request->mark}) is greater than the max mark for this subject ({$mark->subject->max_mark})."
            ]);
        }

        $mark->update(['mark' => $request->mark]);

        return ApiResponse::success(
            new MarkResource($mark)
        );
    }

    private function validateSubjectMark($subject, $mark)
    {
        if (!$subject->acceptsMark($mark)) {
            return false;
        }

        return true;
    }
}
