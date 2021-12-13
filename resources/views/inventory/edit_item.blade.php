@extends('layouts.template')

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
    {{-- <div class="alert alert-custom alert-notice alert-light-success fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">{{ session('message') }}Item berhasil ditambah</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div> --}}

    <div class="card card-custom gutter-b card-sticky" id="kt_page_sticky_card">
        <div class="card-header">
            <h3 class="card-title">Edit Produk</h3>
            <div class="card-toolbar">
                {{-- <div class="example-tools justify-content-center"> --}}

                {{-- <a href="{{ redirect()->back() }}" class="btn btn-light-primary font-weight-bolder mr-2">
                    <i class="ki ki-long-arrow-back icon-sm"></i>Back</a> --}}
                {{-- </div> --}}
                <a href="{{ url('/inventory/item') }}" class="btn btn-light-primary font-weight-bolder mr-2"
                    onclick="confirm('Anda yakin ingin membatalkan edit data?')">
                    <i class="ki ki-long-arrow-back icon-sm"></i>Batal
                </a>
                <button type="submit" onclick="document.getElementById('form_add').submit()"
                    class="btn btn-primary font-weight-bolder">
                    <i class="ki ki-check icon-sm"></i>Submit
                </button>

            </div>
        </div>
        <form class="form" id="form_add" method="POST" action="/inventory/item/edit/">
            @csrf
            <div class="card-body">
                {{-- <h3 class="font-size-lg text-dark font-weight-bold mb-6">1. Customer Info:</h3> --}}
                <div class="mb-15">
                    <input type="hidden" name="role" value="">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Foto Produk <span
                                class="text-danger font-size-sm">*</span> </label>
                        <div class="d-flex align-items-center ml-5">
                            <div class="symbol symbol-150 flex-shrink-0">
                                <img src="{{ asset('assets/media/item/handmade-stik.jpg') }}" alt="photo">
                            </div>
                        </div>
                        {{-- <div class="col-lg-9 col-xl-6">
                            <input type="text" name="nama" class="form-control form-control-lg form-control-solid"
                                placeholder="Masukkan nama lengkap" maxlength="50" value="{{ $data->nama_user }}"
                                autocomplete="off" />
                            @if ($errors->has('nama'))
                                <span class="text-danger font-size-sm">{{ $errors->first('nama') }}</span>
                            @endif
                        </div> --}}
                    </div>

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Nama Produk <span
                                class="text-danger font-size-sm">*</span></label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="text" name="nama_produk" class="form-control form-control-lg form-control-solid"
                                value="" placeholder="Masukkan nama produk" maxlength="50" autocomplete="off" />
                            @if ($errors->has('nama_produk'))
                                <span class="text-danger font-size-sm">{{ $errors->first('nama_produk') }}</span>
                            @endif
                            {{-- <span class="form-text text-muted">contoh albert@gmail.com</span> --}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Jumlah Stok <span
                                class="text-danger font-size-sm">*</span></label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="text" name="qty" class="form-control form-control-lg form-control-solid" value=""
                                placeholder="Masukkan jumlah stok" maxlength="15" autocomplete="off" />
                            @if ($errors->has('qty'))
                                <span class="text-danger font-size-sm">{{ $errors->first('qty') }}</span>
                            @endif
                            {{-- <span class="form-text text-muted">contoh 0811223345678</span> --}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Harga Produk <span
                                class="text-danger font-size-sm">*</span></label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="text" name="harga_produk" class="form-control form-control-lg form-control-solid"
                                value="" placeholder="Masukkan harga produk" maxlength="15" autocomplete="off" />
                            @if ($errors->has('harga_produk'))
                                <span class="text-danger font-size-sm">{{ $errors->first('harga_produk') }}</span>
                            @endif
                            {{-- <span class="form-text text-muted">contoh 0811223345678</span> --}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Kategori</label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="text" name="kategori" class="form-control form-control-lg form-control-solid"
                                value="" placeholder="Masukkan kategori produk" maxlength="15" autocomplete="off" />
                            @if ($errors->has('kategori'))
                                <span class="text-danger font-size-sm">{{ $errors->first('kategori') }}</span>
                            @endif
                            {{-- <span class="form-text text-muted">contoh 0811223345678</span> --}}
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-right">Deskripsi</label>
                        <div class="col-lg-6">
                            <textarea class="form-control form-control-lg form-control-solid" name="deskripsi" rows="2"
                                placeholder="Masukkan deskripsi" maxlength="255"></textarea>
                            @if ($errors->has('deskripsi'))
                                <span class="text-danger font-size-sm">{{ $errors->first('deskripsi') }}</span>
                            @endif
                            {{-- <span class="form-text text-muted">contoh: Jl. Pegangsaan Timur no.56 Jakarta</span> --}}
                        </div>
                    </div>


                </div>

            </div>
        </form>
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
