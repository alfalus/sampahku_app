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
                            <label class="col-lg-2 col-form-label text-left">Nama:</label>
                            <div class="col-lg-6 col-form-label">
                                <span class="form-text font-weight-bolder">{{ $data->nama_user }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-left">Email:</label>
                            <div class="col-lg-6 col-form-label">
                                <span class="form-text font-weight-bolder">{{ $user->email }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-left">No Hp:</label>
                            <div class="col-lg-6 col-form-label">
                                <span class="form-text font-weight-bolder">{{ $data->no_hp }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-left">Alamat:</label>
                            <div class="col-lg-6 col-form-label">
                                <span class="form-text font-weight-bolder">{{ $data->alamat }}</span>
                            </div>
                        </div>

                        <div class="separator separator-dashed my-10"></div>

                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-left">Tipe User:</label>
                            <div class="col-lg-6 col-form-label">
                                @if (auth()->user()->id_role == 1)
                                    <span class="form-text font-weight-bolder">{{ ucwords($data->role) }}</span>

                                @elseif (auth()->user()->id_role==2)
                                    <span class="form-text font-weight-bolder">{{ ucwords($data->role) }}</span>

                                @else

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="separator separator-dashed my-10"></div>
                <h3 class="font-size-lg text-dark font-weight-bold mb-6">2. Customer Account:</h3>
                <div class="mb-3">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-right">Holder:</label>
                        <div class="col-lg-6">
                            <input type="email" class="form-control" placeholder="Enter full name" />
                            <span class="form-text text-muted">Please enter your account holder</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-right">Contact</label>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="la la-chain"></i></span></div>
                                <input type="text" class="form-control" placeholder="Phone number" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-lg-3 col-form-label  text-right">Communication:</label>
                        <div class="col-lg-6">
                            <div class="checkbox-inline">
                                <label class="checkbox">
                                    <input type="checkbox" />
                                    <span></span>
                                    Email
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" />
                                    <span></span>
                                    SMS
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" />
                                    <span></span>
                                    Phone
                                </label>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>

        </form>
    </div>

@endsection
