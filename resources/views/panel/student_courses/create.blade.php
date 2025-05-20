@extends('panel.layout.master', ['title' => __('panel.student_courses')])

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    @php $item = $item ?? null; @endphp

    <div class="container">
        <form method="POST" action="{{ url()->current() }}" enctype="multipart/form-data" class="form-horizontal" id="form">
            @csrf
            @if(isset($item))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-8">
                    <div class="card card-custom gutter-b">
                        <div class="card-body">

                            {{-- Student --}}
                            <div class="form-group">
                                <label>{{ __('panel.student') }} <span class="text-danger">*</span></label>
                                <select name="student_id" class="form-control" required>
                                    <option value="">{{ __('constants.choose') }}</option>
                                    @foreach(\App\Models\Student::all() as $student)
                                        <option value="{{ $student->id }}"
                                            {{ old('student_id', $item->student_id ?? '') == $student->id ? 'selected' : '' }}>
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Course --}}
                            <div class="form-group">
                                <label>{{ __('panel.course') }} <span class="text-danger">*</span></label>
                                <select name="course_id" class="form-control" required>
                                    <option value="">{{ __('constants.choose') }}</option>
                                    @foreach(\App\Models\Course::all() as $course)
                                        <option value="{{ $course->id }}"
                                            {{ old('course_id', $item->course_id ?? '') == $course->id ? 'selected' : '' }}>
                                            {{ $course->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Progress --}}
                            <div class="form-group">
                                <label>{{ __('panel.progress') }} %</label>
                                <input type="number" name="progress" class="form-control" min="0" max="100" step="1"
                                       value="{{ old('progress', $item->progress ?? '') }}">
                            </div>

                            {{-- Enrolled At --}}
                            <div class="form-group">
                                <label>{{ __('panel.enrolled_at') }}</label>
                                <input type="datetime-local" name="enrolled_at" class="form-control"
                                       value="{{ old('enrolled_at', isset($item->enrolled_at) ? \Carbon\Carbon::parse($item->enrolled_at)->format('Y-m-d\TH:i') : '') }}">
                            </div>

                            {{-- Active Toggle
                            <div class="form-group">
                                <label>{{ __('panel.is_active') }}</label>
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline checkbox-primary">
                                        <input type="checkbox" name="is_active"
                                               {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
                                        <span></span>
                                        {{ __('panel.active') }}
                                    </label>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom gutter-b">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2 w-100">@lang('constants.save')</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

</div>
@endsection

@push('panel_js')
    <script src="{{ asset('panelAssets/js/post.js') }}"></script>
@endpush
