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
            <form id='formRegistroCliente'>
              <div class='modal-body'>
                <table id='productos2' class='table'>
                  <tr>
                    <td>
                      <label>Rut del cliente</label>
                    </td>
                    <td>
                      <input type='text' id='txtRutClte' class='form form-control' placeholder='12345678-0'/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label>Nombre</label>
                    </td>
                    <td>
                      <input type='text' id='txtNombreClte' class='form form-control'/>
                    </td>
                  </tr>
                  <tr>
                  <td>
                      <label>Apellido</label>
                    </td>
                    <td>
                      <input type='text' id='txtApellido' class='form form-control'/>
                    </td>
                  </tr>
                </table>
                <div>
                  <label id='lblMsj'></label>
                </div>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                <button type='submit' id='btnGuardar' class='btn btn-primary'>Guardar</button>
              </div>
            </form>
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
              <h5 class='modal-title' id='tituloModalEditar'></h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <form id='formEditarProducto'>
              <div class='modal-body'>
                <table id='productos2' class='table'>
                  <tr>
                    <td margin=auto>
                      <div class=button>
                        <label name='swPesajeEditar'>¿Requiere pesaje?</label>
                      </div>
                    </td>
                    <td>
                      <div class=boton>                    
                        <input type='checkbox' id='swPesajeEditar'/>
                        <label for='swPesajeEditar' class='switch'></label>
                      </div>
                    </td>
                  </tr>
                  <tr id=codBarraEditar>
                    <td><label name='nombreCat'>Código de barra</label></td>
                    <td>
                      <input type='text' id='codBarraEditar' name='nomProdEditar' class='form-control' required></td>
                    </tr>
                  <tr>
                    <td><label name='nombreCat'>Nombre</label></td>
                    <td>
                      <input type='text' id='nomProdEditar' name='nomProdEditar' class='form-control' required></td>
                    </tr>
                    <tr>
                      <td><label name='cat'>Categoría</label></td>
                    <td>
                      <select class='form-control' id='listCatEditar' required>
                      </select>
                    </td>
                  </tr>
                  <tr id=cantidadEditar>
                    <td><label name='cant'>Cantidad</label></td>
                    <td>
                      <input type='number' name='cantidad' id='cantidadEditar' class='form-control' required>
                    </td>
                  </tr>
                  <tr id='pesajeEditar'>
                    <td><label id='lblUnidad'>Unidad</label></td>
                    <td><select id='slctUnidadEditar' class='form form-control'></select></td>
                  </tr>
                  <tr>
                    <td><label name='cat'>Valor neto</label></td>
                    <td>
                      <input type='number' name='cantidad' id='valorNetoEditar' class='form-control' required></td>
                    </td>
                  </tr>
                  <tr>
                    <td><label name='valVenta'>Valor venta</label></td>
                    <td>
                      <input type='number' name='cantidad' id='valorVentaEditar' class='form-control' required></td>
                    </td>
                  </tr>
                  <tr>
                    <td><label name='cat'>Estado</label></td>
                    <td>
                      <input type='checkbox' id='swEditarProducto'/>
                      <label for='swEditarProducto' class='switch'></label>
                    </td>
                  </tr>
                </tr>
                </table>
                <div>
                  <label id='lblMsj'></label>
                </div>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                <button type='submit' id='btnGuardar' class='btn btn-primary'>Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>";
  }
?>