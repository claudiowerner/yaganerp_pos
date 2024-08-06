<?php

function modalEditarCliente()
	{
		return "<div class='modal fade' id='modalEditar' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable ' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id='exampleModalLongTitle'>Editando cliente <strong id='idCliente'></strong></h5>
            </div>
            <div class='modal-body'>
              <form id='frmRegistro'>
                <div align='center'>
                  <h6>---Datos del cliente---</h6>
                </div>
                <table width='100%'>
                  <tr>
                    <td colspan=2>
                      <button id='btnCrearCredenciales' class='btn btn-primary'>Enviar credenciales</button>
                    </td>
                  </tr>
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
                <div align='center'>
                  <h6>--Datos de pago--</h6>
                </div>
                <table width='100%'>
                  <tr>
                    <td>
                      <label name='nombrePiso'>Plan comprado</label>
                    </td>
                    <td>
                      <select  name='slctPlanEditar' id='slctPlanEditar' class='form-control select2' style='width:100%'></select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label name='nombrePiso'>Paga desde</label>
                    </td>
                    <td>
                      <input type='date' name='fechaDesdeEditar' id='fechaDesdeEditar' class='form-control' required>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label name='nombrePiso'>Paga hasta</label>
                    </td>
                    <td>
                      <input type='date' name='fechaHastaEditar' id='fechaHastaEditar' class='form-control' required>
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
                  <td margin=auto>
                    <div class=button>
                      <label name='swEstadoPago'>Estado del pago</label>
                    </div>
                  </td>
                  <td>
                    <div class=boton>                    
                      <input type='checkbox' id='swEstadoPago'/>
                      <label for='swEstadoPago' class='switch'></label>
                    </div>
                  </td>
                </table>
              </form>
              <button class='btn btn-primary' id='btnVerComprobantes'>Ver comprobantes de pago</button>
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