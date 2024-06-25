<hr>
<table width="100%">
    <tr>
        <td align="left" width="">
            <label name="lblCantidad">Producto</label>
        </td>
        <td align="left" width="70%">
            <select id="prod" class="form form-control" onChange="productoValido()">
            </select>
        </td>
        
        <td align="left" width="15%">
            <label name="lblCantidad">Cantidad</label>
        </td>
        <td width="15%">
            <button type="button" id="restarCant" class="btn btn-danger">
            <img src="../../../img/restar.png" width="10">
            </button>
            <strong id="cantProd">1</strong>
            <button type="button" id="sumarCant" class="btn btn-success">
            <img src="../../../img/sumar.png" width="10">
            </button>
        </td>
        <td>
            <button id="venta" name="agregar" class="agregar btn btn-success" disabled>Agregar</button>
        </td>
    </tr>
    <tr>
        <td align="left" width="40px">
            <label name="lblCantidad">Código de barra</label>
        </td>
        <td align="left" width="">
            <input type="text" name="cod_barra" id="txtCodBarra" class="form form-control" placeholder="Haga click acá y escanée el código de barra">
        </td>
    </tr>
</table>