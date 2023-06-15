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
              <table>
                <tr>
                  <td>
                    <label name='numMesa'>Número de mesa</label>
                  </td>
                  <td>
                    <strong id='numMesa'>Especifique la ubicación</strong>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='lblNomMesa'>Nombre</label>
                  </td>
                  <td>
                    <input type='text' name='nomMesa' id='nomMesa' class='form-control' required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Ubicación</label>
                  </td>
                  <td>
                    <select id='slctUbicacion' class='form-control' onChange=obtenerNumMesa(this.value)>
                    </select>
                  </td>
                </tr>
              </table>
            </tr>
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
              <h5 class='modal-title' id='exampleModalLongTitle'>Editando mesa ID <strong id='idMesa'>ID_MESA</strong></h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
              <table>
                <tr>
                  <td>
                    <label name='numMesa'>Número de mesa</label>
                  </td>
                  <td>
                    <input type='number' name='numMesaEditar' id='numMesaEditar' class='form-control' required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='lblNomMesa'>Nombre</label>
                  </td>
                  <td>
                    <input type='text' name='nomMesaEditar' id='nomMesaEditar' class='form-control' required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Ubicación</label>
                  </td>
                  <td>
                    <select id='slctUbicacionEditar' class='form-control'>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='estado'>Estado</label>
                  </td>
                  <td>
                    <input type='checkbox' id='swEditarMesa'/>
                    <label for='swEditarMesa' class='switch'></label>
                  </td>
                </tr>
              </table>
            </tr>
            <div>
              <label id='lblMsj'></label>
            </div>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
            <button type='submit' id='btnModificar' class='btn btn-primary'>Modificar</button>
          </div>
        </div>
      </div>
    </div>";
	}
?>