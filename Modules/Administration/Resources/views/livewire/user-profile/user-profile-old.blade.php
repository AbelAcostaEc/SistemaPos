<div class="row">
    <!-- Alerts -->
    @include('partials/alerts')
    <!-- Alerts End -->
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Editar Contraseña</div>
            </div>
            <div class="card-body">
                <div class="text-center chat-image mb-5">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        @if ($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile picture" class="brround">
                        @else
                            <img src="{{ asset('media/profile-default.png') }}" alt="Profile picture" class="brround">
                        @endif
                    </div>
                    <div class="main-chat-msg-name">
                        <h5 class="mb-1 text-dark fw-semibold">{{ $user->name }}</h5>
                        <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{ $user->getRoleNames()->first() }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Current Password</label>
                    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                        </a>
                        <input class="input100 form-control" type="password" placeholder="Current Password"
                            autocomplete="current-password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">New Password</label>
                    <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                        </a>
                        <input class="input100 form-control" type="password" placeholder="New Password"
                            autocomplete="new-password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                        </a>
                        <input class="input100 form-control" type="password" placeholder="Confirm Password"
                            autocomplete="new-password">
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="" class="btn btn-primary">Update</a>
                <a href="" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <form wire:submit.prevent="updateProfile" enctype="multipart/form-data" autocomplete="off">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Perfil</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'wire:model.defer' => 'name']) !!}
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'wire:model.defer' => 'email']) !!}
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number">Número de teléfono:</label>
                                {!! Form::text('phone_number', null, [
                                    'class' => 'form-control',
                                    'id' => 'phone_number',
                                    'wire:model.defer' => 'phone_number',
                                ]) !!}
                                @error('phone_number')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Fecha de nacimiento:</label>
                                {!! Form::date('birthdate', null, [
                                    'class' => 'form-control',
                                    'id' => 'birthdate',
                                    'wire:model.defer' => 'birthdate',
                                ]) !!}
                                @error('birthdate')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="address">Dirección:</label>
                        {!! Form::textarea('address', null, [
                            'class' => 'form-control',
                            'id' => 'address',
                            'wire:model.defer' => 'address',
                            'rows' => 1,
                            'cols' => 50,
                            'style' => 'resize: none;',
                        ]) !!}
                        @error('address')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group" wire:ignore>
                        <label for="photo">Foto:</label>
                        {!! Form::file('photo', [
                            'class' => 'dropify',
                            'id' => 'photo',
                            'wire:model' => 'photo',
                            'data-bs-height' => '180',
                            'data-default-file' => $user->photo ? asset('storage/' . $user->photo) : asset('media/profile-default.png'),

                        ]) !!}
                        @error('photo')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="card-footer text-end">
                    <div>
                        <button type="submit" class="btn btn-success">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
