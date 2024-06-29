<?php

    echo "<!--modal Imprimir cuenta General-->
      <div class='modal fade' id='modalMetodoPagoPagarCuenta' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document' style='max-width: 900px!important;' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Pagar cuenta</h5>
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
                      <select id='metodoPagoCuenta' class='form-control' onChange=' activarBotonPagarCuenta(this)'>
                        <option>Cargando...</option>
                      </select>
                    </td>
                    <td>
                      <button class='btn btn-success' id='btnConfirmarPagaCuenta' disabled='true'>Pagar cuenta</button>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>";

?>