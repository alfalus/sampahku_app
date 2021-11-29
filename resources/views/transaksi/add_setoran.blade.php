@php
$user = auth()->user();
@endphp

@extends('layouts.template')

@section('title')
    {{ $title }}
@endsection

@section('subheader')
    {{ $title }}
@endsection

@section('content')
    <div class="row" data-sticky-container="">
        <div class="col-lg-8">

            <div class="card card-custom gutter-b card-sticky-" id="kt_page_sticky_card">
                <div class="card-header">
                    <h3 class="card-title">Setoran Baru</h3>
                    <div class="card-toolbar">
                        {{-- <div class="example-tools justify-content-center"> --}}

                        {{-- <a href="{{ redirect()->back() }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>Back</a> --}}
                        {{-- </div> --}}


                    </div>
                </div>
                <form class="form" id="form_add" method="POST" action="/transaksi/setoran/add">
                    {{-- @csrf --}}
                    <meta name="csrf-token" content="{{ csrf_token() }}">

                    <div class="card-body">
                        {{-- <h3 class="font-size-lg text-dark font-weight-bold mb-6">1. Customer Info:</h3> --}}
                        <div class="mb-15">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Pilih Nasabah:</label>
                                <div class="col-lg-9 col-xl-6">
                                    <select class="form-control form-control-solid selectpicker" name="nasabah" id="nasabah"
                                        data-live-search="true" title="pilih nasabah">
                                    </select>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>
                            <h3 class="font-size-lg text-dark-75 font-weight-bold mb-10">Sampah yang Disetorkan
                                <span class="font-size-sm text-danger"><em>(*Isi dalam satuan Kilogram)</em></span>
                            </h3>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Botol:</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" name="item_botol"
                                            class="form-control form-control-lg- form-control-solid-"
                                            aria-describedby="basic-addon2" maxlength="5" value="" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Kaleng:</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" name="item_kaleng"
                                            class="form-control form-control-lg- form-control-solid-"
                                            aria-describedby="basic-addon2" maxlength="5" value="" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Emberan:</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" name="item_emberan"
                                            class="form-control form-control-lg- form-control-solid-"
                                            aria-describedby="basic-addon2" maxlength="5" value="" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Putihan:</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" name="item_putihan"
                                            class="form-control form-control-lg- form-control-solid-"
                                            aria-describedby="basic-addon2" maxlength="5" value="" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Kardus:</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" name="item_kardus"
                                            class="form-control form-control-lg- form-control-solid-"
                                            aria-describedby="basic-addon2" maxlength="5" value="" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Bounces:</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" name="item_bounces"
                                            class="form-control form-control-lg- form-control-solid-"
                                            aria-describedby="basic-addon2" maxlength="5" value="" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Kayu:</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" name="item_kayu"
                                            class="form-control form-control-lg- form-control-solid-"
                                            aria-describedby="basic-addon2" maxlength="5" value="" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Besi:</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <input type="text" name="item_besi"
                                            class="form-control form-control-lg- form-control-solid-"
                                            aria-describedby="basic-addon2" maxlength="5" value="" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-10"></div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-right">Hitung Penjualan:</label>
                                <div class="col-lg-6">
                                    <input type="text" name="total_penjualan"
                                        class="form-control form-control-solid col-lg-3-" placeholder="Rp" readonly />
                                    <span class="text-muted font-size-sm">Harga item sewaktu-waktu dapat berubah</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">Pilihan Pembayaran:</label>
                                <div class="col-lg-9 col-xl-6 col-form-label">
                                    <div class="radio-inline">
                                        <label class="radio radio-primary">
                                            <input type="radio" name="tipe_bayar" value="tunai" checked>
                                            <span></span>Tunai</label>
                                        <label class="radio radio-primary">
                                            <input type="radio" name="tipe_bayar" value="tabungan">
                                            <span></span>Tabungan</label>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
                <div class="card-footer text-right">
                    <a href="{{ url('/profil') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                        <i class="ki ki-long-arrow-back icon-sm"></i>Kembali
                    </a>
                    <button type="submit" onclick="document.getElementById('form_add').submit()"
                        class="btn btn-primary font-weight-bolder">
                        <i class="ki ki-check icon-sm"></i>Setor
                    </button>
                </div>
            </div>
        </div>

        <div class="col-lg-4">

            <div class="card card-custom card-stretch gutter-b sticky" id="" data-sticky="true" data-sticky-for="1023"
                data-sticky-class="sticky" data-margin-top="140px">
                <div class="card-header border-1">
                    <h3 class="card-title">Info Harga Terkini</h3>
                </div>

                <div class="card-body scroll scroll-pull" data-scroll="true" data-wheel-propagation="true"
                    style="height: 100vh">

                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody id="tbody">

                                <!--begin::Item-->
                                {{-- <tr>
                                    <td class="w-40px align-middle pb-6 pl-0 pr-2">
                                        <div class="symbol symbol-40 symbol-light-success">
                                            <span class="symbol-label">
                                                <span class="svg-icon svg-icon-lg svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path
                                                                d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                            <path
                                                                d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                                                fill="#000000" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">
                                        Top Authors</td>
                                    <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle pb-6">
                                        5.4MB</td>
                                </tr>
                                <tr>
                                    <td class="w-40px pb-6 pl-0 pr-2">
                                        <div class="symbol symbol-40 symbol-light-danger align-middle">
                                            <span class="symbol-label">
                                                <span class="svg-icon svg-icon-lg svg-icon-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <rect fill="#000000" x="4" y="4" width="7" height="7"
                                                                rx="1.5" />
                                                            <path
                                                                d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                                fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="font-size-lg font-weight-bolder text-dark-75 w-150px align-middle pb-6">
                                        Popular Authors</td>
                                    <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle pb-6">
                                        2.8MB</td>
                                </tr>
                                <tr>
                                    <td class="w-40px pb-6 pl-0 pr-2">
                                        <div class="symbol symbol-40 symbol-light-primary align-middle">
                                            <span class="symbol-label">
                                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
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
                                                </span>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="font-size-lg font-weight-bolder text-dark-75 w-150px align-middle pb-6">
                                        New Users</td>
                                    <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle pb-6">
                                        1.5MB</td>
                                </tr>
                                <tr>
                                    <td class="w-40px pl-0 pr-2">
                                        <div class="symbol symbol-40 symbol-light-warning align-middle">
                                            <span class="symbol-label">
                                                <span class="svg-icon svg-icon-lg svg-icon-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path
                                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                fill="#000000" />
                                                            <rect fill="#000000" opacity="0.3"
                                                                transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                x="16.3255682" y="2.94551858" width="3" height="18"
                                                                rx="1" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="font-size-lg font-weight-bolder text-dark-75 w-150px align-middle">Active
                                        Customers</td>
                                    <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle">
                                        890KB</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="assets/js/pages/features/miscellaneous/sticky-panels.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#nasabah').selectpicker();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

            });

            $.ajax({
                url: 'api/user/getNasabah/{!! $user->id_role !!}',
                type: 'get',
                success: function(result) {
                    if (result.status == 'ok') {
                        $.each(result.data, function(key, value) {
                            var $option = $("<option/>", {
                                value: value['id_user'],
                                text: value['nama_user']
                            });
                            $('#nasabah').append($option);
                        });
                        $('#nasabah').selectpicker('refresh');
                    } else {

                    }
                }
            });

            $.ajax({
                url: 'api/user/getPrice/{!! $user->id_role !!}',
                type: 'get',
                success: function(result) {
                    if (result.status == 'ok') {
                        var render = '';
                        for (let index = 0; index < result.data.length; index++) {
                            var html = `
                                <tr>
                                    <td class="w-40px align-middle pb-2 pl-0 pr-2">
                                        <div class="symbol symbol-50 symbol-light-success">
																		<div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-5.jpg')"></div>
																	</div>
                                    </td>
                                    <td class="font-size-md font-weight-bold text-dark-75 align-middle w-150px pb-2">
                                        ` + result.data[index].nama_kategori + `</td>
                                    <td class="w-120px font-weight-bolder font-size-lg text-dark-75 text-right align-middle pb-2">
                                        Rp ` + result.data[index].harga.toLocaleString('id') + `</td>
                                </tr>
                            `;

                            $("#tbody").append(html);
                        }

                        // $("#harga_terkini").html(render);
                    } else {

                    }
                }
            })

        });
    </script>
@endpush
