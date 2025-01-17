<div class='modal fade' id='modalEditarPromocion' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog modal-lg' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                <h5 class='modal-title' id='exampleModalLongTitle'><strong>Editar promoción</strong><strong id="idPromocionEditar" style="display: none"></strong></h5>
            </div>
            <div class='modal-body'>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">Nombre promoción</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" id="txtNombrePromocionEditar" class="form-control" onkeyup="editarNombre()">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">Producto</label>
                            </div>
                            <div class="col-lg-8">
                                <select id="slctProductoPromocionEditar" class="form-control" style="width: 100%" onchange="editarProductoPromocion()"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">Unidades</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="number" id="txtNumeroUnidadesEditar" class="form-control" onkeyup="editarUnidades()">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">Precio</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="number" id="txtPrecioPromocionEditar" class="form-control" onkeyup="editarPrecio()">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>