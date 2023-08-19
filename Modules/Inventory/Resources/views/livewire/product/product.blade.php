<div>
    <!-- Alerts -->
    @include('partials.alerts')
    <!-- Alerts End -->
    <div class="row">
        @can('crear productos')
            <div class="col-md-12 d-flex flex-end">
                <button type="button" class="btn btn-outline btn-outline-primary btn-active-primary mx-2" data-bs-toggle="modal" data-bs-target="#modalForm">
                    <i class="fa fa-plus"></i> Nuevo
                </button>
                <button type="button" class="btn btn-outline btn-outline-success btn-active-success mx-2" data-bs-toggle="modal" data-bs-target="#importForm">
                    <i class="fa fa-upload"></i> Importar Productos
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
                    'placeholder' => 'Buscar Productos',
                ]) !!}
            </div>
            <!--end::Search-->
            <div class="d-flex align-items-center">
                <span>Mostrar</span>
                {!! Form::select('paginate', [8 => 8, 16 => 16, 24 => 24, 32 => 32], null, [
                    'class' => 'form-select mx-2',
                    'wire:model' => 'paginate',
                ]) !!}
                <span>Resultados</span>
            </div>
        </div>
        <div class="row">
            @forelse ($products as $product)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Código: {{ $product->code }}</h4>
                        <div class="d-flex justify-content-center">
                            @if($product->image)
                            <img src="{{ asset('storage/'. $product->image) }}" height="100px" width="100px" alt="image">
                            @else
                            <img src="{{ asset('media/no-image.png') }}" height="100px" width="100px" alt="image">
                            @endif
                        </div>
                        <div class="d-flex flex-column text-center justify-content-center">
                            <h3 class="fw-bolder fs-3 text-dark">{{ $product->name }}</h3>
                            <span class="text-muted fw-bold">Restantes: {{ $product->stock }}</span>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="fw-bolder fs-3 text-dark">${{ $product->sale_price }}</div>
                        </div>
                        @can('editar productos')
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-active-icon-primary btn-text-primary"
                                data-bs-toggle="modal" data-bs-target="#modalForm"
                                wire:click="edit({{ $product->id }})">
                                <i class="fa fa-pencil"></i>
                            </button>

                            @can('eliminar productos')
                                <button type="button" class="btn btn-active-icon-danger btn-text-danger"
                                    data-bs-toggle="modal" data-bs-target="#modalForm"
                                    wire:click="delete({{ $product->id }})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            @endcan
                        </div>
                    @endcan
                    </div>                    
                </div>
            </div>
            @empty
            <table>
                <tr>
                    <td colspan="2" class="text-center py-4">No hay productos registrados</td>
                </tr>
            </table>
            @endforelse
        </div>
        <div class="my-5">
            @include('partials.pagination', ['paginator' => $products])
        </div>
    </div>
    @include('inventory::livewire.product.form')
    @include('inventory::livewire.product.import')
</div>
