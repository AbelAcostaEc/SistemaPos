<!-- Modal -->
<div class="modal modal-right fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ $user_id ? 'Editar Usuario' : 'Crear Usuario' }}</h5>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    {!! Form::text('name', null, [
                        'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                        'wire:model.defer' => 'name',
                        'placeholder' => 'name',
                    ]) !!}
                    <label for="name">Nombre</label>
                </div>
                <div class="form-floating mb-3">
                    {!! Form::email('email', null, [
                        'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
                        'wire:model.defer' => 'email',
                        'placeholder' => 'email',
                    ]) !!}
                    <label for="email">Correo Electronico</label>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    {!! Form::password('password', [
                        'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''),
                        'wire:model.defer' => 'password',
                        'placeholder' => 'password',
                    ]) !!}
                    <label for="password">Contraseña</label>
                </div>
                @can('crear roles')
                <span class="py-2">Roles</span>
                <div class="row">
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @foreach($roles as $role)
						<div class="form-check form-check-custom form-check-solid col-md-6">
							<label for="role{{$role->id}}" class="form-check-label text-dark p-2">
								{!! Form::checkbox('roles[]', $role->id, null, ['class' => 'form-check-input', 'id' => 'role'.$role->id, 'wire:model.defer' => 'role.'.$role->id]) !!}
								{{ $role->name }}
							</label>
						</div>

					@endforeach
                </div>
                @endcan
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    wire:click="cancel()">Cancelar</button>

                @if ($user_id)
                    @if ($deleteMode)
                        <button type="button" class="btn btn-danger" wire:click="destroy()">Borrar</button>
                    @else
                        <button type="button" class="btn btn-success" wire:click="update()">Actualizar</button>
                    @endif
                @else
                    <button type="button" class="btn btn-success" wire:click="store()">Guardar</button>
                @endif

            </div>
        </div>
    </div>
</div>
