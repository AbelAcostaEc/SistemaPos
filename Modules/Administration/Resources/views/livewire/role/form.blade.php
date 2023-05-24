<!-- Modal -->
<div class="modal modal-right fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ $role_id ? 'Editar Rol' : 'Crear Rol' }}</h5>
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
                <span class="py-2">Permisos</span>
                <div class="row">

                    @foreach ($permissions as $permission )
                    <div class="form-check form-check-custom form-check-solid col-md-6">
                        <label class="form-check-label text-dark p-2">
                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'form-check-input', 'id' => 'permission'.$permission->id, 'wire:model.defer' => 'permission.'.$permission->id]) !!}
                            {{$permission->name}}
                        </label>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    wire:click="cancel()">Cancelar</button>

                @if ($role_id)
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
