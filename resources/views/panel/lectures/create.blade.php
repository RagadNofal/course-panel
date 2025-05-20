@extends('panel.layout.master', ['title' => __('panel.lectures')])

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    @php $item = $item ?? null; @endphp

    <div class="container">
        <form method="POST" action="{{ url()->current() }}" enctype="multipart/form-data" class="form-horizontal" id="form">
            @csrf
           <input type="hidden" name="course_id" value="{{ old('course_id', $item->course_id ?? request('course_id')) }}">

            @if(isset($item))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-8">
                    <div class="card card-custom gutter-b">
                        <div class="card-body">

                            {{-- Multilingual Title Fields --}}
                            @foreach(locales() as $key => $lang)
                                <div class="form-group">
                                    <label>{{ __('panel.title') }} ({{ $lang }}) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title_{{$key}}"
                                           value="{{ old('title_'.$key, isset($item) ? @$item->translate($key)->title : '') }}"
                                           required />
                                </div>
                            @endforeach

                            {{-- Course ID
                            <div class="form-group">
                                <label>{{ __('panel.course') }} <span class="text-danger">*</span></label>
                                <select name="course_id" class="form-control" required>
                                    <option value="">{{ __('panel.select_course') }}</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}"
                                            {{ old('course_id', $item->course_id ?? '') == $course->id ? 'selected' : '' }}>
                                            {{ $course->title ?? $course->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}

                            {{-- Video URL --}}
                            <div class="form-group">
                                <label>{{ __('panel.video_url') }}</label>
                                <input type="url" class="form-control" name="video_url"
                                       value="{{ old('video_url', $item->video_url ?? '') }}" />
                            </div>

                            {{-- Duration --}}
                            <div class="form-group">
                                <label>{{ __('panel.duration') }} ({{ __('panel.minutes') }})</label>
                                <input type="number" class="form-control" name="duration"
                                       value="{{ old('duration', $item->duration ?? '') }}" min="0" />
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom gutter-b">
                        <div class="card-footer">
                            <button type="submit" id="m_login_signin_submit"
                                    class="btn btn-primary mr-2 w-100">@lang('constants.save')</button>
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
