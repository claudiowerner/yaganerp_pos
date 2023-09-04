<?php
	function modal($id_modal,$id_titulo,$titulo,$contenido)
	{
		return "<div class='modal fade' id='$id_modal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='$id_titulo'>$titulo</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <form id='formRegistro'>
              <div class='modal-body'>
                <table id='$contenido' class='table'>
                  <tr>
                    <td><label name='nombreCat'>Nombre</label></td>
                    <td>
                      <input type='text' name='nomCat' id='nomCat' class='form-control'><label id='lblNombre'></label></td>
                      </tr>
                    <tr>
                    <td><label name='estadoCat'>Estado</label></td>
                    <td>
                      <select id='estadoCat' class='form-control'>
                        <option value='N'>---SELECCIONE---</option>
                        <option value='S'>Activado</option>
                        <option value='N'>Desactivado</option>
                      </select>
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
?>