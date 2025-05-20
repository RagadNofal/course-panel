<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;

class LectureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth('admin')->check();
    }

    public function rules(): array
    {
        $rules = [];

        
        foreach (locales() as $key => $lang) {
            $rules['title_' . $key] = 'required|string|max:255';
        }

        
        //$rules['course_id'] = 'required|exists:courses,id';
        $rules['video_url'] = 'required|url|max:1000';
        $rules['duration'] = 'required|integer|min:1';

        return $rules;
    }

    public function attributes()
    {
        $attrs = [];

        foreach (locales() as $key => $lang) {
            $attrs['title_' . $key] = __('panel.title') . ' (' . $lang . ')';
        }

        $attrs['course_id'] = __('panel.course');
        $attrs['video_url'] = __('panel.video_url');
        $attrs['duration'] = __('panel.duration');

        return $attrs;
    }
}
