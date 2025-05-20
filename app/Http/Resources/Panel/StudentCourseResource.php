<?php

namespace App\Http\Resources\Panel;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentCourseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'student' => $this->student?->name ?? '-',
            'course' => $this->course?->title ?? '-',
            'enrolled_at' => $this->enrolled_at?->format('Y-m-d'),
            'progress' => $this->progress . '%',
            'active' => view('panel.student_courses.partials.active_status', ['instance' => $this])->render(),
            'options' => view('panel.student_courses.partials.options', ['instance' => $this])->render(),
        ];
    }
}
