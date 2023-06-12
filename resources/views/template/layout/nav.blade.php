<!--begin::Brand-->
<div class="d-flex align-items-center align-items-lg-stretch me-5 flex-row-fluid">
    <!--begin::Heaeder navs toggle-->
    <button class="d-lg-none btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px ms-n3 me-2" id="kt_header_navs_toggle">
        <i class="ki-duotone ki-abstract-14 fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </button>
    <!--end::Heaeder navs toggle-->
    <!--begin::Logo-->
    {{-- <a href="{{ url('administration/dashboard') }}" class="d-flex align-items-center">
        @if(@Auth::user()->company->model_theme && @Auth::user()->company->logo)
            <img src="{{ asset(Auth::user()->company->logo) }}" alt="foto" style="max-height: 80%; max-width: 80% !important;">
        @else
            <img src="{{ asset('img/logo-goleads.png') }}" alt="foto" class="img-fluid">
        @endif
    </a> --}}
    <!--end::Logo-->
    <!--begin::Tabs wrapper-->
    <div class="align-self-end overflow-auto" id="kt_brand_tabs">
        <!--begin::Header tabs wrapper-->
        <div class="header-tabs overflow-auto mx-4 ms-lg-10 mb-5 mb-lg-0" id="kt_header_tabs" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_header_navs_wrapper', lg: '#kt_brand_tabs'}">
            <!--begin::Header tabs-->
            <ul class="nav flex-nowrap text-nowrap">
                <li class="nav-item">
                    <a class="nav-link @if(!$menu) active @endif" href="{{ url('administration/dashboard') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($menu==1) active @endif" data-bs-toggle="tab" href="#kt_header_navs_tab_2">Administración</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($menu==2) active @endif" data-bs-toggle="tab" href="#kt_header_navs_tab_3">Inventario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($menu==3) active @endif" data-bs-toggle="tab" href="#kt_header_navs_tab_4">Ventas</a>
                </li>
            </ul>
            <!--begin::Header tabs-->
        </div>
        <!--end::Header tabs wrapper-->
    </div>
    <!--end::Tabs wrapper-->
</div>
<!--end::Brand-->
<!--begin::Topbar-->
<div class="d-flex align-items-center flex-row-auto">

    <!--begin::User-->
    <div class="d-flex align-items-center ms-1" id="kt_header_user_menu_toggle">
        <!--begin::User info-->
        <div class="btn btn-flex align-items-center bg-hover-white bg-hover-opacity-10 py-2 ps-2 pe-2 me-n2" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <!--begin::Name-->
            <div class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-4">
                <span class="text-white opacity-75 fs-8 fw-semibold lh-1 mb-1">{{ Auth::user()->name }}</span>
                <span class="text-white fs-8 fw-bold lh-1">{{ Auth::user()->getRoleNames()->first() }}</span>
            </div>
            <!--end::Name-->
            <!--begin::Symbol-->
            <div class="symbol symbol-30px symbol-md-40px">
                @if(Auth::user()->photo)
                <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Profile picture">
                @else
                <img src="{{ asset('media/profile-default.png') }}" alt="Profile picture">
                @endif
            </div>
            <!--end::Symbol-->
        </div>
        <!--end::User info-->
        <!--begin::User account menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                        @if(Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Profile picture">
                        @else
                        <img src="{{ asset('media/profile-default.png') }}" alt="Profile picture">
                        @endif
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Username-->
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name }}</div>
                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                    </div>
                    <!--end::Username-->
                </div>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="{{ route('profile') }}" class="menu-link px-5">Mi Perfil</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            <div class="menu-item px-5 my-1">
                <a href="{{ route('logout') }}" class="menu-link px-5">Salir</a>
            </div>
        </div>
        <!--end::User account menu-->
    </div>
    <!--end::User -->
</div>
<!--end::Topbar-->
