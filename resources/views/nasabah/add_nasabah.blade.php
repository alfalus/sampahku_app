@extends('layouts.template')

@section('title')
    {{ $title }}
@endsection

@section('subheader')
    {{ $title }}
@endsection

@section('content')

    <div class="col-lg-8">

        <div class="card card-custom gutter-b card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <h3 class="card-title">Form </h3>
                <div class="card-toolbar">

                    <a href="{{ url('/user') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                        <i class="ki ki-long-arrow-back icon-sm"></i>Kembali
                    </a>
                    <button type="submit" onclick="document.getElementById('form_add').submit()"
                        class="btn btn-primary font-weight-bolder">
                        <i class="ki ki-check icon-sm"></i>Tambah
                    </button>

                </div>
            </div>
            <form class="form" id="form_add" method="POST" action="/user/add">
                @csrf
                <div class="card-body">

                    <div class="mb-15">
                        {{-- <input type="hidden" name="role" value="{{ $user->id_role }}"> --}}
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Email <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="email" name="email" class="form-control form-control-lg form-control-solid"
                                    placeholder="contoh@gmail.com" maxlength="50" value="" />
                                <div class="text-muted">Harap masukkan email address yang valid</div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection
