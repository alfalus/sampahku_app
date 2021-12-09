@section('title')
    Register
    var_dump($_POST);
@endsection
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>Register | SampahKu</title>
    <meta name="description" content="Login aplikasi SampahKu" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    {{-- <link rel="canonical" href="https://keenthemes.com/metronic" /> --}}
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="assets/css/pages/login/login-4.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Content-->
            <div
                class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0# pb-lg-5 pt-4 pb-20- bg-white">
                <!--begin::Wrapper-->
                <div class="login-content d-flex flex-column pt-lg-0 pt-12-">
                    <!--begin::Logo-->
                    {{-- <a href="#" class="login-logo pb-xl-20 pb-15">
                        <img src="assets/media/logos/logo-4.png" class="max-h-70px" alt="" />
                    </a> --}}
                    <!--end::Logo-->

                    <!--begin::Signup-->
                    <div class="login-form login-signup pt-11">
                        <!--begin::Form-->
                        <form class="form" novalidate="novalidate" id="form_register" action="/register"
                            method="POST">
                            {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

                            @csrf
                            <!--begin::Title-->
                            <div class="text-center pb-8">
                                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Daftar</h2>
                                <p class="text-muted font-weight-bold font-size-h4">Masukkan data diri anda</p>
                            </div>
                            <!--end::Title-->

                            @if ($errors->count() > 7)
                                <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text"><strong>Register Gagal.</strong> Mohon isi data nasabah.
                                    </div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                            @endif

                            @if ($errors->has('response'))
                                <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text"><strong>Register Gagal.</strong>
                                        {{ $errors->first('message') }}
                                    </div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                            @endif

                            @if (session()->has('success'))
                                <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text"><strong>Register Berhasil.</strong>
                                        {{ session()->get('success') }}
                                    </div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                            @endif

                            <!--begin::Form group-->
                            <div class="form-group">
                                <select class="form-control selectpicker" name="role" id="role" title="Pilih tipe akun "
                                    required>
                                    <option value="3" {{ old('role') == 3 ? 'selected' : '' }}>Nasabah</option>
                                    <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>Bank Sampah (RT/RW)
                                    </option>
                                </select>
                                @if ($errors->has('role'))
                                    <span class="text-danger font-size-sm">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input
                                    class="form-control form-control-solid- h-auto- py-7- px-6 rounded-lg- font-size-h6-"
                                    type="text" placeholder="Email" name="email" required
                                    value="{{ old('email') }}" />
                                @if ($errors->has('email'))
                                    <span class="text-danger font-size-sm">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input
                                    class="form-control form-control-solid- h-auto- py-7- px-6 rounded-lg- font-size-h6-"
                                    type="password" placeholder="Password" name="password" autocomplete="off" required
                                    value="{{ old('password') }}" />
                                @if ($errors->has('password'))
                                    <span class="text-danger font-size-sm">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input
                                    class="form-control form-control-solid- h-auto- py-7- px-6 rounded-lg- font-size-h6-"
                                    type="password" placeholder="Konfirmasi Password" name="cpassword"
                                    autocomplete="off" required value="{{ old('cpassword') }}" />
                                @if ($errors->has('cpassword'))
                                    <span class="text-danger font-size-sm">{{ $errors->first('cpassword') }}</span>
                                @endif
                            </div>
                            <div class="separator separator-dashed my-10"></div>

                            <div class="form-group">
                                <input
                                    class="form-control form-control-solid- h-auto- py-7- px-6 rounded-lg- font-size-h6-"
                                    type="text" placeholder="Nama lengkap" name="fullname" required
                                    value="{{ old('fullname') }}" />
                                @if ($errors->has('fullname'))
                                    <span class="text-danger font-size-sm">{{ $errors->first('fullname') }}</span>
                                @endif
                            </div>

                            <!--end::Form group-->
                            <div class="form-group">
                                <select class="form-control selectpicker" name="jenis_kel" id="jenis_kel"
                                    title="Pilih jenis kelamin " required>
                                    <option value="L" {{ old('jenis_kel') == 'L' ? 'selected' : '' }}>Laki-laki
                                    </option>
                                    <option value="P" {{ old('jenis_kel') == 'P' ? 'selected' : '' }}>Perempuan
                                    </option>
                                </select>
                                @if ($errors->has('jenis_kel'))
                                    <span class="text-danger font-size-sm">{{ $errors->first('jenis_kel') }}</span>
                                @endif
                            </div>
                            <!--begin::Form group-->
                            <div class="form-group">

                                <div class="input-group date">
                                    <input type="text" class="form-control py-7- px-6 font-size-h6-" id="tgl_lahir"
                                        name="tgl_lahir" readonly="readonly" placeholder="Tanggal lahir"
                                        value="{{ old('tgl_lahir') }}" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                @if ($errors->has('tgl_lahir'))
                                    <span class="text-danger font-size-sm">{{ $errors->first('tgl_lahir') }}</span>
                                @endif
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <input
                                    class="form-control form-control-solid- h-auto- py-7- px-6 rounded-lg- font-size-h6-"
                                    type="text" placeholder="No HP" name="no_hp" value="{{ old('no_hp') }}" />
                                @if ($errors->has('no_hp'))
                                    <span class="text-danger font-size-sm">{{ $errors->first('no_hp') }}</span>
                                @endif
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <input
                                    class="form-control form-control-solid- h-auto- py-7- px-6 rounded-lg- font-size-h6-"
                                    type="text" placeholder="Alamat" name="alamat" value="{{ old('alamat') }}" />
                                @if ($errors->has('alamat'))
                                    <span class="text-danger font-size-sm">{{ $errors->first('alamat') }}</span>
                                @endif
                            </div>
                            <!--end::Form group-->
                            <div id="warga_form" style="display: nones;">
                                <div class="form-group">
                                    <select class="form-control select2" id="id_banksampah" name="id_banksampah">
                                    </select>
                                    @if ($errors->has('id_banksampah'))
                                        <span
                                            class="text-danger font-size-sm">{{ $errors->first('id_banksampah') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div id="bank_sampah_form" style="display: nones;">
                                <div class="form-group">
                                    <select class="form-control select2" id="id_satpel" name="id_satpel">
                                    </select>
                                    @if ($errors->has('id_satpel'))
                                        <span
                                            class="text-danger font-size-sm">{{ $errors->first('id_satpel') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="{{ env('APP_URL') }}">Klik disini untuk Login</a>
                            </div>

                            <!--begin::Form group-->
                            <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                                <button type="button" id="kt_login_signup_submit"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4"
                                    onclick="document.getElementById('form_register').submit()">Daftar
                                    Akun</button>
                                <button type="button" id="kt_login_signup_cancel"
                                    class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4"
                                    onclick="beforeClose()">Batal</button>
                            </div>
                            <!--end::Form group-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signup-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Content-->
            <!--begin::Aside-->
            <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
                <div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom"
                    style="background-image: url(assets/media/svg/illustrations/login-visual-4.svg);">
                    <!--begin::Aside title-->
                    {{-- <h3
                        class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">
                        We Got
                        <br />A Surprise
                        <br />For You
                    </h3> --}}
                    <!--end::Aside title-->
                </div>
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
    <script>
        // var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>

    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Scripts(used by this page)-->
    {{-- <script src="assets/js/pages/custom/login/login-4.js"></script> --}}
    <!--end::Page Scripts-->

    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pages/custom/login/login-general.js') }}"></script> --}}

    <script>
        function beforeClose() {
            var txt;
            var r = confirm("Anda yakin ingin membatalkan registrasi?");
            if (r == true) {
                txt = location.href = "/login";
            }
        }

        $(document).ready(function() {


            $("#role").on('change', function() {
                var userType = $(this).val();
                console.log(userType);
                if (userType == "3") {
                    $("#warga_form").show();
                    $("#bank_sampah_form").hide();
                } else {
                    $("#bank_sampah_form").show();
                    $("#warga_form").hide();
                }
            });

            $("#id_satpel").select2({
                placeholder: "Masukkan id satpel",
                allowClear: true,
                ajax: {
                    url: "{{ route('getSatpel') }}",
                    type: 'post',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            _token: "{{ csrf_token() }}",
                            id_satpel: params.term,
                        };
                    },
                    processResults: function(data, params) {

                        return {
                            results: data.data,

                        };
                    },
                    cache: true
                },
                minimumInputLength: 1,
                // templateResult: formatRepo, // omitted for brevity, see the source of this page
                // templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });

            $("#id_banksampah").select2({
                placeholder: "Masukkan id banksampah",
                allowClear: true,
                ajax: {
                    url: "{{ route('getBanksampah') }}",
                    type: 'post',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            _token: "{{ csrf_token() }}",
                            id_banksampah: params.term,
                        };
                    },
                    processResults: function(data, params) {

                        return {
                            results: data.data,

                        };
                    },
                    cache: true
                },
                minimumInputLength: 1,
                // templateResult: formatRepo, // omitted for brevity, see the source of this page
                // templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });

            $("#warga_form").hide();
            $("#bank_sampah_form").hide();
            var userType = $("#role").val();
            console.log(userType);
            if (userType == "3") {
                $("#warga_form").show();
                $("#bank_sampah_form").hide();
            } else if (userType == "2") {
                $("#bank_sampah_form").show();
                $("#warga_form").hide();
            }

        })
    </script>
</body>
<!--end::Body-->

</html>
