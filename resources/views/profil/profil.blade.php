@php
$user = auth()->user();
// dd(Auth::user(), Auth::Guest(), Auth::check());
@endphp

@extends('layouts.template')

@section('title')
    {{ $title }}
@endsection

@section('subheader')

    {{ $title }}
@endsection

@section('content')
    @php
    // dd($data);
    // $user = auth()->user();
    // echo json_encode($user);
    // echo auth()->user()->id_user;
    @endphp

    @if ($data->status != 'active')
        <div class="alert alert-custom alert-notice alert-light-danger fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">Anda belum melakukan verifikasi email.</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
    @endif

    <div class="card card-custom card-sticky gutter-b example- example-compact- " id="kt_page_sticky_card">
        <div class="card-header">
            <h3 class="card-title">Informasi Pengguna</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <a href="{{ url('/profil/edit/' . auth()->user()->id_user) }}">
                        <button class="btn btn-primary" title="Edit profil anda">
                            <i class="fas fa-edit"></i>
                            Perbarui Data
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <form class="form">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-shrink-0 mr-7">
                        <div class="symbol symbol-100 symbol-lg-120 symbol-light-success">
                            <span
                                class="font-size-h3 symbol-label font-weight-boldest">{{ ucwords(substr($data->nama_user, 0, 1)) }}</span>
                        </div>
                    </div>

                    {{-- <h3 class="font-size-lg text-dark font-weight-bold mb-6">1. Customer Info:</h3> --}}
                    <div class="mb-15 flex-grow-1">
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-6 col-form-label text-left">Nama</label>
                            <div class="col-lg-6 col-md-6 col-form-label">
                                {{-- @if ($data->nama_satpel)
                                    <span class="form-text font-weight-bolder">{{ $data->nama_satpel }}</span>
                                @endif --}}
                                @if ($data->nama_user)
                                    <span class="form-text font-weight-bolder">{{ ucwords($data->nama_user) }}</span>
                                @endif
                                {{-- @if ($data->nama_nasabah)
                                    <span class="form-text font-weight-bolder">{{ $data->nama_nasabah }}</span>
                                @endif --}}
                            </div>
                        </div>

                        @if (auth()->user()->id_role != 1)
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-left">Jenis Kelamin</label>
                                <div class="col-lg-6 col-form-label">
                                    @if ($data->jenis_kel == 'L')
                                        <span class="form-text font-weight-bolder">Laki-laki</span>
                                    @else
                                        <span class="form-text font-weight-bolder">Perempuan</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-left">Tanggal Lahir</label>
                                <div class="col-lg-6 col-form-label">
                                    <span class="form-text font-weight-bolder">{{ $data->tanggal_lahir }}</span>
                                </div>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-left d-flex align-items-center">Email</label>
                            <div class="col-lg-6 col-form-label ">
                                <span class="form-text font-weight-bolder">{{ $user->email }}
                                    @if ($data->status != 'active')
                                        <button type="button" class="btn btn-success ml-10" id="btn_verifikasi"
                                            data-toggle="modal-" data-target="#modal_verifikasi-">
                                            Verifikasi Email
                                        </button>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-left">No Hp</label>
                            <div class="col-lg-6 col-form-label">
                                <span class="form-text font-weight-bolder">{{ $data->no_hp }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-left">Alamat</label>
                            <div class="col-lg-6 col-form-label">
                                <span class="form-text font-weight-bolder">{{ $data->alamat }}</span>
                            </div>
                        </div>

                        <div class="separator separator-dashed my-10"></div>

                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-left">Tipe User</label>
                            <div class="col-lg-6 col-form-label">
                                @if (auth()->user()->id_role == 1)
                                    <span class="form-text font-weight-bolder">{{ ucwords($data->role) }}</span>

                                @elseif (auth()->user()->id_role==2)
                                    <span class="form-text font-weight-bolder">{{ ucwords($data->role) }}</span>

                                @else
                                    <span class="form-text font-weight-bolder">{{ ucwords($data->role) }}</span>

                                @endif
                            </div>
                        </div>
                        @if (auth()->user()->id_role == 2)
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-left">Satpel </label>
                                <div class="col-lg-6 col-form-label">
                                    <span class="form-text font-weight-bolder">{{ ucwords($data->nama_satpel) }}</span>
                                </div>
                            </div>
                        @elseif (auth()->user()->id_role==3)
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-left">Bank Sampah </label>
                                <div class="col-lg-6 col-form-label">
                                    <span
                                        class="form-text font-weight-bolder">{{ ucwords($data->nama_banksampah) }}</span>
                                </div>
                            </div>
                        @else
                        @endif

                    </div>
                </div>

            </div>

        </form>
    </div>

    <!-- Modal-->
    <div class="modal fade" id="modal_verifikasi" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukkan kode verifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" action="/verifikasi/cek" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label text-left">Kode:</label>
                            <div class="col-lg-6 col-form-label">
                                <input type="text" class="form-control form-control-solid" name="kode_verifikasi"
                                    id="kode_verifikasi" maxlength="6" autocomplete="off">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    {{-- <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Close</button> --}}
                    <a href="javascript:;" class="btn btn-light-primary font-weight-bolder mr-2 text-left"
                        data-dismiss="modal">
                        <i class="ki ki-long-arrow-back icon-sm"></i>Kembali
                    </a>
                    <button type="button" class="btn btn-primary font-weight-bold" id="submit_verifikasi"><i
                            class="ki ki-check icon-sm"> </i>Verifikasi</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#btn_verifikasi").click(function() {
                var btn = $(this);
                btn.addClass("spinner spinner-white spinner-right");

                $.ajax({
                    url: "{{ route('verifikasi_email') }}",
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(result) {
                        // console.log(result);
                        if (result.response == 'success') {
                            alert(result.message);
                            $("#modal_verifikasi").modal('show');
                        } else {
                            alert('Gagal mengirimkan email.');
                        }
                    },
                    complete: function() {
                        btn.removeClass("spinner spinner-white spinner-right");
                    }
                });
            });

            $("#submit_verifikasi").click(function() {
                var btn = $(this);
                btn.addClass("spinner spinner-white spinner-right");

                $.ajax({
                    url: "{{ route('verifikasi_email_cek') }}",
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        kode: $("#kode_verifikasi").val()
                    },
                    success: function(result) {
                        console.log(result);
                        if (result.response == 'success') {
                            alert(result.message);
                            location.reload();
                        } else {
                            alert(result.message);
                        }
                    },
                    complete: function() {
                        btn.removeClass("spinner spinner-white spinner-right");
                    }
                });
            });
        });
    </script>
@endpush
