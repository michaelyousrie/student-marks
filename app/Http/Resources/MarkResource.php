<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MarkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'subject'   => new SubjectResource($this->subject),
            'student'   => new StudentResource($this->student),
            'mark'      => $this->mark,
            'percentage' => $this->getPcg(),
            'created_at' => $this->created_at->format(env('GLOBAL_DATE_TIME_FORMAT', 'Y-m-d H:i:s A'))
        ];
    }
}
