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
                        <h3 class="card-label">Riwayat Penjualan Setoran
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
                        <a href="{{ url('/transaksi/jual-setoran/add') }}">
                            <button class="btn btn-primary" title="Tambah user baru">
                                <i class="fas fa-plus"></i>
                                Setoran Baru
                            </button>
                        </a>
                        <!--end::Button-->
                    </div>
                    {{-- @endsection --}}

                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="tabel_jual">
                        <thead>
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <th>Nominal Setoran</th>
                                <th>Berat Setoran</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item['tanggal'] }}</td>
                                    <td>{{ $item['total_nominal'] }}</td>
                                    <td>{{ $item['bobot'] }}</td>
                                    <td>{{ $item['metode_pembayaran'] }}</td>
                                    <td>{{ $item['status'] }}</td>
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
