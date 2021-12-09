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
    {{ dd(session()->all()) }}
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
                                <label class="col-xl-3 col-lg-3 col-form-label">Pilih Nasabah</label>
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



                            @foreach ($data as $item)

                                <div class="form-group row">
                                    <label
                                        class="col-xl-3 col-lg-3 col-form-label">{{ ucwords($item['nama_kategori']) }}</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <input type="text" name="item_{{ $item['nama_kategori'] }}"
                                                class="form-control form-control-lg- form-control-solid- "
                                                aria-describedby="basic-addon2" maxlength="5" value=""
                                                harga="{{ $item['harga'] }}" nama-item="{{ $item['nama_kategori'] }}" />
                                            <div class="  input-group-append">
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="form-group row">
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
                            </div> --}}

                            {{-- <div class="form-group row">
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
                            </div> --}}

                            {{-- <div class="form-group row">
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
                            </div> --}}

                            {{-- <div class="form-group row">
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
                            </div> --}}

                            {{-- <div class="form-group row">
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
                            </div> --}}

                            {{-- <div class="form-group row">
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
                            </div> --}}

                            {{-- <div class="form-group row">
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
                            </div> --}}

                            {{-- <div class="form-group row">
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
                            </div> --}}

                            <div class="separator separator-dashed my-10"></div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Hitung Penjualan</label>
                                <div class="col-lg-6">
                                    <input type="text" name="total_penjualan" id="total_penjualan"
                                        class="form-control form-control-solid col-lg-3-" placeholder="Rp" readonly
                                        value="" />
                                    <span class="text-muted font-size-sm">Harga item sewaktu-waktu dapat berubah</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Pilihan Pembayaran</label>
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
                    <div class="d-flex justify-content-between">
                        <a href="{{ url('/transaksi/setoran') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>Kembali
                        </a>
                        <div>
                            <button id="btn_review" class="btn btn-outline-primary w-100px" data-toggle="modal-"
                                data-target="#modal_review-">
                                <i class="flaticon-eye"></i> Review
                            </button>

                        </div>
                    </div>
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

                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-->
    <div class="modal fade" id="modal_review" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Review Setoran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td class="border-top-0 w-5">User</td>
                            <td class="border-top-0">: <span id="user_setor"></td>
                        </tr>
                        <tr>
                            <td class="border-top-0 w-50-">Metode</td>
                            <td class="border-top-0">: <span id="metode_bayar"></span></td>
                        </tr>
                    </table>
                    <div class="separator separator-dashed my-5"></div>
                    <table class="table border-1" id="tabel_review">
                        <thead>
                            <th class="">Kategori</th>
                            <th class="text-center">Item x harga</th>
                            <th class="text-center">Sub Total</th>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td class="border-top-0">Botol</td>
                                <td class="border-top-0 text-center">1 kg x Rp 8.313</td>
                                <td class="border-top-0 text-center"><strong> Rp 8.313</strong></td>
                            </tr>
                            <tr>
                                <td class="border-top-0">Kaleng</td>
                                <td class="border-top-0 text-center">1 kg x Rp 8.313</td>
                                <td class="border-top-0 text-center"><strong> Rp 10.818</strong></td>
                            </tr>
                            <tr>
                                <td class="border-top-0">Emberan</td>
                                <td class="border-top-0">1 kg</td>
                            </tr>
                            <tr>
                                <td class="border-top-0">Putihan</td>
                                <td class="border-top-0">1 kg</td>
                            </tr>
                            <tr>
                                <td class="border-top-0">Kardus</td>
                                <td class="border-top-0">1 kg</td>
                            </tr>
                            <tr>
                                <td class="border-top-0">Bounces</td>
                                <td class="border-top-0">1 kg</td>
                            </tr>
                            <tr>
                                <td class="border-top-0">Kayu</td>
                                <td class="border-top-0">1 kg</td>
                            </tr>
                            <tr>
                                <td class="border-top-0">Besi</td>
                                <td class="border-top-0">1 kg</td>
                            </tr> --}}
                        </tbody>
                        <tfoot class="mt-5">
                            <tr>
                                <td colspan="2" class="text-right border-1- ">
                                    <h4> Total</h4>
                                </td>
                                <td class="text-center"><strong> Rp <span id="total_nominal"></span></strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <a href="javascript:;" class="btn btn-light-primary font-weight-bolder mr-2 text-left"
                        data-dismiss="modal">
                        <i class="ki ki-long-arrow-back icon-sm"></i>Kembali
                    </a>
                    <button type="submit" onclick="document.getElementById('form_add').submit()"
                        class="btn btn-primary font-weight-bolder px-10- w-100px">
                        <i class="ki ki-check icon-sm"></i>Setor
                    </button>
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
                url: 'api/user/getNasabah/{!! $user->id_user !!}',
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
																		<div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-35.jpg')"></div>
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
            });

            let hitungPenjualan = 0;
            $("input[name*='item_']").on('keyup', function() {
                var berat = $(this).val();
                var harga = $(this).attr('harga');
                var total = berat * harga;
                if (berat > 0) {
                    hitungPenjualan += total;
                }
                $("#btn_review").trigger('change');
            });

            $("#btn_review").on('click change', function(e) {

                if ($("#nasabah").val() == '' && !e.isTrigger) {
                    alert('Nasabah penyetor harus dipilih');
                    return;
                }

                var input = $("input[name*='item_']");
                var count = 0;
                $.each(input, function(i, val) {
                    var hitung = $(val).val();
                    if (hitung) {
                        count++;
                    }
                });
                if (count == 0) {
                    alert('Data tidak lengkap');
                } else {

                    $("#tabel_review > tbody").empty();
                    $("#user_setor").html($("#nasabah").text());
                    $("#metode_bayar").html($("input[name=tipe_bayar]:checked").val());

                    var grandTotal = 0;
                    $.each(input, function(i, val) {
                        var harga = parseInt($(val).attr("harga"));
                        var item = $(val).attr("nama-item");
                        var berat = $(val).val();
                        var total = berat * harga;
                        grandTotal += total;
                        if (berat) {
                            var $tr = $("<tr>" +
                                `<td class="border-top-0">` + item + `</td>
                            <td class="border-top-0 text-center">` + berat + ` kg x Rp ` + harga.toLocaleString('id') + `</td>
                            <td class="border-top-0 text-center"><strong> Rp ` + total.toLocaleString('id') +
                                `</strong></td>` +
                                "</tr>");

                            $("#tabel_review > tbody:last").append($tr);
                        }
                        $("#total_nominal").html(grandTotal.toLocaleString('id'));
                        $("#total_penjualan").val(grandTotal);

                    });

                    if (!e.isTrigger) {
                        $("#modal_review").modal('show');
                    }
                }

            });

        });
    </script>
@endpush
