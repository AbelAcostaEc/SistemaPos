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

            <!--begin:Menu item-->
            @can('Ver Cuentas CRM')
            <div class="menu-item @if($submenu==4 && $menu==1) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('crm/account') }}">

                    <span class="menu-title">Cuentas</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->

            <!--begin:Menu item-->
            @if(Auth::user()->hasRole('Super Administrador'))
            <div class="menu-item @if($submenu==5 && $menu==1) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('plans/plan') }}">

                    <span class="menu-title">Planes</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endif
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('Ver Cuentas CRM')
            <div class="menu-item @if($submenu==6 && $menu==1) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('crm/discardedType') }}">

                    <span class="menu-title">Descartados</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
             <!--begin:Menu item-->
             @can('Ver Cuentas CRM')
             <div class="menu-item @if($submenu==7 && $menu==1) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                 <!--begin:Menu link-->
                 <a class="menu-link py-3" href="{{ url('crm/trackingType') }}">

                     <span class="menu-title">Seguimiento</span>
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
            @can('Ver Sitios Chatbot')
            <div class="menu-item @if($submenu==1 && $menu==2) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('chatbot/sites') }}">

                    <span class="menu-title">Sitios</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->

            <!--begin:Menu item-->
            @can('Ver Chats')
            <div class="menu-item @if($submenu==2 && $menu==2) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('chatbot/chats') }}">

                    <span class="menu-title">Chats</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->

            <!--begin:Menu item-->
            @can('Ver Chats')
            <div class="menu-item @if($submenu==3 && $menu==2) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('chatbot/conversations') }}">

                    <span class="menu-title">Conversación</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('Ver Chats')
            <div class="menu-item @if($submenu==4 && $menu==2) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('chatbot/installation') }}">

                    <span class="menu-title">Instalación</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('Ver Leads Chatbot')
            <div class="menu-item @if($submenu==5 && $menu==2) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('chatbot/leads') }}">

                    <span class="menu-title">Leads</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('Ver Conexiones Chatbot')
            <div class="menu-item @if($submenu==6 && $menu==2) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('chatbot/connections') }}">

                    <span class="menu-title">Conexiones</span>
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

{{-- PANEL CRM --}}
<!--begin::Tab panel-->
<div class="tab-pane fade @if($menu==3) active show @endif" id="kt_header_navs_tab_4">
    <!--begin::Menu wrapper-->
    <div class="header-menu flex-column align-items-stretch flex-lg-row">
        <!--begin::Menu-->
        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0" id="#kt_header_menu" data-kt-menu="true">
            <!--begin:Menu item-->
            @can('Ver Clientes CRM')
            <div class="menu-item @if($submenu==2 && $menu==3) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('crm/prospect') }}">

                    <span class="menu-title">Prospectos</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->

            <!--begin:Menu item-->
            @can('Ver Clientes CRM')
            <div class="menu-item @if($submenu==3 && $menu==3) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('crm/opportunity') }}">

                    <span class="menu-title">Oportunidades</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('Ver Clientes CRM')
            <div class="menu-item @if($submenu==4 && $menu==3) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('crm/client') }}">

                    <span class="menu-title">Clientes</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('Ver Atributos CRM')
            <div class="menu-item @if($submenu==5 && $menu==3) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('crm/attribute') }}">

                    <span class="menu-title">Atributos</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('Ver Atributos CRM')
            <div class="menu-item @if($submenu==6 && $menu==3) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('crm/tag') }}">

                    <span class="menu-title">Etiquetas</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('Ver Atributos CRM')
            <div class="menu-item @if($submenu==7 && $menu==3) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('crm/phase') }}">

                    <span class="menu-title">Fases</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('Ver Atributos CRM')
            <div class="menu-item @if($submenu==8 && $menu==3) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('crm/line') }}">

                    <span class="menu-title">Líneas</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('Ver Atributos CRM')
            <div class="menu-item @if($submenu==9 && $menu==3) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('crm/configuration') }}">

                    <span class="menu-title">Configuraciones</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('Ver Atributos CRM')
            <div class="menu-item @if($submenu==10 && $menu==3) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('crm/connections') }}">

                    <span class="menu-title">Conexiones</span>
                    <span class="menu-arrow d-lg-none"></span>

                </a>
                <!--end:Menu link-->
            </div>
            @endcan
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('Ver Clientes CRM')
            <div class="menu-item @if($submenu==11 && $menu==3) here @endif show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                <!--begin:Menu link-->
                <a class="menu-link py-3" href="{{ url('crm/discarded') }}">

                    <span class="menu-title">Descartados</span>
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


