<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;

class StudentCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth('admin')->check(); // or adapt as needed
    }

    public function rules(): array
    {
        return [
            'student_id'   => 'required|exists:students,id',
            'course_id'    => 'required|exists:courses,id',
            'enrolled_at'  => 'nullable|date',
           'progress' => 'required|integer|min:0|max:100',
        ];
    }

    public function attributes()
    {
        return [
            'student_id'   => __('panel.student'),
            'course_id'    => __('panel.course'),
            'enrolled_at'  => __('panel.enrolled_at'),
            'progress'     => __('panel.progress'),
        ];
    }
}
