@extends('layouts.template')

@section('title')
    {{ $title }}
@endsection

@section('subheader')
    {{ $title }}
@endsection

@section('content')
    {{-- @if ($data->status != 'active')
        <div class="alert alert-custom alert-notice alert-light-danger fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">Anda belum melakukan verifikasi email.</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
    @endif --}}

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

    <div class="card card-custom gutter-b card-sticky" id="kt_page_sticky_card">
        <div class="card-header">
            <h3 class="card-title">Perbarui Informasi Anda</h3>
            <div class="card-toolbar">
                {{-- <div class="example-tools justify-content-center"> --}}

                {{-- <a href="{{ redirect()->back() }}" class="btn btn-light-primary font-weight-bolder mr-2">
                    <i class="ki ki-long-arrow-back icon-sm"></i>Back</a> --}}
                {{-- </div> --}}
                <a href="{{ url('/profil') }}" class="btn btn-light-primary font-weight-bolder mr-2"
                    onclick="confirm('Anda yakin ingin membatalkan edit data?')">
                    <i class="ki ki-long-arrow-back icon-sm"></i>Batal
                </a>
                <button type="submit" onclick="document.getElementById('form_edit').submit()"
                    class="btn btn-primary font-weight-bolder">
                    <i class="ki ki-check icon-sm"></i>Perbarui
                </button>

            </div>
        </div>
        <form class="form" id="form_edit" method="POST" action="/profil/edit/{{ $user->id_user }}">
            @csrf
            <div class="card-body">
                {{-- <h3 class="font-size-lg text-dark font-weight-bold mb-6">1. Customer Info:</h3> --}}
                <div class="mb-15">
                    <input type="hidden" name="role" value="{{ $user->id_role }}">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Nama</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="text" name="nama" class="form-control form-control-lg form-control-solid"
                                placeholder="Masukkan nama lengkap" maxlength="50" value="{{ $data->nama_user }}"
                                autocomplete="off" />
                            @if ($errors->has('nama'))
                                <span class="text-danger font-size-sm">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Email</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-at"></i>
                                    </span>
                                </div>
                                <input type="text" name="email" class="form-control form-control-lg form-control-solid"
                                    value="{{ $user->email }}" placeholder="Masukkan email valid" maxlength="50"
                                    autocomplete="off" />
                            </div>
                            @if ($errors->has('email'))
                                <span class="text-danger font-size-sm">{{ $errors->first('email') }}</span>
                            @endif
                            {{-- <span class="form-text text-muted">contoh albert@gmail.com</span> --}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">No HP</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-phone"></i>
                                    </span>
                                </div>
                                <input type="text" name="no_hp" class="form-control form-control-lg form-control-solid"
                                    value="{{ $data->no_hp }}" placeholder="Masukkan no hp" maxlength="15"
                                    autocomplete="off" />
                            </div>
                            @if ($errors->has('no_hp'))
                                <span class="text-danger font-size-sm">{{ $errors->first('no_hp') }}</span>
                            @endif
                            {{-- <span class="form-text text-muted">contoh 0811223345678</span> --}}
                        </div>
                    </div>

                    @if ($user->id_role != 1)
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Jenis Kelamin</label>
                            <div class="col-lg-9 col-xl-6 col-form-label">
                                {{-- <input type="email" class="form-control" placeholder="Masukkan no hp" /> --}}
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input type="radio" name="jenis_kel" @if ($data->jenis_kel == 'L')
                                        checked
                                        @endif value="L">
                                        <span></span>Laki-laki</label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="jenis_kel" @if ($data->jenis_kel == 'P')

                                        @endif value="P">
                                        <span></span>Perempuan</label>
                                </div>
                            </div>
                            @if ($errors->has('jenis_kel'))
                                <span class="text-danger font-size-sm">{{ $errors->first('jenis_kel') }}</span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label text-right">Tanggal Lahir</label>
                            <div class="col-lg-6">
                                <div class="input-group date">
                                    <input type="text" class="form-control form-control-solid py-7- px-6 font-size-h6-"
                                        id="tgl_lahir" name="tgl_lahir" readonly="readonly"
                                        placeholder="Masukkan tanggal lahir" value="{{ $data->tanggal_lahir }}"
                                        autocomplete="off" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                {{-- <input type="text" name="tgl_lahir" class="form-control form-control-solid col-lg-3-"
                                placeholder="Masukkan tanggal lahir" value="{{ $data->tanggal_lahir }}" /> --}}
                                {{-- <input type="text" class="form-control col-lg-3" placeholder="Masukkan tanggal lahir" /> --}}
                            </div>
                            @if ($errors->has('tgl_lahir'))
                                <span class="text-danger font-size-sm">{{ $errors->first('tgl_lahir') }}</span>
                            @endif
                        </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-right">Alamat</label>
                        <div class="col-lg-6">
                            <textarea class="form-control form-control-lg form-control-solid" name="alamat" rows="3"
                                placeholder="Masukkan alamat lengkap" maxlength="255">{{ $data->alamat }}</textarea>
                            @if ($errors->has('alamat'))
                                <span class="text-danger font-size-sm">{{ $errors->first('alamat') }}</span>
                            @endif
                            <span class="form-text text-muted">contoh: Jl. Pegangsaan Timur no.56 Jakarta</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-right">Password</label>
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-success " id="btn_verifikasi" data-toggle="modal"
                                data-target="#modal_password">
                                Ubah Password
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <!-- Modal-->
    <div class="modal fade" id="modal_password" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" action="/ubahpass" method="post">
                        @csrf
                        <div class="form-group row">

                            <label class="col-lg-4 col-form-label text-left">Password lama</label>
                            <div class="col-lg-8 col-form-label">
                                <input type="password" class="form-control form-control-solid" name="old_pass" id="old_pass"
                                    autocomplete="off" placeholder="masukkan pasword lama anda">
                                <span class="text-danger font-size-sm old_pass" style="display: none;">error</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-left">Password baru</label>
                            <div class="col-lg-8 col-form-label">
                                <input type="password" class="form-control form-control-solid" name="new_pass" id="new_pass"
                                    autocomplete="off" placeholder="masukkan pasword baru anda">
                                <span class="text-danger font-size-sm new_pass" style="display: none;">error</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-left">Konfirmasi Password</label>
                            <div class="col-lg-8 col-form-label">
                                <input type="password" class="form-control form-control-solid" name="confirm_pass"
                                    id="confirm_pass" autocomplete="off" placeholder="ketik ulang password baru">
                                <span class="text-danger font-size-sm confirm_pass" style="display: none;">error</span>
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
                    <button type="button" class="btn btn-primary font-weight-bold" id="btn_ubahpass"><i
                            class="ki ki-check icon-sm"> </i>Verifikasi</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
    <script>
        $(document).ready(function() {

            $("#btn_ubahpass").click(function() {
                $(".old_pass").hide();
                $(".new_pass").hide();
                $(".confirm_pass").hide();
                var btn = $(this);
                btn.addClass("spinner spinner-white spinner-right");

                $.ajax({
                    url: "{{ route('ubah_pass') }}",
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        old_pass: $("#old_pass").val(),
                        new_pass: $("#new_pass").val(),
                        confirm_pass: $("#confirm_pass").val()
                    },
                    success: function(result) {
                        console.log(result);
                        if (result.response == 'success') {
                            alert(result.message);
                            location.reload();
                        } else {
                            if (result.old_pass) {
                                $(".old_pass").html(result.old_pass[0]).show();

                            } else if (result.new_pass) {
                                $(".new_pass").html(result.new_pass[0]).show();

                            } else if (result.confirm_pass) {
                                $(".confirm_pass").html(result.confirm_pass[0]).show();

                            } else {
                                alert(result.message);

                            }
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
