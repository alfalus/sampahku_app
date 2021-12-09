@php
$user = auth()->user();
@endphp

@extends('layouts.template')

@section('css')
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

@endsection

@section('title')
    {{ $title }}
@endsection

@section('subheader')
    {{ $title }}
@endsection

@section('content')

    @if (session('response'))
        <div class="alert alert-custom alert-notice alert-light-{{ session('response') == 'fail' ? 'danger' : 'success' }} fade show"
            role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">{{ session('message') }}</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
    @endif

    {{-- <div class="row">
        <div class="col-lg-6 col-xxl-4">
            <!--begin::Stats Widget 11-->
            <div class="card card-custom card-stretch card-stretch-half gutter-b">
                <!--begin::Body-->
                <div class="card-body p-0">
                    <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                            <path
                                                d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">750$</span>
                            <span class="text-muted font-weight-bold mt-2">Weekly Income</span>
                        </div>
                    </div>
                    <div id="kt_stats_widget_11_chart" class="card-rounded-bottom" data-color="success"
                        style="height: 150px"></div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 11-->
            <!--begin::Stats Widget 12-->
            <div class="card card-custom card-stretch card-stretch-half gutter-b">
                <!--begin::Body-->
                <div class="card-body p-0">
                    <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-primary mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path
                                                d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">+6,5K</span>
                            <span class="text-muted font-weight-bold mt-2">New Users</span>
                        </div>
                    </div>
                    <div id="kt_stats_widget_12_chart" class="card-rounded-bottom" data-color="primary"
                        style="height: 150px"></div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 12-->
        </div>
    </div> --}}

    {{-- <div class="card card-custom card-sticky gutter-b example- example-compact- " id="kt_page_sticky_card">
        <div class="card-header">
            <h3 class="card-title">Setoran Hari Ini</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <a href="{{ url('/transaksi/setoran/add') }}">
                        <button class="btn btn-primary" title="Tambah user baru">
                            <i class="fas fa-plus"></i>
                            Setoran Baru
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
        </div>
    </div> --}}

    <div class="row">
        <div class="col-lg-12">
            <!--begin::Advance Table Widget 4-->
            {{-- <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Setoran Hari Ini</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ url('/transaksi/setoran/add') }}">
                            <button class="btn btn-primary" title="Tambah user baru">
                                <i class="fas fa-plus"></i>
                                Setoran Baru
                            </button>
                        </a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                    <div class="tab-content">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                <thead>
                                    <tr class="text-left text-uppercase">
                                        <th style="min-width: 250px" class="pl-7">
                                            <span class="text-dark-75">nasabah</span>
                                        </th>
                                        <th style="min-width: 100px">tanggal transaksi</th>
                                        <th style="min-width: 100px">setoran</th>
                                        <th style="min-width: 100px">pembayaran</th>
                                        <th style="min-width: 130px">aksi</th>
                                        <th style="min-width: 80px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50 symbol-light mr-4">
                                                    <span class="symbol-label">
                                                        <img src="assets/media/svg/avatars/001-boy.svg"
                                                            class="h-75 align-self-end" alt="" />
                                                    </span>
                                                </div>
                                                <div>
                                                    <a href="#"
                                                        class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Brad
                                                        Simmons</a>
                                                    <span class="text-muted font-weight-bold d-block">HTML, JS,
                                                        ReactJS</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">$8,000,000</span>
                                            <span class="text-muted font-weight-bold">In Proccess</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$520</span>
                                            <span class="text-muted font-weight-bold">Paid</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                                            <span class="text-muted font-weight-bold">Web, UI/UX Design</span>
                                        </td>
                                        <td class="pr-0 text-right">
                                            <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View
                                                Offer</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-0">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50 symbol-light mr-4">
                                                    <span class="symbol-label">
                                                        <img src="assets/media/svg/avatars/018-girl-9.svg"
                                                            class="h-75 align-self-end" alt="" />
                                                    </span>
                                                </div>
                                                <div>
                                                    <a href="#"
                                                        class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Jessie
                                                        Clarcson</a>
                                                    <span class="text-muted font-weight-bold d-block">C#, ASP.NET, MS
                                                        SQL</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">$23,000,000</span>
                                            <span class="text-muted font-weight-bold">Pending</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$1,600</span>
                                            <span class="text-muted font-weight-bold">Rejected</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Agoda</span>
                                            <span class="text-muted font-weight-bold">Houses &amp; Hotels</span>
                                        </td>
                                        <td class="pr-0 text-right">
                                            <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View
                                                Offer</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50 symbol-light mr-4">
                                                    <span class="symbol-label">
                                                        <img src="assets/media/svg/avatars/047-girl-25.svg"
                                                            class="h-75 align-self-end" alt="" />
                                                    </span>
                                                </div>
                                                <div>
                                                    <a href="#"
                                                        class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Lebron
                                                        Wayde</a>
                                                    <span class="text-muted font-weight-bold d-block">PHP, Laravel,
                                                        VueJS</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">$34,000,000</span>
                                            <span class="text-muted font-weight-bold">Paid</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$6,700</span>
                                            <span class="text-muted font-weight-bold">Paid</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">RoadGee</span>
                                            <span class="text-muted font-weight-bold">Paid</span>
                                        </td>
                                        <td class="pr-0 text-right">
                                            <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View
                                                Offer</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-0 py-0">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50 symbol-light mr-4">
                                                    <span class="symbol-label">
                                                        <img src="assets/media/svg/avatars/014-girl-7.svg"
                                                            class="h-75 align-self-end" alt="" />
                                                    </span>
                                                </div>
                                                <div>
                                                    <a href="#"
                                                        class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Natali
                                                        Trump</a>
                                                    <span class="text-muted font-weight-bold d-block">,
                                                        ReactJS</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-left pr-0">
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">$2,600,000</span>
                                            <span class="text-muted font-weight-bold">Paid</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">$14,000</span>
                                            <span class="text-muted font-weight-bold">Pending</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">The
                                                Hill</span>
                                            <span class="text-muted font-weight-bold">Insurance</span>
                                        </td>
                                        <td class="pr-0 text-right">
                                            <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm"
                                                style="width: 7rem">View Offer</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Body-->
            </div> --}}

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Setoran
                            {{-- <div class="text-muted pt-2 font-size-sm">custom colu rendering</div> --}}
                        </h3>
                    </div>

                    {{-- @section('custom_toolbar') --}}
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="svg-icon svg-icon-md">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                fill="#000000" opacity="0.3" />
                                            <path
                                                d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>Export</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi flex-column navi-hover py-2">
                                    <li
                                        class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                        Choose an option:</li>
                                    <li class="navi-item" id="export_print">
                                        <a href="javascript:;" class="navi-link" id="export_print">
                                            <span class="navi-icon">
                                                <i class="la la-print"></i>
                                            </span>
                                            <span class="navi-text">Print</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="javascript:;" class="navi-link" id="export_copy">
                                            <span class="navi-icon">
                                                <i class="la la-copy"></i>
                                            </span>
                                            <span class="navi-text">Copy</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="javascript:;" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-excel-o"></i>
                                            </span>
                                            <span class="navi-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="javascript:;" class="navi-link" id="export_excel">
                                            <span class="navi-icon">
                                                <i class="la la-file-text-o"></i>
                                            </span>
                                            <span class="navi-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="javascript:;" class="navi-link" id="export_pdf">
                                            <span class="navi-icon">
                                                <i class="la la-file-pdf-o"></i>
                                            </span>
                                            <span class="navi-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        <a href="{{ url('/transaksi/setoran/add') }}">
                            <button class="btn btn-primary" title="Tambah user baru">
                                <i class="fas fa-plus"></i>
                                Penerimaan Baru
                            </button>
                        </a>
                        <!--end::Button-->
                    </div>
                    {{-- @endsection --}}

                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                            <tr>
                                <th>Nasabah</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nominal Setoran</th>
                                <th>Berat Setoran</th>
                                <th>Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['tanggal'] }}</td>
                                    <td>{{ $item['total_jual'] }}</td>
                                    <td>{{ $item['bobot'] }}</td>
                                    <td>{{ $item['deskripsi'] }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            {{-- <tr>
                                <td>Aldo Alfalus</td>
                                <td>10 Nov 2021#10:43:00</td>
                                <td>51.700</td>
                                <td>8 Kg</td>
                                <td>2</td>
                                <td nowrap="nowrap"></td>
                            </tr> --}}

                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>

            <!--end::Advance Table Widget 4-->
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/advanced/terima-setoran.js') }}"></script>

@endpush
