@extends('panel.layout.master', ['title' => __('panel.students')])

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
                            
                            {{-- Multilingual Name Fields --}}
                            @foreach(locales() as $key => $lang)
                                <div class="form-group">
                                    <label>{{ __('panel.name') }} ({{ $lang }}) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name_{{$key}}"
                                           value="{{ old('name_'.$key, isset($item) ? @$item->translate($key)->name : '') }}"
                                           required />
                                </div>
                            @endforeach

                            {{-- Email --}}
                            <div class="form-group">
                                <label>{{ __('panel.email') }} <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email"
                                       value="{{ old('email', $item->email ?? '') }}"
                                       required />
                            </div>

                            {{-- Password --}}
                            <div class="form-group">
                                <label>{{ __('panel.password') }} {{ isset($item) ? '' : '*' }}</label>
                                <input type="password" class="form-control" name="password"
                                       placeholder="{{ isset($item) ? __('panel.leave_blank_to_keep') : '' }}" />
                            </div>

                           

                        </div>
                    </div>
                </div>

               <div class="col-md-4">

                        <div class="card card-custom gutter-b">
                            <div class="card-footer">
                                <button type="submit" id="m_login_signin_submit"
                                        class="btn btn-primary mr-2 w-100">@lang('constants.save')
                                </button>
                            </div>
                        </div>
                    </div>


            </div>
        </form>
    </div>

</div>
@endsection
@push('panel_js')

    <script src="{{ asset('panelAssets/js/edit-user.js') }}"></script>
    <script src="{{ asset('panelAssets/js/post.js') }}"></script>
@endpush