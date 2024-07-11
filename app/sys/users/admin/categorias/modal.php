<?php
	function modalRegistro()
	{
		return "<div class='modal fade' id='modalRegistro' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='titulo'>Agregando</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
              <div class='modal-body'>
                <table id='contenido'>
                  <tr>
                    <td><label name='nombreCat'>Nombre</label></td>
                    <td>
                      <input type='text' name='nomCat' id='nomCat' class='form-control'><label id='lblNombre'></label></td>
                      </tr>
                    <tr>
                  </tr>
                </table>
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
    return"<div class='modal fade' id='modalEditar' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title'>Editando <strong id='idModal'>ID</strong></h5>
            </div>
            <form id='formRegistro'>
              <div class='modal-body'>
                <table id='contenido'>
                  <tr>
                    <td>
                      <label name='nombreCat'>Nombre</label>
                    </td>
                    <td>
                      <input type='text' name='nomCat' id='nomCatEditar' class='form-control'><label id='lblNombre'></label>
                    </td>
                  </tr>
                </table>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                <button type='button' id='btnGuardarCambios' class='btn btn-primary'>Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>";
  }
?>