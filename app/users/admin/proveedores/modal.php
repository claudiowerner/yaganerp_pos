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
            <form id='formRegistroProveedor'>
              <div class='modal-body'>
                <table id='productos2' class='table'>
                  <tr>
                    <td>
                      <label>R.U.T. Proveedor: </label>
                    </td>
                    <td>
                      <input type='text' id='txtRutProveedor' class='form-control' placeholder='xxxxxxxx-x' required>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label>Nombre: </label>
                    </td>
                    <td>
                      <input type='text' id='txtNombreProveedor' class='form-control' placeholder='xxxxxxxx-x' required>
                    </td>
                  </tr>
                </table>
              </div>
              <div class='modal-footer'>
                <label id='lblRutValido'></label>
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
              <h5 class='modal-title' id='tituloModalEditar'>Editar proveedor<strong id='idProv' style='display:none'></strong></h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <form id='formEditarProducto'>
              <div class='modal-body'>
                <table id='productos2' class='table'>
                  <tr>
                    <td>
                      <label>R.U.T. Proveedor: </label>
                    </td>
                    <td>
                      <input type='text' id='txtRutProveedorEditar' class='form-control' placeholder='xxxxxxxx-x' required>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label>Nombre: </label>
                    </td>
                    <td>
                      <input type='text' id='txtNombreProveedorEditar' class='form-control' placeholder='xxxxxxxx-x' required>
                    </td>
                  </tr>
                  <td margin=auto>
                    <div class=button>
                      <label name='swEstado'>Estado</label>
                    </div>
                  </td>
                  <td>
                    <div class=boton>                    
                      <input type='checkbox' id='swEstado'/>
                      <label for='swEstado' class='switch'></label>
                    </div>
                  </td>
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