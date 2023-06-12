<!-- Modal -->
<div class="modal modal-right fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">{{ $product_id ? 'Editar Usuario' : 'Crear Usuario' }}</h5>
            </div>
            <div class="modal-body">
                {!! Form::open(['files' => true]) !!}
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating mb-3 ">
                            {!! Form::select('category_id', $categories, null, [
                                'class' => 'form-select' . ($errors->has('category_id') ? ' is-invalid' : ''),
                                'wire:model.defer' => 'category_id',
                                'placeholder' => 'Escoja una categoria..',
                            ]) !!}
                            <label for="category_id">Categoria</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3 ">
                            {!! Form::text('code', null, [
                                'class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''),
                                'wire:model.defer' => 'code',
                                'placeholder' => 'code',
                            ]) !!}
                            <label for="code">Código Único.</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3 ">
                            {!! Form::text('name', null, [
                                'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                                'wire:model.defer' => 'name',
                                'placeholder' => 'name',
                            ]) !!}
                            <label for="name">Nombre</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="description">Descripción</label>
                        <div class="my-3">
                            {!! Form::textarea('description', null, [
                                'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),
                                'rows' => '2',
                                'wire:model.defer' => 'description',
                                'placeholder' => 'description',
                            ]) !!}

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            {!! Form::text('purchase_price', null, [
                                'class' => 'form-control' . ($errors->has('purchase_price') ? ' is-invalid' : ''),
                                'wire:model.defer' => 'purchase_price',
                                'placeholder' => 'purchase_price',
                            ]) !!}
                            <label for="purchase_price">Precio de Compra</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            {!! Form::text('sale_price', null, [
                                'class' => 'form-control' . ($errors->has('sale_price') ? ' is-invalid' : ''),
                                'wire:model.defer' => 'sale_price',
                                'placeholder' => 'sale_price',
                            ]) !!}
                            <label for="sale_price">Precio de Venta</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            {!! Form::text('stock', null, [
                                'class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''),
                                'wire:model.defer' => 'stock',
                                'placeholder' => 'stock',
                            ]) !!}
                            <label for="stock">Stock Actual</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            {!! Form::text('minimum_stock', null, [
                                'class' => 'form-control' . ($errors->has('minimum_stock') ? ' is-invalid' : ''),
                                'wire:model.defer' => 'minimum_stock',
                                'placeholder' => 'minimum_stock',
                            ]) !!}
                            <label for="minimum_stock">Stock Mínimo</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="">Imagen</label>
                         <!--begin::Inputs-->
                         {!! Form::file('image', [
                            'id' => 'image',
                            'class' => 'form-control',
                            'wire:model.defer' => 'image',
                            'accept' => '.png, .jpg, .jpeg',
                        ]) !!}
                        <br>
                        <div class="d-flex justify-content-center align-items-center">
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" width="100px" height="100px" class="img-fluid" alt="">
                            @elseif($product_image)
                                <img src="{{ asset('storage/' . $product_image) }}" width="100px" height="100px" class="img-fluid" alt="">
                            @else
                                <img src="{{ asset('media/profile-default.png') }}"  width="100px" height="100px" class="img-fluid" alt="">
                            @endif
                        </div>
                        <!--end::Hint-->
                        @if ($image)
                            <script>
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": false,
                                    "positionClass": "toastr-top-center",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "500",
                                    "timeOut": "3000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                };

                                toastr.info("Imagen subida correctamente, Guarde los cambios.", "Correcto");
                            </script>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    wire:click="cancel()">Cancelar</button>

                @if ($product_id)
                    @if ($deleteMode)
                        <button type="button" class="btn btn-danger" wire:click="destroy()">Borrar</button>
                    @else
                        <button type="button" class="btn btn-success" wire:click="update()">Actualizar</button>
                    @endif
                @else
                    <button type="button" class="btn btn-success" wire:click="store()">Guardar</button>
                @endif
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
