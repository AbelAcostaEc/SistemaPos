<!-- Modal -->
<div class="modal modal-right fade" id="importForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['files' => true]) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">Importar Productos</h5>
            </div>
            <div class="modal-body">                
                <div class="row">                    
                    <div class="col-12">
                        <label for="">Imagen</label>
                         <!--begin::Inputs-->
                         {!! Form::file('import_file', [
                            'id' => 'import_file',
                            'class' => 'form-control'. ($errors->has('import_file') ? ' is-invalid' : ''),
                            'wire:model.defer' => 'import_file',
                        ]) !!}
                        <br>
                        <!--end::Hint-->
                        @if ($import_file)
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="cancel()">Cancelar</button>
                <button type="button" class="btn btn-success" wire:click="import()">Cargar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
