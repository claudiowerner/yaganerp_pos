<?php
function modalRegistroCliente()
{
    return 
    "<div class='modal fade' id='modalRegistro' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog modal-lg modal-dialog-scrollable ' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
        <h5 class='modal-title' id='exampleModalLongTitle'>Agregando</h5>
      </div>
      <div class='modal-body'>
        <form id='frmRegistro'>
          <div class='row'>
            <div class='col-lg-6'>
              <div align='center'>
                <h6>---Datos del cliente---</h6>
              </div>
              <table width='100%'>
                <tr>
                  <td>
                    <label name='nombrePiso'>Nombre</label>
                  </td>
                  <td>
                    <input type='text' name='nomCliente' id='nomCliente' class='form-control' required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='nombrePiso'>Rut</label>
                  </td>
                  <td>
                    <input type='text' name='rut' id='rut' class='form-control' required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='nombrePiso'>Correo</label>
                  </td>
                  <td>
                    <input type='text' name='correo' id='correo' class='form-control' required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='nombrePiso'>Telefono</label>
                  </td>
                  <td>
                    <input type='number' name='telefono' id='telefono' class='form-control' required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='nombrePiso'>Dirección</label>
                  </td>
                  <td>
                    <input type='text' name='direccion' id='direccion' class='form-control' required>
                  </td>
                </tr>
              </table>
              <div align='center'>
                <h6>---Datos de la empresa---</h6>
              </div>
              <table width='100%'>
                <tr>
                  <td>
                    <label name='nombrePiso'>Nombre de fantasía</label>
                  </td>
                  <td>
                    <input type='text' name='nomFantasia' id='nomFantasia' class='form-control' align='center' style='width: 50%' required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='nombrePiso'>Razón social</label>
                  </td>
                  <td>
                    <input type='text' name='razonSocial' id='razonSocial' class='form-control' align='center' style='width: 50%' required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='nombrePiso'>Giro</label>
                  </td>
                  <td>
                    <select name='slctGiros' id='slctGiros' class='form-control select2'></select>
                  </td>
                </tr>
              </table>
            </div>
            <div class='col-lg-6'>
              <div align='center'>
                <h6>--Datos de pago--</h6>
              </div>
              <table width='100%'>
                <tr>
                  <td><label name='nombrePiso'>Plan comprado</label></td>
                  <td>
                    <select  name='slctPlan' id='slctPlan' class='form-control select2' onChange=calcularPago() style='width:100%'></select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='nombrePiso'>Plazo de pago</label>
                  </td>
                  <td>
                    <select id='slctPlazoPago' class='form-control' onChange=calcularPago()></select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='nombrePiso'>Método de pago</label>
                  </td>
                  <td>
                    <select id='tipoPago' class='form-control'></select>
                  </td>
                </tr>
              </table>
              ----------
              <table class='table'>
                <tr><th colspan='2'>Resumen de pago</th></tr>
                <tr>
                  <td><label>Meses seleccionados:</label></td>
                  <td id='mesesSeleccionados'>Esperando...</td>
                </tr>
                <tr>
                  <td><label>Valor del plan:</label></td>
                  <td id='valorPlan'>Esperando...</td>
                </tr>
                <tr>
                  <td><label>Valor a pagar por periodo:</label></td>
                  <td id='valorTotal'>Esperando...</td>
                </tr>
              </table>
            </div>
          </div>
        </form>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
        <button type='submit' id='btnGuardar' class='btn btn-primary'>Guardar</button>
      </div>
    </div>
  </div>
  </div>";
}


?>