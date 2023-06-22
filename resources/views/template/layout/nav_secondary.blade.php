<!--begin::Tab panel-->
<div class="tab-pane fade @if($menu==1) active show @endif" id="kt_header_navs_tab_2">
    <!--begin::Menu wrapper-->
    <div class="header-menu flex-column align-items-stretch flex-lg-row">
        <!--begin::Menu-->
        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
            <!--begin:Menu item-->
            @can('ver usuarios')
            <div class="menu-item @if($submenu==1 && $menu==1) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ route('users') }}">
                    <span class="menu-title">Usuarios</span>
                    <span class="menu-arrow d-lg-none"></span>
                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->

            <!--begin:Menu item-->
            @can('ver roles')
            <div class="menu-item @if($submenu==2 && $menu==1) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ route('roles') }}">

                    <span class="menu-title">Roles</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->

            <!--begin:Menu item-->
            @can('ver permisos')
            <div class="menu-item @if($submenu==3 && $menu==1) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ route('permissions') }}">

                    <span class="menu-title">Permisos</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::Tab panel-->

<!--begin::Tab panel-->
<div class="tab-pane fade @if($menu==2) active show @endif" id="kt_header_navs_tab_3">
    <!--begin::Menu wrapper-->
    <div class="header-menu flex-column align-items-stretch flex-lg-row">
        <!--begin::Menu-->
        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
            <!--begin:Menu item-->
            @can('ver productos')
            <div class="menu-item @if($submenu==1 && $menu==2) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ route('products') }}">

                    <span class="menu-title">Productos</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->

            <!--begin:Menu item-->
            @can('ver categorias')
            <div class="menu-item @if($submenu==2 && $menu==2) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ route('categories') }}">

                    <span class="menu-title">Categorias</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::Tab panel-->

{{-- PANEL Ventas --}}
<!--begin::Tab panel-->
<div class="tab-pane fade @if($menu==3) active show @endif" id="kt_header_navs_tab_4">
    <!--begin::Menu wrapper-->
    <div class="header-menu flex-column align-items-stretch flex-lg-row">
        <!--begin::Menu-->
        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
           <!--begin:Menu item-->
           @can('ver productos')
           <div class="menu-item @if($submenu==1 && $menu==3) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
               <!--begin:Menu link-->
               <a class="menu-link py-3" href="{{ route('orders') }}">

                   <span class="menu-title">Orden</span>
                   <span class="menu-arrow d-lg-none"></span>

               </a>
               <!--end:Menu link-->
           </div>
           @endcan
           <!--end:Menu item-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::Tab panel-->
