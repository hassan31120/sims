@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')
{{ __('admin.contac') }}
@stop


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin.contac') }}
                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                    {{ __('admin.contac') }}
                </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
@if (session()->has('delete'))
<script>
    toastr.error( "{{ __('admin.delete_successfully') }}")

</script>
@endif
    <div class="page-wrapper">

        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body border-bottom py-3">
                                <div class="table-responsive text-center">
                                    <table id="example" class="table table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center">{{ __('admin.name') }}</th>
                                                <th style="text-align:center">{{ __('admin.phone_number') }}</th>
                                                <th style="text-align:center">{{ __('admin.email') }}</th>
                                                <th style="text-align:center">{{ __('admin.message') }}</th>
                                                <th style="text-align:center">{{ __('admin.control') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($contacts as $item)
                                                <tr class="align-self-center">
                                                    <td>{{ $item->f_name . $item->l_name }}</td>
                                                    <td>{{ $item->number }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->message }}</td>
                                                    <td>
                                                        <span class=" btn round btn-outline-danger delete-row text-danger"
                                                            data-url="{{ url('settings/contact/delete/' . $item->id) }}">
                                                            <i class="fa-solid fa-trash"></i></span>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="7">{{ __('admin.there_is_no_data_at_the_moment') }}</td>
                                                </tr>
                                            @endforelse                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

    @endsection

    @section('js')

        {{-- delete one user script --}}
        @include('dashboard.shared.deleteOne')
        {{-- delete one user script --}}
    @endsection
