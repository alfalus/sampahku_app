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
        <div class="col-lg-4 gutter-b">

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-8">
                    <div class="card-title">
                        <h3 class="card-label">
                            <i class="text-primary fas fa-wallet mr-2"></i>
                            Dompet Saya
                        </h3>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex-">
                        <div class="text-center my-5">
                            <h1>Rp <span id="dompet_saya"><strong> 75.000</strong></span></h1>
                        </div>
                        <div class="mt-5">
                            <a href="javascript:;" class="text-hover-primar-y">Lihat detail dompet</a>
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" id="btn_penarikan">Buat Permintaan Penarikan</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--end::Advance Table Widget 4-->
        </div>
        {{-- </div>
    <div class="row gutter-t"> --}}
        <div class="col-lg-8">

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Riwayat Pencairan Dana
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

                    </div>
                    {{-- @endsection --}}

                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="tabel_riwayat_pribadi">
                        <thead>
                            <tr>
                                <th>Jumlah Penarikan</th>
                                <th>Tanggal Permintaan</th>
                                <th>Status</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['tanggal'] }}</td>
                                    <td>{{ $item['total_nominal'] }}</td>
                                    <td>{{ $item['bobot'] }}</td>
                                    <td>{{ $item['deskripsi'] }}</td>
                                    <td></td>
                                </tr>
                            @endforeach --}}
                            <tr>
                                <td>Rp 25.000</td>
                                <td>2021-12-10 06:29:56</td>
                                <td>waiting for confirmation</td>
                            </tr>
                            <tr>
                                <td>Rp 150.000</td>
                                <td>2021-12-10 06:29:56</td>
                                <td>done</td>
                            </tr>

                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>

            <!--end::Advance Table Widget 4-->
        </div>

    </div>

    <!-- Modal-->
    <div class="modal fade" id="modal_pencairan" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Penarikan Dana Nasabah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td class="border-top-0 w-5">Pemohon</td>
                            <td class="border-top-0">: <span id="user_setor"> Bank Sabah RT 02</td>
                        </tr>
                        <tr>
                            <td class="border-top-0 w-50-">Penerima</td>
                            <td class="border-top-0">: <span id="metode_bayar"></span>Satpel Kecamatan Johar Baru</td>
                        </tr>
                        <tr>
                            <td class="border-top-0 w-50-">Saldo</td>
                            <td class="border-top-0">: <span id="metode_bayar"></span><strong> Rp75.000</strong></td>
                        </tr>
                    </table>
                    <div class="separator separator-dashed my-5"></div>
                    <form action="" class="form">
                        <div class="form-group">
                            <label for="">Jumlah Penarikan <span class="text-danger font-size-sm">*</span> </label>
                            <input class="form-control" type="text" id="jumlah_penarikan" name="jumlah_penarikan"
                                placeholder="Contoh : 10000">
                            <div>

                                {{-- <span class="text-danger font-size-sm">Dana penarikan melebihi saldo tersedia</span> --}}
                            </div>
                            <div>
                                <span class="text-muted font-size-sm">Pastikan saldo tersedia</span>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <a href="javascript:;" class="btn btn-light-primary font-weight-bolder mr-2 text-left"
                        data-dismiss="modal">
                        <i class="ki ki-long-arrow-back icon-sm"></i>Batal
                    </a>
                    <button type="submit" onclick="" class="btn btn-primary font-weight-bolder px-10- w-100px-"
                        id="btn_submit">
                        <i class="ki ki-check icon-sm"></i>Submit
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/advanced/pencairan.js') }}"></script>
    <script>
        var role = '{!! auth()->user()->id_role !!}';
        $(document).ready(function() {
            $("#btn_penarikan").click(function() {
                $("#modal_pencairan").modal('show');
            });
            $(".btn-success").click(function() {
                // Swal.fire({
                //     title: "Konfirmasi Pencairan Anda",
                //     text: "Apakah anda yakin ingin mengkonfirmasi pencairan?",
                //     icon: "warning",
                //     showCancelButton: true,
                //     confirmButtonText: "Konfirmasi Pencairan",
                //     cancelButtonText: "Batalkan Pencairan",
                //     reverseButtons: true,
                //     customClass: {
                //         confirmButton: "btn btn-success",
                //         cancelButton: "btn btn-danger"
                //     }
                // }).then(function(result) {
                //     if (result.value) {
                //         Swal.fire(
                //             "Pencairan berhasil!",
                //             "Permintaan anda telah berhasil.",
                //             "success"
                //         )
                //         // result.dismiss can be "cancel", "overlay",
                //         // "close", and "timer"
                //     } else if (result.dismiss === "cancel") {
                //         Swal.fire(
                //             "Pencairan dibatalkan",
                //             "Permintaan anda telah dibatalkan",
                //             "error"
                //         )
                //     }
                // });
                // $("#modal_pencairan").modal('show');
            });


        })
    </script>
@endpush
