<?php

	function modalRegistroCliente()
	{
		return "<div class='modal fade' id='modalRegistro' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable ' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id='exampleModalLongTitle'>Agregando</h5>
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




  function modalComprobantesPago()
	{
		return "<div class='modal fade' id='modalComprobantesPago' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable  modal-lg' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id='exampleModalLongTitle'>Comprobantes de pago <strong id='idCliente'></strong></h5>
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
              </form>
              <h6>---Tabla de comprobantes---</h6>
                <table class='table'>
                  <th>ID</th>
                  <th>Nombre archivo</th>
                  <th>Fecha de carga</th>
                  <tbody id='bodyComprobantes'>
                  </tbody>
                </table>
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


  
  function modalComprobanteSeleccionado()
	{
		return "<div class='modal fade' id='modalComprobanteSeleccionado' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable modal-lg' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id='exampleModalLongTitle'>
                <span id='idClienteInfo' style='display: none'></span>
                Detalles de <strong id='tituloCliente'></strong>
              </h5>
              <span id='idComprobante' style='display: none'></span>
            </div>
            <div class='modal-body'>
              <span id='url' style='display: none'></span>
              <button id='cambiarComprobante' class='btn btn-primary' ><i class='fa fa-edit' aria-hidden='true'></i>Cambiar archivo</i></button>
              <div id='archivoComprobante'>
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
  
  function modalCargarNuevoComprobante()
	{
		return "<div class='modal fade' id='modalCargarNuevoComprobante' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-lg' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id='exampleModalLongTitle'>
                <strong>Cargar nuevo comprobante: </strong>
              </h5>
            </div>
            <div class='modal-body'>
              <div class='row'>
                <div class='col-lg-10'>
                  <input type='file' id='archivos2' name='archivos2' accept='.jpg, .jpeg, .pdf' />
                </div>
                <div class='col-lg-2'>
                  <button id='btnCargarArchivoNuevo' class='btn btn-success'>Cargar archivo</button>
                </div>
              </div>
              
              
            </div>
          </div>
        </div>
      </div>";
	}




  function modalInfoClientes()
	{
		return "<div class='modal fade' id='modalInfoClientes' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable  modal-lg' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id='exampleModalLongTitle'>
                <span id='idClienteInfo' style='display: none'></span>
                Detalles de <strong id='tituloCliente'></strong>
              </h5>
            </div>
            <div class='modal-body'>
              <div class='row'>
                <div class='col-lg-6'>
                  <table class='table'>
                    <tr>
                      <th colspan='2'>Datos del cliente</th>
                    </tr>
                    <tr>
                      <td><label>Nombre:</label></td>
                      <td><span id='nombreInfoCliente'></span></td>
                    </tr>
                    <tr>
                      <td><label>Rut:</label></td>
                      <td><span id='rutInfoCliente'></span></td>
                    </tr>
                    <tr>
                      <td><label>Correo:</label></td>
                      <td><span id='correoInfoCliente'></span></td>
                    </tr>
                    <tr>
                      <td><label>Teléfono:</label></td>
                      <td><span id='telefonoInfoCliente'></span></td>
                    </tr>
                    <tr>
                      <td><label>Dirección:</label></td>
                      <td><span id='direccionInfoCliente'></span></td>
                    </tr>
                    <tr>
                      <td><label>Estado:</label></td>
                      <td><span id='estadoInfoCliente'></span></td>
                    </tr>
                    <tr>
                      <td><label>Estado pago:</label></td>
                      <td><span id='estado_pagoInfoCliente'></span></td>
                    </tr>
                  </table>
                </div>
                <div class='col-lg-6'>
                  <table class='table'>
                    <tr>
                      <th colspan=2>Datos de la empresa</th>
                    </tr>
                    <tr>
                      <td><label>Nombre de fantasía:</label></td>
                      <td><span id='nom_fantasiaInfoCliente'></span></td>
                    </tr>
                    <tr>
                      <td><label>Razón social:</label></td>
                      <td><span id='razon_socialInfoCliente'></span></td>
                    </tr>
                    <tr>
                      <td><label>Giro:</label></td>
                      <td><span id='giroInfoCliente'></span></td>
                    </tr>
                    <tr>
                      <td><label>Plan comprado:</label></td>
                      <td><span id='plan_compradoInfoCliente'></span></td>
                    </tr>
                    <tr>
                      <td><label>Fecha registro:</label></td>
                      <td><span id='fechaRegistroInfoCliente'></span></td>
                    </tr>
                    <tr>
                      <td><label>Paga desde:</label></td>
                      <td><span id='fecha_desdeInfoCliente'></span></td>
                    </tr>
                    <tr>
                      <td><label>Paga hasta:</label></td>
                      <td><span id='fecha_hastaInfoCliente'></span></td>
                    </tr>
                  </table>
                </div>
              </div>
              
              
              <button id='btnAbrirEdicion' class='btn btn-primary' >Editar</button>
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
		return "<div class='modal fade' id='modalRegistrarPlan' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable ' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id='exampleModalLongTitle'>Agregando</h5>
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
		return "<div class='modal fade' id='modalEditarPlan' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-scrollable ' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
        <h5 class='modal-title' id='exampleModalLongTitle'>Editando plan <strong id='idPlan'></strong></h5>
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