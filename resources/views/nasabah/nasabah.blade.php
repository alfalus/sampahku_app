@php
$user = auth()->user();
// dd($user);
// dd(Auth::user()->data_user);
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
            <h3 class="card-title">User Terdaftar</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <a href="{{ url('/user/add') }}">
                        <button class="btn btn-primary" title="Tambah user baru">
                            <i class="fas fa-edit"></i>
                            Tambah User
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {{ $dataTable->scripts() }}
@endpush
