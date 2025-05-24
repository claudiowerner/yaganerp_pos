<!--modalCambiarCantidad-->
      <div class='modal fade' id='modalAgregarCliente' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Modificar cantidad venta ID 
                <!--Env�o de ID venta a PHP via JS--><span id='idVenta'></span>
                <!--Env�o de NOMBRE DEL PRODUCTO a PHP via JS--><label id='id_prod' style='display:  none'></label></h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center'>
                <table style='width:100%'>
                  <tr>
                    <td>
                      <label for=''>R.U.T.</label>
                    </td>
                    <td>
                      <input type='text' name='txtRutGuardar' id='txtRutGuardar' class='form form-control' required>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for=''>Nombre:</label>
                    </td>
                    <td>
                      <input type='text' name='txtNombreGuardar' id='txtNombreGuardar' class='form form-control' required>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for=''>Apellido:</label>
                    </td>
                    <td>
                      <input type='text' name='txtApellidoGuardar' id='txtApellidoGuardar' class='form form-control' required>
                    </td>
                  </tr>
                </table>
            </div>
            <div class='modal-footer'>
              <label for='' id='lblRutValido'></label>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
              <button type='submit' class='btn btn-success' id='btnGuardarCliente' data-dismiss='modal'>Guardar</button>
            </div> 
          </div>
        </div>
      </div>
      