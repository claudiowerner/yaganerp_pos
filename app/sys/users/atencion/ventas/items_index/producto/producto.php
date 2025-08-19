<hr>
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-1">
            <label name="lblCantidad">Producto</label>
        </div>
        <div class="col-lg-7">
            <select id="prod" class="form form-control" onChange="productoValido()"></select>
        </div>
        <div class="col-lg-2">
            <button type="button" id="restarCant" class="btn btn-danger">
            <img src="../../../img/restar.png" width="10">
            </button>
            <strong id="cantProd">1</strong>
            <button type="button" id="sumarCant" class="btn btn-success">
            <img src="../../../img/sumar.png" width="10">
            </button>
        </div>
        <div class="col-lg-1">
            <label name="lblCantidad">Cantidad</label>
        </div>
        <div class="col-lg-1">
            <button id="venta" name="agregar" class="agregar btn btn-success" disabled>Agregar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1">
            <label name="lblCantidad">Código de barra</label>
        </div>
        <div class="col-lg-11">
            <input type="text" name="cod_barra" id="txtCodBarra" class="form form-control" placeholder="Haga click acá y escanée el código de barra">
        </div>
    </div>
</div>