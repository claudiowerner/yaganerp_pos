<?php

	function modalRegistro()
	{
		return "<div class='modal fade' id='modalRegistro' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLongTitle'>Agregando</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
              <form id='frmRegistro'>
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
                  <label name='nombrePiso'>Direccion</label>
                </td>
                <td>
                  <input type='text' name='direccion' id='direccion' class='form-control' required>
                </td>
              </tr>
              <tr>
                <td>
                  <label name='nombrePiso'>Plan comprado</label>
                </td>
                <td>
                  <input type='text' name='plan' id='plan' class='form-control' required>
                </td>
              </tr>
              <tr>
                <td>
                  <label name='nombrePiso'>Fecha de pago</label>
                </td>
                <td>
                  <input type='date' name='fechaPago' id='fechaPago' class='form-control' required>
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
                  <input type='text' name='nomFantasia' id='nomFantasia' class='form-control' required>
                </td>
              </tr>
              <td>
                  <label name='nombrePiso'>Razón social</label>
                </td>
                <td>
                  <input type='text' name='razonSocial' id='razonSocial' class='form-control' required>
                </td>
              </tr>
            </table>
              </form>
            <div>
              <label id='lblMsj'></label>
            </div>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
            <button type='submit' id='btnGuardar' class='btn btn-primary'>Guardar</button>
          </div>
        </div>
      </div>
      </div>";
	}

	function modalEditar()
	{
		return "<div class='modal fade' id='modalEditar' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLongTitle'>Editando cliente <strong id='idCliente'></strong></h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
              <form id='frmEditar'>
              <div align='center'>
              <h6>---Datos del cliente---</h6>
            </div>
            <table width='100%'>
              <tr>
                <td margin=auto>
                  <div class=button>
                    <label name='swEstadoCliente'>Estado del cliente</label>
                  </div>
                </td>
                <td>
                  <div class=boton>                    
                    <input type='checkbox' id='swEstadoCliente'/>
                    <label for='swEstadoCliente' class='switch'></label>
                  </div>
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
              <tr>
                <td>
                  <label name='nombrePiso'>Plan comprado</label>
                </td>
                <td>
                  <input type='text' name='planEditar' id='planEditar' class='form-control' required>
                </td>
              </tr>
              <tr>
                <td>
                  <label name='nombrePiso'>Fecha de pago</label>
                </td>
                <td>
                  <input type='date' name='fechaPagoEditar' id='fechaPagoEditar' class='form-control' required>
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
            </table>
              </form>
            <div>
              <label id='lblMsj'></label>
            </div>
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