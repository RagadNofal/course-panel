<?php

namespace App\Http\Resources\Panel;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
{
    public function toArray(Request $request): array
    {
         return [
        'title' => $this->title ?? '',
        'course' => $this->course->title ?? '-',
        'video_url' => $this->video_url ? url($this->video_url) : '',
        'duration' => ($this->duration !== null ? $this->duration . ' min' : ''),
        'active' => view('panel.lectures.partials.active_status', ['instance' => $this])->render(),
        'created_at' => $this->created_at ? $this->created_at->format('Y-m-d') : '',
        'options' => view('panel.lectures.partials.options', ['instance' => $this])->render(),
    ];
    }
}
