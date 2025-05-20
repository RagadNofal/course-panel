<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\LectureRequest;
use App\Models\Lecture;
use App\Models\Course;
use App\Http\Resources\Panel\LectureResource;
use Illuminate\Http\Request;

class LectureController extends Controller
{
   public function index(Request $request)
{
    $course = Course::findOrFail($request->course_id);
    return view('panel.lectures.index', compact('course'));
}

public function datatable(Request $request)
{
     $query = Lecture::query();

    if ($request->has('course_id')) {
        $query->where('course_id', $request->course_id);
    }

    $query->latest()->filter();

    $items = $query; 
    $resource = new LectureResource($items);

    return filterDataTable($items, $resource, $request);
}

    public function create()
    {
        return view('panel.lectures.create');
    }

    public function store(LectureRequest $request)
    {
        $data = $request->only(['course_id', 'video_url', 'duration']);

        $lecture = Lecture::create($data);
        $lecture->createTranslation($request);

        return response()->json([
            'status' => true,
            'message' => __('messages.done_successfully')
        ]);
    }

    public function edit($id)
    {
        $data['item'] = Lecture::findOrFail($id);
        return view('panel.lectures.create', $data);
    }

    public function update($id, LectureRequest $request)
    {
        $item = Lecture::find($id);

        if (!$item) {
            return response()->json([
                'status' => false,
                'message' => __('messages.not_found')
            ], 404);
        }

        $data = $request->only(['course_id', 'video_url', 'duration']);
        $item->update($data);
        $item->createTranslation($request);

        return response()->json([
            'status' => true,
            'message' => __('messages.done_successfully')
        ]);
    }

    public function destroy($id)
    {
        $item = Lecture::find($id);

        if ($item && $item->delete()) {
            return response()->json([
                'status' => true,
                'message' => __('messages.deleted_successfully')
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => __('messages.error')
        ], 500);
    }
    public function operation($id)
    {
        $item = Lecture::query()->find($id);
        if (isset($item)) {
            $item->is_active = !$item->is_active;
            $item->save();
            return response()->json([
                'status' => true,
                'message' => __('messages.done_successfully')
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => __('messages.error')
            ], 500);
        }
    }
}
