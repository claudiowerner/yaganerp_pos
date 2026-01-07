
    <div class='modal fade' id='solicClaveAutAbrir' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='tipoVentaAnular'>Abrir caja</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>
          <div class='modal-body' align='center'>
            Para poder abrir la caja del día, debe ingresar la clave de autorización
            <br>
            <table>
              <tr>
                <td><label name='clave'>Clave</label></td>
                <td>
                  <input type='password' name='clave' id='claveCrearCaja' class='form-control' placeholder='Clave'>
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
            <button class='btn btn-success' id='btnValidar'>Validar</button>
          </div>
        </div>
      </div>
    </div>