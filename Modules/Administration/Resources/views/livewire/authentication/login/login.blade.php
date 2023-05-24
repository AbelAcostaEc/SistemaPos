<div>
    @include('partials/alerts')
    <form wire:submit.prevent="login" method="POST" class="form w-100">
        <div class="col-md-12 text-center mt-2">
            <h2>Bienvenido</h2>
            <p>Por favor ingresa tus credenciales de acceso.</p>
        </div>
        <div class="form-floating mb-3">
            {!! Form::email('email', null, [
                'class' => 'form-control',
                'wire:model' => 'email',
                'id' => 'email',
                'placeholder' => 'email',
            ]) !!}
            <label for="email">Correo electrónico</label>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div class="form-floating mb-3">
            {!! Form::password('password', [
                'class' => 'form-control',
                'wire:model' => 'password',
                'id' => 'password',
                'placeholder' => 'pass',
            ]) !!}
            <label for="password">Contraseña</label>
        </div>

        <div class="d-flex justify-content-center">

            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </div>
    </form>
</div>
