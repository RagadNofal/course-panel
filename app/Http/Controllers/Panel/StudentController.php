<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\StudentRequest;
use App\Http\Resources\Panel\StudentResource;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    public function index()
    {
        return view('panel.students.index');
    }

    public function datatable()
    {
        $items = Student::query()->latest()->filter();
        $resource = new StudentResource($items);

        return filterDataTable($items, $resource, request());
    }

    public function create()
    {
       
       return view('panel.students.create');

    }
public function store(StudentRequest $request)
{
    $data = $request->all();

    $data['password'] = Hash::make($data['password']);
    $student = Student::query()->create($data);
    $student->createTranslation($request); 

    return response()->json([
        'status' => true,
        'message' => __('messages.done_successfully')
    ]);
}

    public function edit($id)
    {
        $data['item'] = Student::query()->findOrFail($id);
       
        return view('panel.students.create', $data);

    }

    public function update($id, StudentRequest $request)
    {
        $item = Student::query()->find($id);
        if (!$item) {
            return response()->json([
                'status' => false,
                'message' => __('messages.not_found')
            ], 404);
        }
        $data = $request->all();
        if ($request->password) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $item->password;
        }

        $item->update($data);
          $item->createTranslation($request);
        return response()->json([
            'status' => true,
            'message' => __('messages.done_successfully')
        ]);

    }

    public function destroy($id)
    {
        $item = Student::query()->find($id);

        if (isset($item) && $item->delete()) {
            return response()->json([
                'status' => true,
                'message' => __('messages.deleted_successfully')
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => __('messages.error')
            ], 500);
        }
    }


    public function operation($id)
    {
        $item = Student::query()->find($id);
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
