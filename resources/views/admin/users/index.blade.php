@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('title')
    {{ __('admin.users') }}
@stop


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin.users') }} </h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                    {{ __('admin.users') }}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
    @if (session()->has('Add'))
        <script>
            toastr.success("{{ __('admin.added_successfully') }}")
        </script>
    @endif
    @if (session()->has('edit'))
        <script>
            toastr.success("{{ __('admin.update_successfullay') }}")
        </script>
    @endif
    @if (session()->has('delete'))
        <script>
            toastr.error("{{ __('admin.delete_successfully') }}")
        </script>
    @endif

    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <a href={{ url('users/user/create') }} class="modal-effect btn btn-sm btn-primary"
                        style="color:white"><i class="fas fa-plus"></i>&nbsp; {{ __('admin.add') }}</a>

                    @can('تصدير EXCEL')
                        <a class="modal-effect btn btn-sm btn-primary" href="{{ url('export_invoices') }}"
                            style="color:white"><i class="fas fa-file-download"></i>&nbsp;تصدير اكسيل</a>
                    @endcan

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap"
                            data-page-length='50'style="text-align: center">
                            <thead>
                                <tr class="align-self-center">
                                    <th class="border-bottom-0">#</th>
                                    <th style="text-align:center">{{ __('admin.image') }}</th>

                                    <th class="border-bottom-0">{{ __('admin.name') }}</th>
                                    <th class="border-bottom-0">{{ __('admin.email') }}</th>
                                    <th class="border-bottom-0">{{ __('admin.phone') }}</th>
                                    <th class="border-bottom-0">{{ __('admin.balance') }}</th>

                                    <th class="border-bottom-0">{{ __('admin.control') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($users as $item)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        @isset($item->attachmentRelation[0])
                                            <td><img src="{{ asset($item->attachmentRelation[0]->path) }} " alt="avatar"
                                                    height="60" style="border-radius:20px;"></td>
                                        @else
                                            <td><img src="{{ asset('assets/img/profile.png') }}" alt="avatar"
                                                    height="60"></td>
                                        @endisset
                                        <td>{{ $item->name }} </td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->number }}</td>
                                        @isset($item->wallet)
                                        <td>{{ $item->wallet->balance }}</td>
                                        @else
                                        <td>0</td>
                                        @endisset
                                        <td>

                                            <a href="{{ route('user.edit', $item->id) }}"
                                                class="btn round btn-outline-primary">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <span class=" btn round btn-outline-danger delete-row text-danger"
                                                data-url="{{ url('users/user/delete/' . $item->id) }}"><i
                                                    class="fa-solid fa-trash"></i></span>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
</div>
</div>



@endsection

@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js') }}"></script>

    {{-- delete one user script --}}
    @include('dashboard.shared.deleteOne')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- delete one user script --}}

@endsection
