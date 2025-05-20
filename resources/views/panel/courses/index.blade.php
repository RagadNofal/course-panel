@extends('panel.layout.master' , ['title' => __('panel.courses')])
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="container">

            <!--begin::Card-->
            <div class="card card-custom">

                <div class="card-body mt-2">

                    <div class="mb-7">
                        <div class="row align-items-center d-flex justify-content-between">
                            <div class="col-lg-4 col-xl-4">
                                <div class="row align-items-center">
                                    <div class="col-md-12 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="بحث..."
                                                   id="kt_datatable_search_query"/>
                                            <span><i class="flaticon2-search-1 text-muted"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4 d-flex justify-content-end">
                                <a href="{{ route('panel.courses.create') }}"
                                   class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<i class="fa fa-plus"></i>
											</span>@lang('panel.add')
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>

                </div>
            </div>
            <!--end::Card-->
        </div>

    </div>
@endsection

@push('panel_js')

    <script src="{{ asset('panelAssets/js/data-ajax.js') }}"></script>

    <script>
        window.data_url = '{{route('panel.courses.datatable')}}';
         
        window.columns = [
           
            {
                field: ' ',
                title: "#",
                width: 120,
                textAlign: "center",
                template: function (data, index, datatable) {
                    return ((datatable.getCurrentPage() - 1) * datatable.getPageSize()) + index + 1;
                },
            },
            {
                field: 'title',
                title: '@lang('panel.title')',
                selector: false,
                textAlign: 'center',
            },
            {
                field: 'created_at',
                title: '@lang('panel.created_at')',
                selector: false,
                textAlign: 'center',
            },

            {
                field: 'active',
                title: '@lang('constants.status')',
                sortable: false,
                overflow: 'visible',
                autoHide: false,
                width: 120,

            },
               {
        field: 'id',
        title: 'ID',
        visible: false 
    
    },
        {
            
            field: 'options',
            title: '@lang('constants.actions')',
            sortable: false,
            overflow: 'visible',
            autoHide: false,
            width: 180,
            template: function (data, index, datatable) {
                 
                return `
                    <a href="/panel/courses/${data.id}/edit" class="btn btn-sm btn-clean btn-icon" title="@lang('constants.edit')">
                        <i class="flaticon2-edit"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-clean btn-icon delete" data-url="/panel/courses/${data.id}" title="@lang('constants.delete')">
                        <i class="flaticon2-delete"></i>
                    </a>
                    <a href="/panel/lectures?course_id=${data.id}" class="btn btn-sm btn-clean btn-icon" title="@lang('panel.lectures')">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </a>
                `;
            }
        }
        ];

    </script>


@endpush
