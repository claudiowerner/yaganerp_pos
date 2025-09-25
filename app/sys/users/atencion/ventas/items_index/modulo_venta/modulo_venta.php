<div class="row">
    <div class="col-lg-12">
        <div id="pantallaPrincipal" class="plan">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header" style="align:left;">
                        <?php require "items_index/info_venta/info_venta.php"?>
                    </div>
                    <div id="imprimirBoleta" class="card-body">
                        <div class="row" id="">
                            <table class="table table-hover responsive" width="100%" id="tablaVentas">
                                <th>Pedido</th>
                                <th>Tipo</th>
                                <th>Valor</th>
                                <th>- Ó +</th>
                                <th>Eliminar</th>
                                <tbody id="ventas" class="table-hover ">
                                    <tr>
                                        <td>Cargando...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>