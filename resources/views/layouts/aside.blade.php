<!--begin::Aside-->
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">

    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        <a href="index.html" class="brand-logo">
            <img alt="Logo" src="assets/media/logos/sampahku_logo.png" />
            <span></span>
        </a>
        <!--end::Logo-->
        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                <li class="menu-item" aria-haspopup="true">
                    <a href="/dashboard" class="menu-link">
                        <i class="menu-icon fas fa-tachometer-alt"></i>
                        <span class="menu-text">Beranda</span>
                    </a>
                </li>

                @php
                    $user = auth()->user();
                @endphp
                {{-- Transaksi --}}
                <li class="menu-item menu-item-submenu @isset($m_trx) menu-item-open menu-item-here- @endisset"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-shopping-bag"></i>
                        <span class="menu-text">Transaksi</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item @isset($sm_terimaSetoran) menu-item-active @endisset"
                                aria-haspopup="true">
                                <a href="{{ url('/transaksi/setoran') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    @if ($user->id_role != 3)
                                        <span class="menu-text">Terima Setoran</span>
                                    @else
                                        <span class="menu-text">Setoran</span>
                                    @endif
                                </a>
                            </li>
                        </ul>

                        @if ($user->id_role == 2)
                            <ul class="menu-subnav">
                                <li class="menu-item @isset($sm_jualSetoran) menu-item-active @endisset"
                                    aria-haspopup="true">
                                    <a href="{{ url('/transaksi/jual-setoran') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Jual Setoran</span>
                                    </a>
                                </li>
                            </ul>
                        @endif

                        <ul class="menu-subnav">
                            <li class="menu-item @isset($sm_trx) menu-item-active @endisset" aria-haspopup="true">
                                <a href="{{ url('/transaksi/pembelian-warga') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>

                                    <span class="menu-text">
                                        @if ($user->id_role == 1 || $user->id_role == 2)
                                            Terima Pembelian
                                        @else
                                            Pembelian
                                        @endif
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Pencairan Dana --}}
                <li class="menu-item menu-item-submenu @isset($m_pencairan) menu-item-open menu-item-here- @endisset"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-money-bill"></i>
                        <span class="menu-text">Pencairan Dana</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            {{-- @if (auth()->user()->id_role == 1) --}}
                            @if (auth()->user()->id_role != 3)
                                <li class="menu-item @isset($sm_pencairanNasabah) menu-item-active @endisset"
                                    aria-haspopup="true">
                                    <a href="{{ url('/pencairan/nasabah') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Pencairan Nasabah</span>
                                    </a>
                                </li>
                            @endif
                            {{-- @elseif (auth()->user()->id_role == 2) --}}
                            <li class="menu-item @isset($sm_pencairanPribadi) menu-item-active @endisset"
                                aria-haspopup="true">
                                <a href="{{ url('/pencairan/pribadi') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Pencairan Dana</span>
                                </a>
                            </li>
                            {{-- @else --}}
                            {{-- @endif --}}

                        </ul>
                    </div>
                </li>

                {{-- profile --}}
                <li class="menu-item menu-item-submenu @isset($m_profil) menu-item-open menu-item-here- @endisset"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-user-alt"></i>
                        <span class="menu-text">Profil</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item @isset($m_profil) menu-item-active @endisset" aria-haspopup="true">
                                <a href="{{ url('/profil') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Akun Saya</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                @if (auth()->user()->id_role != 3)
                    {{-- Inventory --}}
                    <li class="menu-item menu-item-submenu @isset($m_inventory) menu-item-open menu-item-here- @endisset"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <i class="menu-icon fas fa-folder"></i>
                            <span class="menu-text">Inventori</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                {{-- @if (auth()->user()->id_role == 1) --}}
                                <li class="menu-item @isset($sm_sampahSetoran) menu-item-active @endisset"
                                    aria-haspopup="true">
                                    <a href="{{ url('/inventory/setoran') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Sampah Setoran</span>
                                    </a>
                                </li>
                                {{-- @elseif (auth()->user()->id_role == 2) --}}
                                <li class="menu-item @isset($sm_daftarItem) menu-item-active @endisset"
                                    aria-haspopup="true">
                                    <a href="{{ url('/inventory/item') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">List Item</span>
                                    </a>
                                </li>
                                {{-- @else
                                @endif --}}

                            </ul>
                        </div>
                    </li>
                @endif

                {{-- Manajemen user --}}
                @if (auth()->user()->id_role != 3)
                    <li class="menu-item menu-item-submenu @isset($m_user) menu-item-open menu-item-here- @endisset"
                        aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <i class="menu-icon fas fa-users"></i>
                            <span class="menu-text">Manajemen Pengguna</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                @if (auth()->user()->id_role == 1)
                                    <li class="menu-item @isset($sm_terdaftar) menu-item-active @endisset"
                                        aria-haspopup="true">
                                        <a href="{{ url('/user') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">RT/RW Terdaftar</span>
                                        </a>
                                    </li>
                                @elseif (auth()->user()->id_role == 2)
                                    <li class="menu-item @isset($sm_terdaftar) menu-item-active @endisset"
                                        aria-haspopup="true">
                                        <a href="{{ url('/user') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Nasabah Terdaftar</span>
                                        </a>
                                    </li>
                                @else
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif






            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
<!--end::Aside-->
