<!--modalSolicitarClaveAutorizacion-->
  <div class='modal fade' id='solicClaveAut' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='tipoVenta'>Eliminar venta de producto <span id='anVenta'>id</span>
            <!--Env�o de ID venta a PHP via JS--><span id='idVentaElim'></span>
            <!--Env�o de NOMBRE DEL PRODUCTO a PHP via JS--><label id='prodModCantElim'></label></h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body' align='center'>
          Para poder anular este producto, debe ingresar la clave de autorizaci�n
          <br>
          <table>
            <tr>
              <td><label name='clave'>Clave</label></td>
              <td>
                <input type='password' name='clave' id='clave' class='form-control' placeholder='Clave'>
              </td>
            </tr>
            <tr>
              <td></td>
              <td><label id='msjClave'></label></td>
            </tr>
          </table>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
          <button class='btn btn-success' id='btnConfirmarEliminarVenta'>Confirmar</button>
        </div>
      </div>
    </div>
  </div>