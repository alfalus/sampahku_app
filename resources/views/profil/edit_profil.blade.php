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
    @endphp
    <div class="card card-custom gutter-b card-sticky" id="kt_page_sticky_card">
        <div class="card-header">
            <h3 class="card-title">Perbarui Informasi Anda</h3>
            <div class="card-toolbar">
                {{-- <div class="example-tools justify-content-center"> --}}

                {{-- <a href="{{ redirect()->back() }}" class="btn btn-light-primary font-weight-bolder mr-2">
                    <i class="ki ki-long-arrow-back icon-sm"></i>Back</a> --}}
                {{-- </div> --}}
                <a href="{{ url('/profil') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                    <i class="ki ki-long-arrow-back icon-sm"></i>Kembali
                </a>
                <button type="submit" onclick="document.getElementById('form_edit').submit()"
                    class="btn btn-primary font-weight-bolder">
                    <i class="ki ki-check icon-sm"></i>Simpan
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
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Nama:</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="text" name="nama" class="form-control form-control-lg form-control-solid"
                                placeholder="Masukkan nama lengkap" maxlength="50" value="{{ $data->nama_user }}" />
                        </div>
                    </div>

                    @if ($user->id_role == 1)
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Jabatan:</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text" name="jabatan" class="form-control form-control-lg form-control-solid"
                                    placeholder="Masukkan jabatan anda" maxlength="50" value="{{ $data->jabatan }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Instansi:</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text" name="instansi" class="form-control form-control-lg form-control-solid"
                                    placeholder="Masukkan instansi anda" maxlength="50"
                                    value="{{ $data->nama_instansi }}" />
                                <span class="form-text text-muted">contoh: Bank Sampah Meruya Selatan</span>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Email:</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-at"></i>
                                    </span>
                                </div>
                                <input type="text" name="email" class="form-control form-control-lg form-control-solid"
                                    value="{{ $user->email }}" placeholder="Masukkan email valid" maxlength="50"
                                    disabled />
                            </div>
                            <span class="form-text text-muted">contoh: albert@gmail.com</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">No HP:</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-phone"></i>
                                    </span>
                                </div>
                                <input type="text" name="no_hp" class="form-control form-control-lg form-control-solid"
                                    value="{{ $data->no_hp }}" placeholder="Masukkan no hp" maxlength="15" />
                            </div>
                            <span class="form-text text-muted">contoh: 0811223345678</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Jenis Kelamin:</label>
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
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-right">Tempat, Tanggal Lahir:</label>
                        <div class="col-lg-6">
                            <input type="text" name="tgl_lahir" class="form-control col-lg-3-"
                                placeholder="Masukkan tempat lahir" />
                            {{-- <input type="text" class="form-control col-lg-3" placeholder="Masukkan tanggal lahir" /> --}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-right">Alamat:</label>
                        <div class="col-lg-6">
                            <textarea class="form-control form-control-lg form-control-solid" name="alamat" rows="3"
                                placeholder="Masukkan alamat lengkap" maxlength="255">{{ $data->alamat }}</textarea>
                            <span class="form-text text-muted">contoh: Jl. Pegangsaan Timur no.56 Jakarta</span>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection
