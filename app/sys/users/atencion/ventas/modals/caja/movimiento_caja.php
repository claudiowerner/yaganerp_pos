<!--modal Imprimir cuenta General-->
      <div class='modal fade' id='modalMovimientoCaja' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog modal-lg' role='document' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5><strong>Monto inicial de caja</strong></h5>
              
            </div>
            <div class='modal-body' align='center'>
              <table>
                <tr>
                  <td width='50%'>
                    <strong>Ingresar operación:</strong>
                    <br>
                    Para agregar dinero, escriba el número sin signos adelante.
                    Para registrar un retiro, agregue un signo - y luego la cifra a retirar
                  </td>
                  <td width='25%'><input type=number id='txtMovimientoCaja' class='form-control'></td>
                  <td width='25%'><button id='btnAgregarMovimiento' class='btn btn-success'>Agregar movimiento</button></td>
                </tr>
              </table>
              <table class='table'>
                <tr align='center'>
                  <th width='33%'>Operación</th>
                  <th width='33%'>Motivo</th>
                  <th width='34%'>Monto</th>
                </tr>
                <tbody id='bodyMovimientoCaja'>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>