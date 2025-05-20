<?php


namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\StudentCourseRequest;
use App\Models\Student;
use App\Models\Course;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use App\Http\Resources\Panel\StudentCourseResource;

class StudentCourseController extends Controller
{
    public function index()
    {
        return view('panel.student_courses.index');
    }

  public function datatable()
{
    $items = StudentCourse::with(['student', 'course'])->latest();
    $resource = new StudentCourseResource($items);

    return filterDataTable($items, $resource, request());
}

    public function create()
    {
        $data['students'] = Student::all();
        $data['courses'] = Course::all();
        return view('panel.student_courses.create', $data);
    }

    public function store(StudentCourseRequest $request)
    {
        StudentCourse::create($request->validated());

        return response()->json([
            'status' => true,
            'message' => __('messages.done_successfully')
        ]);
    }

    public function edit($id)
    {
        $data['item'] = StudentCourse::findOrFail($id);
        $data['students'] = Student::all();
        $data['courses'] = Course::all();

        return view('panel.student_courses.create', $data);
    }

    public function update($id, StudentCourseRequest $request)
    {
        $item = StudentCourse::findOrFail($id);
        $item->update($request->validated());

        return response()->json([
            'status' => true,
            'message' => __('messages.done_successfully')
        ]);
    }

    public function destroy($id)
    {
        $item = StudentCourse::find($id);

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
    $item = StudentCourse::query()->find($id);

    if ($item) {
        $item->is_active = !$item->is_active;
        $item->save();

        return response()->json([
            'status' => true,
            'message' => __('messages.done_successfully')
        ]);
    }

    return response()->json([
        'status' => false,
        'message' => __('messages.error')
    ], 500);
}

}

