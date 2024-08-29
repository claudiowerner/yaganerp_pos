<?php

function modalEditarCliente()
	{
		return "<div class='modal fade' id='modalEditar' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id='exampleModalLongTitle'><strong id='tituloClienteEditar'></strong><strong id='idCliente' style='display: none'></strong></h5>
            </div>
            <div class='modal-body'>
              <form id='frmRegistro'>
                <div class='row'>
                  <div class='col-lg-12'>
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