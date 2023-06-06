<!-- Modal -->
<div class="modal modal-right fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ $permission_id ? 'Editar Usuario' : 'Crear Usuario' }}
                </h5>
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
                @if(!$permission_id)
                <div class="form-check">
                    {!! Form::checkbox('group', 1, null, ['class' => 'form-check-input', 'id' => 'group', 'wire:model.defer' => 'group']) !!}
                    <label class="form-check-label" for="group">Grupo de Permisos
                        <i class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="Habilite la opción para generar los permisos ver, crear, editar, eliminar"></i>
                    </label>
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    wire:click="cancel()">Cancelar</button>

                @if ($permission_id)
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
