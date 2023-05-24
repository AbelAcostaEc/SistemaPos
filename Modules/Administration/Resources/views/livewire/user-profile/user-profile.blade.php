<div class="row">
    <!-- Alerts -->
    @include('partials/alerts')
    <!-- Alerts End -->

    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Profile Details</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            {{-- <form id="kt_account_profile_details_form" class="form"> --}}
            {!! Form::open(['files' => true, 'wire:submit.prevent' => 'updateProfile']) !!}
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Imagen</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true"
                            style="background-image: url('{{ asset('media/profile-default.png') }}')" wire:ignore>
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px"
                                style="background-image: url('{{ $user->photo ? asset('storage/' . $user->photo) : asset('media/profile-default.png') }}')">
                            </div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Cambiar imagen">
                                <i class="ki-duotone ki-pencil fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <!--begin::Inputs-->
                                {!! Form::file('photo', [
                                    'id' => 'photo',
                                    'wire:model.defer' => 'photo',
                                    'accept' => '.png, .jpg, .jpeg',
                                ]) !!}
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Tipos de archivo permitidos: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                        @if ($photo)
                            <script>
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": false,
                                    "positionClass": "toastr-top-center",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "500",
                                    "timeOut": "3000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                };

                                toastr.info("Imagen subida correctamente, Guarde los cambios.", "Correcto");
                            </script>
                        @endif
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nombre Completo</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-12">
                                {!! Form::text('name', null, [
                                    'class' =>
                                        'form-control form-control-lg form-control-solid mb-3 mb-lg-0' . ($errors->has('name') ? ' is-invalid' : ''),
                                    'id' => 'name',
                                    'wire:model.defer' => 'name',
                                ]) !!}
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Fecha de nacimiento::</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        {!! Form::date('birthdate', null, [
                            'class' => 'form-control form-control-lg form-control-solid' . ($errors->has('birthdate') ? ' is-invalid' : ''),
                            'id' => 'birthdate',
                            'wire:model.defer' => 'birthdate',
                        ]) !!}
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">Número de teléfono:</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="El número de teléfono debe estar activo">
                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        {!! Form::text('phone_number', null, [
                            'class' => 'form-control form-control-lg form-control-solid' . ($errors->has('phone_number') ? ' is-invalid' : ''),
                            'id' => 'phone_number',
                            'wire:model.defer' => 'phone_number',
                        ]) !!}
                        {{-- @error('phone_number')
                                <span class="error">{{ $message }}</span>
                            @enderror --}}
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Dirección</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-12">
                                {!! Form::textarea('address', null, [
                                    'class' => 'form-control form-control-lg form-control-solid' . ($errors->has('address') ? ' is-invalid' : ''),
                                    'id' => 'address',
                                    'wire:model.defer' => 'address',
                                    'rows' => 1,
                                    'cols' => 50,
                                    'style' => 'resize: none;',
                                ]) !!}
                                {{-- @error('address')
                                        <span class="error">{{ $message }}</span>
                                    @enderror --}}
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card body-->
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
            <!--end::Actions-->
            {!! Form::close() !!}
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->
    <!--begin::Sign-in Method-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_signin_method">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Método de inicio de sesión</h3>
            </div>
        </div>
        <!--end::Card header-->
        @if (session('error_sing_in') || $errors->has('email'))
            <!--begin::Alert-->
            <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 my-3">
                <!--begin::Icon-->
                <i class="ki-duotone ki-message-text-2 fs-2hx text-danger me-4 mb-5 mb-sm-0"><span
                        class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                <!--end::Icon-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-column pe-0 pe-sm-10">
                    <!--begin::Title-->
                    <h4 class="mb-2 ">Error!</h4>
                    <!--end::Title-->
                    <!--begin::Content-->
                    <span>{{ session('error_sing_in') }}</span>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Close-->
                <button type="button"
                    class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                    data-bs-dismiss="alert">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </button>
                <!--end::Close-->
            </div>
            <!--end::Alert-->
        @endif
        <!--begin::Content-->
        <div id="kt_account_settings_signin_method" class="collapse show">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Email Address-->
                <div class="d-flex flex-wrap align-items-center">
                    <!--begin::Label-->
                    <div id="kt_signin_email">
                        <div class="fs-6 fw-bold mb-1">Correo Electrónico</div>
                        <div class="fw-semibold text-gray-600">{{ Auth::user()->email }}</div>
                    </div>
                    <!--end::Label-->
                    <!--begin::Edit-->
                    <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                        <!--begin::Form-->
                        <div class="row mb-6">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="fv-row mb-0">
                                    <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Ingrese el nuevo
                                        correo</label>
                                    {!! Form::email('email', null, [
                                        'class' => 'form-control form-control-lg form-control-solid',
                                        'id' => 'email',
                                        'wire:model.defer' => 'email',
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="fv-row mb-0">
                                    <label for="password" class="form-label fs-6 fw-bold mb-3">Confirmar
                                        Contraseña</label>
                                    {!! Form::password('password', [
                                        'class' => 'form-control form-control-lg form-control-solid' . ($errors->has('password') ? ' is-invalid' : ''),
                                        'id' => 'password',
                                        'wire:model.defer' => 'password',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="button" class="btn btn-primary me-2 px-6"
                                wire:click="changeEmail()">Actualizar Correo</button>
                            {{-- kt_signin_submit --}}
                            <button id="kt_signin_cancel" type="button"
                                class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Edit-->
                    <!--begin::Action-->
                    <div id="kt_signin_email_button" class="ms-auto">
                        <button class="btn btn-light btn-active-light-primary">Cambiar Correo Electrónico</button>
                    </div>
                    <!--end::Action-->
                </div>
                <!--end::Email Address-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Separator-->
                <!--begin::Password-->
                <div class="d-flex flex-wrap align-items-center mb-10">
                    <!--begin::Label-->
                    <div id="kt_signin_password">
                        <div class="fs-6 fw-bold mb-1">Contraseña</div>
                        <div class="fw-semibold text-gray-600">************</div>
                    </div>
                    <!--end::Label-->
                    <!--begin::Edit-->
                    <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                        <!--begin::Form-->
                        <form id="kt_signin_change_password" class="form" novalidate="novalidate">
                            <div class="row mb-1">
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="curent_password" class="form-label fs-6 fw-bold mb-3">Contraseña
                                            Actual</label>
                                        {!! Form::password('curent_password', [
                                            'class' =>
                                                'form-control form-control-lg form-control-solid' . ($errors->has('curent_password') ? ' is-invalid' : ''),
                                            'id' => 'curent_password',
                                            'wire:model.defer' => 'curent_password',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="new_password" class="form-label fs-6 fw-bold mb-3">Nueva
                                            Contraseña</label>
                                        {!! Form::password('new_password', [
                                            'class' => 'form-control form-control-lg form-control-solid' . ($errors->has('new_password') ? ' is-invalid' : ''),
                                            'id' => 'new_password',
                                            'wire:model.defer' => 'new_password',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="confirm_new_password"
                                            class="form-label fs-6 fw-bold mb-3">Confirmar Contraseña</label>
                                        {!! Form::password('confirm_new_password', [
                                            'class' =>
                                                'form-control form-control-lg form-control-solid' . ($errors->has('confirm_new_password') ? ' is-invalid' : ''),
                                            'id' => 'confirm_new_password',
                                            'wire:model.defer' => 'confirm_new_password',
                                        ]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-text mb-5">La contraseña debe tener al menos 8 caracteres y contener
                                símbolos</div>
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary me-2 px-6"
                                    wire:click="changePassword()">Actualizar Contraseña</button>
                                <button id="kt_password_cancel" type="button"
                                    class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancelar</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Edit-->
                    <!--begin::Action-->
                    <div id="kt_signin_password_button" class="ms-auto">
                        <button class="btn btn-light btn-active-light-primary">Cambiar Contraseña</button>
                    </div>
                    <!--end::Action-->
                </div>
                <!--end::Password-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Sign-in Method-->
</div>
