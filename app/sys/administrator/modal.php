<?php

	function modalRegistroCliente()
	{
		return "<div class='modal fade' id='modalRegistro' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
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
                <div align='center'>
                  <h6>--Datos de pago--</h6>
                </div>
                <table width='100%'>
                  <tr>
                    <td>
                      <label name='nombrePiso'>Plan comprado</label>
                    </td>
                    <td>
                      <select  name='slctPlan' id='slctPlan' class='form-control select2' style='width:100%'></select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label name='nombrePiso'>Paga desde</label>
                    </td>
                    <td>
                      <input type='date' name='fechaDesde' id='fechaDesde' class='form-control' required>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label name='nombrePiso'>Paga hasta</label>
                    </td>
                    <td>
                      <input type='date' name='fechaHasta' id='fechaHasta' class='form-control' required>
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

	function modalEditarCliente()
	{
		return "<div class='modal fade' id='modalEditar' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLongTitle'>Editando cliente <strong id='idCliente'></strong></h5>
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




  function modalComprobantesPago()
	{
		return "<div class='modal fade' id='modalComprobantesPago' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-lg' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLongTitle'>Comprobantes de pago <strong id='idCliente'></strong></h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
              <form action='' id='subirArchivo' method='post'>
                <table width='100%'>
                  <tr>
                    <td><label>Cargar archivo: </label></td>
                    <td><input type='file' id='archivo' class='form form-control'accept='.jpg, .jpeg, .pdf'></td>
                    <td><button id='btnCargarArchivo' class='btn btn-success'>Cargar archivo</button></td>
                  </tr>
                </table>
                <h6>---Tabla de comprobantes---</h6>
                <table class='table'>
                  <th>
                    <td>ID</td>
                    <td>Nombre archivo</td>
                    <td>Fecha de carga</td>
                  </th>
                  <tbody id='bodyComprobantes'>
                  </tbody>
                </table>
              </form>
              <button class='btn btn-primary' id='btnVolver'><- Volver</button>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
              <button type='submit' id='btnModificar' class='btn btn-primary'>Guardar</button>
            </div>
          </div>
        </div>
      </div>";
	}



  function modalRegistrarPlan()
	{
		return "<div class='modal fade' id='modalRegistrarPlan' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLongTitle'>Agregando</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <table width='100%'>
              <tr>
                <td>
                  <label name='nombrePiso'>Nombre</label>
                </td>
                <td>
                  <input type='text' name='nomPlan' id='nomPlan' class='form-control' required>
                </td>
              </tr>
              <tr>
                <td>
                  <label name='nombrePiso'>Número de usuarios</label>
                </td>
                <td>
                  <input type='text' name='numUsuarios' id='numUsuarios' class='form-control' required>
                </td>
              </tr>
              <tr>
                <td>
                  <label name='nombrePiso'>Número de cajas</label>
                </td>
                <td>
                  <input type='text' name='numCajas' id='numCajas' class='form-control' required>
                </td>
              </tr>
              <tr>
                <td>
                  <label name='nombrePiso'>Valor</label>
                </td>
                <td>
                  <input type='number' name='valorPlan' id='valorPlan' class='form-control' required>
                </td>
              </tr>
            </table>
          </form>
          <div>
            <label id='lblMsj'></label>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
            <button type='submit' id='btnGuardarPlan' class='btn btn-primary'>Guardar</button>
          </div>
        </div>
      </div>
    </div>";
	}

	function modalEditarPlan()
	{
		return "<div class='modal fade' id='modalEditarPlan' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLongTitle'>Editando plan <strong id='idPlan'></strong></h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <table width='100%'>
      <tr>
        <td margin=auto>
          <div class=button>
            <label name='swEstadoPlan'>Estado del cliente</label>
          </div>
        </td>
        <td>
          <div class=boton>                    
            <input type='checkbox' id='swEstadoPlan'/>
            <label for='swEstadoPlan' class='switch'></label>
          </div>
        </td>
      </tr>
        <tr>
          <td>
            <label name='nombrePiso'>Nombre</label>
          </td>
          <td>
            <input type='text' name='nomPlanEditar' id='nomPlanEditar' class='form-control' required>
          </td>
        </tr>
        <tr>
          <td>
            <label name='nombrePiso'>Número de usuarios</label>
          </td>
          <td>
            <input type='text' name='numUsuariosEditar' id='numUsuariosEditar' class='form-control' required>
          </td>
        </tr>
        <tr>
          <td>
            <label name='nombrePiso'>Número de cajas</label>
          </td>
          <td>
            <input type='text' name='numCajasEditar' id='numCajasEditar' class='form-control' required>
          </td>
        </tr>
        <tr>
          <td>
            <label name='nombrePiso'>Valor</label>
          </td>
          <td>
            <input type='number' name='valorPlanEditar' id='valorPlanEditar' class='form-control' required>
          </td>
        </tr>
      </table>
    </form>
    <div class='modal-footer'>
      <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
      <button type='submit' id='btnModificarPlan' class='btn btn-primary'>Guardar</button>
    </div>
  </div>
</div>
      </div>";
	}
?>