<div>
    <!-- Alerts -->
    @include('partials/alerts')
    <!-- Alerts End -->
    <div class="row">
        @can('crear permisos')
            <div class="col-md-12 d-flex flex-end">
                <button type="button" class="btn btn-outline btn-outline-primary btn-active-primary" data-bs-toggle="modal"
                    data-bs-target="#modalForm">
                    Nuevo
                </button>
            </div>
        @endcan
        <div class="col-md-12 my-5 d-flex justify-content-between align-items-center">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1 me-5">
                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span class="path2"></span></i>
                {!! Form::text('search', null, [
                    'class' => 'form-control form-control-solid w-250px ps-13' . ($errors->has('search') ? ' is-invalid' : ''),
                    'data-kt-permissions-table-filter' => 'search',
                    'wire:model' => 'search',
                    'placeholder' => 'Buscar Permisos',
                ]) !!}
            </div>
            <!--end::Search-->
            <div class="d-flex align-items-center">
                <span>Mostrar</span>
                {!! Form::select('paginate', [5 => 5, 10 => 10, 20 => 20], null, [
                    'class' => 'form-select mx-2',
                    'wire:model' => 'paginate',
                ]) !!}
                <span>Resultados</span>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                <thead>
                    <tr>
                        <th class="">ID</th>
                        <th class="">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <button type="button" class="btn btn-active-icon-primary btn-text-primary"
                                    data-bs-toggle="modal" data-bs-target="#modalForm"
                                    wire:click="edit({{ $permission->id }})">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-active-icon-danger btn-text-danger"
                                    data-bs-toggle="modal" data-bs-target="#modalForm"
                                    wire:click="delete({{ $permission->id }})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center py-4">No hay permisos registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="my-5">
            @include('partials.pagination', ['paginator' => $permissions])
        </div>
    </div>
    @include('administration::livewire.permission.form')

</div>