{{-- menu anterior --}}
{{-- <div class="col-auto side-menu-container">
    <ul class="sw-25 side-menu mb-0 primary" id="menuSide">
        @if($menu==1)
        <li>

            <a href="#" data-bs-target="#account">
                <i data-acorn-icon="user" class="icon"></i>
                <span class="label">Administración</span>
            </a>
            <ul>
                @can('Ver Usuarios')
                <li class="@if($submenu==1) active @endif">
                    <a href="{{ url('administration/users') }}" class="@if($submenu==1) active @endif">
                        <i data-acorn-icon="user" class="icon"></i>
                        <span class="label">Usuarios</span>
                    </a>
                </li>
                @endcan

                @can('Ver Roles')
                <li class="@if($submenu==2) active @endif">
                    <a href="{{ url('administration/roles') }}" class="@if($submenu==2) active @endif">
                        <i data-acorn-icon="book-open" class="icon"></i>
                        <span class="label">Roles</span>
                    </a>
                </li>
                @endcan

                @can('Datos Empresa')
                <li class="@if($submenu==3) active @endif">
                    <a href="{{ url('administration/company') }}" class="@if($submenu==3) active @endif">
                        <i data-acorn-icon="home" class="icon"></i>
                        <span class="label">Empresa</span>
                    </a>
                </li>
                @endcan

                @can('Ver Cuentas CRM')
                <li class="@if($submenu==4) active @endif">
                    <a href="{{ url('crm/account') }}" class="@if($submenu==4) active @endif">
                        <i data-acorn-icon="building-large" class="icon"></i>
                        <span class="label">Cuentas</span>
                    </a>
                </li>
                @endcan

                @if(Auth::user()->hasRole('Super Administrador'))
                <li class="@if($submenu==5) active @endif">
                    <a href="{{ url('plans/plan') }}" class="@if($submenu==5) active @endif">
                        <i data-acorn-icon="list" class="icon"></i>
                        <span class="label">Plan</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif

        @if($menu==2)
        <li>
            <a href="#" data-bs-target="#account">
                <i data-acorn-icon="user" class="icon"></i>
                <span class="label">Chatbot</span>
            </a>
            <ul>
                @can('Ver Sitios Chatbot')
                <li class="@if($submenu==1) active @endif">
                    <a href="{{ url('chatbot/sites') }}" class="@if($submenu==1) active @endif">
                        <i data-acorn-icon="web" class="icon"></i>
                        <span class="label">Sitios</span>
                    </a>
                </li>
                @endcan

                @can('Ver Chats')
                <li class="@if($submenu==2) active @endif">
                    <a href="{{ url('chatbot/chats') }}" class="@if($submenu==2) active @endif">
                        <i data-acorn-icon="message" class="icon"></i>
                        <span class="label">Chats</span>
                    </a>
                </li>

                <li class="@if($submenu==3) active @endif">
                    <a href="{{ url('chatbot/conversations') }}" class="@if($submenu==3) active @endif">
                        <i data-acorn-icon="messages" class="icon"></i>
                        <span class="label">Conversación</span>
                    </a>
                </li>

                <li class="@if($submenu==4) active @endif">
                    <a href="{{ url('chatbot/installation') }}" class="@if($submenu==4) active @endif">
                        <i data-acorn-icon="tool" class="icon"></i>
                        <span class="label">Instalación</span>
                    </a>
                </li>
                @endcan

                @can('Ver Leads Chatbot')
                <li class="@if($submenu==5) active @endif">
                    <a href="{{ url('chatbot/leads') }}" class="@if($submenu==5) active @endif">
                        <i data-acorn-icon="phone" class="icon"></i>
                        <span class="label">Leads</span>
                    </a>
                </li>
                @endcan

                @can('Ver Conexiones Chatbot')
                <li class="@if($submenu==6) active @endif">
                    <a href="{{ url('chatbot/connections') }}" class="@if($submenu==6) active @endif">
                        <i data-acorn-icon="web" class="icon"></i>
                        <span class="label">Conexiones</span>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endif

        @if($menu==3)
        <li>
            <a href="#" data-bs-target="#account">
                <i data-acorn-icon="user" class="icon"></i>
                <span class="label">CRM</span>
            </a>
            <ul>


                @can('Ver Clientes CRM')
                <li class="@if($submenu==2) active @endif">
                    <a href="{{ url('crm/prospect') }}" class="@if($submenu==2) active @endif">
                        <i data-acorn-icon="news" class="icon"></i>
                        <span class="label">Prospectos</span>
                    </a>
                </li>
                @endcan

                @can('Ver Clientes CRM')
                <li class="@if($submenu==3) active @endif">
                    <a href="{{ url('crm/opportunity') }}" class="@if($submenu==3) active @endif">
                        <i data-acorn-icon="form-check" class="icon"></i>
                        <span class="label">Oportunidades</span>
                    </a>
                </li>
                @endcan

                @can('Ver Clientes CRM')
                <li class="@if($submenu==4) active @endif">
                    <a href="{{ url('crm/client') }}" class="@if($submenu==4) active @endif">
                        <i data-acorn-icon="user" class="icon"></i>
                        <span class="label">Clientes</span>
                    </a>
                </li>
                @endcan

                @can('Ver Atributos CRM')
                <li class="@if($submenu==5) active @endif">
                    <a href="{{ url('crm/attribute') }}" class="@if($submenu==5) active @endif">
                        <i data-acorn-icon="note" class="icon"></i>
                        <span class="label">Atributos</span>
                    </a>
                </li>
                @endcan

                @can('Ver Atributos CRM')
                <li class="@if($submenu==6) active @endif">
                    <a href="{{ url('crm/tag') }}" class="@if($submenu==6) active @endif">
                        <i data-acorn-icon="tag" class="icon"></i>
                        <span class="label">Etiquetas</span>
                    </a>
                </li>
                @endcan

                @can('Ver Atributos CRM')
                <li class="@if($submenu==7) active @endif">
                    <a href="{{ url('crm/phase') }}" class="@if($submenu==7) active @endif">
                        <i data-acorn-icon="destination" class="icon"></i>
                        <span class="label">Fases</span>
                    </a>
                </li>
                @endcan

                @can('Ver Atributos CRM')
                <li class="@if($submenu==8) active @endif">
                    <a href="{{ url('crm/line') }}" class="@if($submenu==8) active @endif">
                        <i data-acorn-icon="grid-2" class="icon"></i>
                        <span class="label">Líneas</span>
                    </a>
                </li>
                @endcan

                @can('Ver Atributos CRM')
                <li class="@if($submenu==9) active @endif">
                    <a href="{{ url('crm/configuration') }}" class="@if($submenu==9) active @endif">
                        <i data-acorn-icon="settings-1" class="icon"></i>
                        <span class="label">Configuraciones</span>
                    </a>
                </li>
                @endcan

                @can('Ver Atributos CRM')
                <li class="@if($submenu==10) active @endif">
                    <a href="{{ url('crm/connections') }}" class="@if($submenu==10) active @endif">
                        <i data-acorn-icon="web" class="icon"></i>
                        <span class="label">Conexiones</span>
                    </a>
                </li>
                @endcan
                @can('Ver Clientes CRM')
                <li class="@if($submenu==11) active @endif">
                    <a href="{{ url('crm/discarded') }}" class="@if($submenu==11) active @endif">
                        <i data-acorn-icon="archive" class="icon"></i>
                        <span class="label">Descartados</span>
                    </a>
                </li>
                @endcan

            </ul>
        </li>
        @endif
    </ul>
</div> --}}
