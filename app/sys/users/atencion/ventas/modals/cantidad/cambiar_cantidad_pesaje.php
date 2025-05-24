<!--modalCambiarCantidad-->
      <div class='modal fade' id='cambiarCantidadPesaje' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Modificar pesaje
                <!--Envío de ID venta a PHP via JS--><span id='idVentaPesaje'></span>
                <!--Envío de NOMBRE DEL PRODUCTO a PHP via JS--><label id='id_prodPesaje' style='display:  none'></label></h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center' id='modificarCantidad'>
              <table>
                <tr>
                  <td>Ingrese el pesaje: </td>
                  <td><input type='number' id='cantModPesaje' class='form form-control' ></td>
                  <td>KGs</td>
                </tr>
              </table>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
              <button class='btn btn-success' id='btnActCantidadPesaje' data-dismiss='modal'>Actualizar</button>
            </div>
          </div>
        </div>
      </div>
      