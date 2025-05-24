
<!--modal Imprimir cuenta General-->
      <div class='modal fade' id='modalMetodoPago' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document' style='max-width: 900px!important;' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Imprimir cuenta general</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center'>
              <div>
                <table class='table'>
                  <tr>
                    <td>
                      <strong>Método de pago</strong>
                    </td>
                    <td>
                      <select id='metodoPagoGral' class='form-control' onChange='activarBotonCuentaGral(this)'>
                        <option>Cargando...</option>
                      </select>
                    </td>
                    <td>
                      <button class='btn btn-success' id='btnConfirmarPaga' disabled='true'>Pagar cuenta</button>
                    </td>
                  </tr>
                </table>
                <table id='tblMontoVuelto'>
                  <tr>
                    <td><label>Paga con:</label></td>
                    <td><input type='number' id='txtMontoPago' class='form-control'></td>
                  </tr>
                  <tr>
                    <td><label>Vuelto: </label></td>
                    <td><label id='lblResultadoVuelto'></label></td>
                  </tr>
                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>