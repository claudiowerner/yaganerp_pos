<!--modalSolicitarClaveAutorizacionAnular-->
  <div class='modal fade' id='solicClaveAutAnular' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='tipoVentaAnular'>Anular venta <span id='anVentaAnular'>id</span> mesa <span id='mesaAnular'>id</span></h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body' align='center'>
          Para poder anular la venta asociada a esta mesa, debe ingresar la clave de autorización
          <br>
          <table>
            <tr>
              <td><label name='clave'>Clave</label></td>
              <td>
                <input type='password' name='clave' id='claveAnular' class='form-control' placeholder='Clave'>
              </td>
            </tr>
            <tr>
              <td></td>
              <td><label id='msjClaveAnular'></label></td>
            </tr>
          </table>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
          <button class='btn btn-success' id='btnAnularVenta'>Confirmar</button>
        </div>
      </div>
    </div>
  </div>