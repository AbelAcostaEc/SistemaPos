<div>
    <!-- Alerts -->
    @include('partials/alerts')
    <!-- Alerts End -->
    {{-- @can('ver permisos') --}}
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
                    <div class="">
                        <button type="button" class="btn btn-outline btn-outline-primary btn-active-primary" data-bs-toggle="modal"
                            data-bs-target="#modalForm">
                            Nuevo
                        </button>
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                            <thead>
                                <tr>
                                    <th class="">ID</th>
                                    <th class="">Nombre</th>
                                    <th class="">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-active-icon-primary btn-text-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalForm" wire:click="edit({{ $category->id }})">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-active-icon-danger btn-text-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalForm" wire:click="delete({{ $category->id }})">
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

                </div>
                <div class="card-footer">
                    @include('partials.pagination', ['paginator' => $categories])
                </div>
            </div>
        </div>
    </div>
    {{-- @endcan --}}
    @include('inventory::livewire.category.form')

</div>
