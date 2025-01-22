<div class="modal fade" id="modalConfProd" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="tipoVenta">Configuración de stock de productos</h5>
            </div>
            <div class="modal-body" align="center">
                <table width="100%">
                    <tr>
                        <td align=right><label for="">Trabajar con stock de productos</label></td>
                        <td align=left>
                            <div class=boton>                    
                                <input type="checkbox" id="swStockProductos"/>
                                <label for="swStockProductos" class="switch"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align=right><label for="">Stock mínimo</label></td>
                        <td align=left>
                            <input type="number" name="txtNumMinimoStock" id="txtNumMinimoStock" class="form-control" placeholder="Cargando...">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="btnGuardarStock" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>