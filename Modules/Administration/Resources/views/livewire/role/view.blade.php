<!-- Modal -->
<div class="modal modal-right fade" id="modalView" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize text-center" id="modalViewLabel">{{ $role_view ? $role_view->name: '' }}</h5>
            </div>
            <div class="modal-body">
                <p class="h5 text-center">Permisos</p>
                <div class="">
                    <ul>
                    @if($role_view)
                        @foreach ($role_view->permissions as $permission )
                        <li class="list-group-item">
                            <i class="fa fa-check text-success me-2" aria-hidden="true"></i>
                            {{$permission->name}}
                        </li>
                        @endforeach
                    @endif
                    </ul>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="cancel()" >Cancelar</button>
            </div>
        </div>
    </div>
</div>
