<!--modalCambiarCantidad-->
      <div class='modal fade' id='modalPagarCuenta' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Pagar cuenta 
                <span id='idVenta'></span>
                <label id='id_prod' style='display:  none'></label>
              </h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center'>
              <table style='width:100%'>
                <tr>
                  <td>
                    <label for=''>Cliente</label>
                  </td>
                  <td width='80%'>
                    <input type='text' id='txtBuscarCliente' class='form form-control select2' autocomplete='off'>
                  </td>
                  <td>
                    <button id='btnAgregarCliente' class='btn btn-success' style='width:100%' disabled >Agregar</button>
                  </td>
                </tr>
              </table>
            </div>
            <div class='modal-body' align='center'>
              <table class='table'>
                <th>
                  <tr style='width:33%'>
                    <td>R.U.T.</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Seleccionar</td>
                  </tr>
                </th>
                <tbody id='datosClientePagarCuenta'>
                  <tr>
                    <td colspan=4 align=center>
                      Indique un parámetro de búsqueda
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>  
          </div>
        </div>
      </div>
      