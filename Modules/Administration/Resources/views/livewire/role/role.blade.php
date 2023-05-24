<div>
    <!-- Alerts -->
    @include('partials/alerts')
    <!-- Alerts End -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="form-floating mb-3">
                        {!! Form::text('search', null, [
                            'class' => 'form-control' . ($errors->has('search') ? ' is-invalid' : ''),
                            'wire:model' => 'search',
                            'placeholder' => 'search',
                        ]) !!}
                        <label for="search">Buscar</label>
                    </div>
                    @can('crear roles')
                    <div class="">
                        <button type="button" class="btn btn-outline btn-outline-primary btn-active-primary" data-bs-toggle="modal"
                            data-bs-target="#modalForm">
                            Nuevo
                        </button>
                    </div>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border text-nowrap text-md-nowrap table-striped mb-0"
                            id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="">Nombre</th>
                                    <th class="">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @can('ver roles')
                                            <button type="button" class="btn btn-active-icon-success btn-text-success" data-bs-toggle="modal"
                                                data-bs-target="#modalView" wire:click="view({{ $role->id }})">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            @endcan
                                            @can('editar roles')
                                            <button type="button" class="btn btn-active-icon-primary btn-text-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalForm" wire:click="edit({{ $role->id }})">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            @endcan
                                            @can('eliminar roles')
                                            <button type="button" class="btn btn-active-icon-danger btn-text-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalForm" wire:click="delete({{ $role->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center py-4">No hay roles registrados</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-footer">
                    @include('partials.pagination', ['paginator' => $roles])
                </div>
            </div>
        </div>
    </div>
    @include('administration::livewire.role.form')
    @include('administration::livewire.role.view')

</div>
