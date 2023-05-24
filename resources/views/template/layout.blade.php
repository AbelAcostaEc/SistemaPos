@include('template.layout._head')
<body id="kt_body" class="header-extended header-fixed header-tablet-and-mobile-fixed">
    <!--begin::Theme mode setup on page load-->

    <!--end::Theme mode setup on page load-->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header">
                    <!--begin::Header top-->
                    <div class="header-top d-flex align-items-stretch flex-grow-1">
                        <!--begin::Container-->
                        <div class="d-flex container-xxl align-items-stretch">
                            @include('template.layout.nav')
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header top-->
                    <!--begin::Header navs-->
                    <div class="header-navs d-flex align-items-stretch flex-stack h-lg-70px w-100 py-5 py-lg-0 overflow-hidden overflow-lg-visible" id="kt_header_navs" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_navs_toggle" data-kt-swapper="true" data-kt-swapper-mode="append" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header'}">
                        <!--begin::Container-->
                        <div class="d-lg-flex container-xxl w-100">
                            <!--begin::Wrapper-->
                            <div class="d-lg-flex flex-column justify-content-lg-center w-100" id="kt_header_navs_wrapper">
                                <!--begin::Header tab content-->
                                <div class="tab-content" data-kt-scroll="true" data-kt-scroll-activate="{default: true, lg: false}" data-kt-scroll-height="auto" data-kt-scroll-offset="70px">
                                    @include('template.layout.nav_secondary')
                                </div>
                                <!--end::Header tab content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header navs-->
                </div>
                <!--end::Header-->
                <!--begin::Toolbar-->
                <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
                    <!--begin::Container-->
                    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
                            <!--begin::Title-->
                            <h1 class="d-flex text-dark fw-bold m-0 fs-3">{{ $title }}</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Page title-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Container-->
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl ">
                    <!--begin::Post-->
                    <div class="content flex-row-fluid" id="kt_content">
                        <div class="card mb-5 mb-xxl-8 p-2">
                            <div class="card-body" >
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Container-->
                @include('template.layout.footer')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    @include('template.layout._script')
    <!--end::Javascript-->
</body>
<!--end::Body-->
</html>
