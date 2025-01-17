<div class='modal fade' id='modalRegistrarPromocion' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog modal-lg' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                <h5 class='modal-title' id='exampleModalLongTitle'><strong>Agregar promoción</strong><strong id="idPromocion" style="display: none"></strong></h5>
            </div>
            <div class='modal-body'>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">Nombre promoción</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" id="txtNombrePromocion" class="form-control" onkeyup="crearNombre()">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">Producto</label>
                            </div>
                            <div class="col-lg-8">
                                <select id="slctProductoPromocion" class="form-control" style="width: 100%" onchange="crearProductoPromocion()"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">Unidades</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="number" id="txtNumeroUnidades" class="form-control" onkeyup="crearUnidades()">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">Precio</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="number" id="txtPrecioPromocion" class="form-control" onkeyup="crearPrecio()">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='modal-footer'>
                ssssss
            </div>
        </div>
    </div>
</div>