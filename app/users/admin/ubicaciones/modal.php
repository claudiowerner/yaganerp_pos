<?php
	
	function modalRegistro()
	{
		return"<div class='modal fade' id='modalRegistro' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
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
                    <label name='nombreUbicacion'>Nombre</label>
                  </td>
                  <td>
                    <input type='text' name='nomUbicacion' id='nomUbicacion' class='form-control' required>
                    <strong id='errNomUbic' style='color: red'></strong>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='piso'>Piso</label>
                  </td>
                  <td>
                    <select id='slctPiso' class='form-control'>
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
              <h5 class='modal-title' id='exampleModalLongTitle'>Editando id <strong id='idUbic'></strong></h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
              <table>
                <tr>
                  <td>
                    <label name='nombreUbicacion'>Nombre</label>
                  </td>
                  <td>
                    <input type='text' name='nomUbicacionEditar' id='nomUbicacionEditar' class='form-control' required>
                    <strong id='errNomUbicEditar' style='color: red'></strong>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='piso'>Piso</label>
                  </td>
                  <td>
                    <select id='slctPisoEditar' class='form-control'>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label name='estado'>Estado</label>
                  </td>
                  <td>
                    <input type='checkbox' id='swEditarUbicacion'/>
                    <label for='swEditarUbicacion' class='switch'></label>
                  </td>
                </tr>
              </table>
            </tr>
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