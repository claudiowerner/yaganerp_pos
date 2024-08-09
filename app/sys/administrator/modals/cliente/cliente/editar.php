<?php

function modalEditarCliente()
	{
		return "<div class='modal fade' id='modalEditar' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable modal-lg' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id='exampleModalLongTitle'>Editando cliente <strong id='idCliente'></strong></h5>
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
                          <input type='text' name='nomClienteEditar' id='nomClienteEditar' class='form-control' required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label name='nombrePiso'>Rut</label>
                        </td>
                        <td>
                          <input type='text' name='rutEditar' id='rutEditar' class='form-control' required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label name='nombrePiso'>Correo</label>
                        </td>
                        <td>
                          <input type='text' name='correoEditar' id='correoEditar' class='form-control' required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label name='nombrePiso'>Telefono</label>
                        </td>
                        <td>
                          <input type='number' name='telefonoEditar' id='telefonoEditar' class='form-control' required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label name='nombrePiso'>Direccion</label>
                        </td>
                        <td>
                          <input type='text' name='direccionEditar' id='direccionEditar' class='form-control' required>
                        </td>
                      </tr>
                      
                      <td margin=auto>
                        <div class=button>
                          <label name='swEstadoCliente'>Estado del pago</label>
                        </div>
                      </td>
                      <td>
                        <div class=boton>                    
                          <input type='checkbox' id='swEstadoCliente'/>
                          <label for='swEstadoCliente' class='switch'></label>
                        </div>
                      </td>
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
                          <input type='text' name='nomFantasiaEditar' id='nomFantasiaEditar' class='form-control' required>
                        </td>
                      </tr>
                      <td>
                          <label name='nombrePiso'>Razón social</label>
                        </td>
                        <td>
                          <input type='text' name='razonSocialEditar' id='razonSocialEditar' class='form-control' required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label name='nombrePiso'>Giro</label>
                        </td>
                        <td>
                          <select name='slctGirosEditar' id='slctGirosEditar' class='form-control select2'></select>
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
                          <select  name='slctPlanEditar' id='slctPlanEditar' class='form-control select2' onChange=calcularPagoEditar() style='width:100%'></select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label name='nombrePiso'>Plazo de pago</label>
                        </td>
                        <td>
                          <select id='slctPlazoPagoEditar' class='form-control' onChange=calcularPagoEditar()></select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label name='nombrePiso'>Método de pago</label>
                        </td>
                        <td>
                          <select id='tipoPagoEditar' class='form-control'></select>
                        </td>
                      </tr>
                    </table>
                    ----------
                    <table class='table'>
                      <tr><th colspan='2'>Resumen de pago</th></tr>
                      <tr>
                        <td><label>Meses seleccionados:</label></td>
                        <td id='mesesSeleccionadosEditar'>Esperando...</td>
                      </tr>
                      <tr>
                        <td><label>Valor del plan:</label></td>
                        <td id='valorPlanEditar'>Esperando...</td>
                      </tr>
                      <tr>
                        <td><label>Valor a pagar por periodo:</label></td>
                        <td id='valorTotalEditar'>Esperando...</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </form>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
              <button type='submit' id='btnModificar' class='btn btn-primary'>Guardar</button>
            </div>
          </div>
        </div>
      </div>";
	}


?>