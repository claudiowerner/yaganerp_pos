<?php

function modalEditarPlan()
	{
		return "<div class='modal fade' id='modalEditarPlan' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable ' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id='exampleModalLongTitle'>Editando plan <strong id='idPlanEditar'></strong></h5>
            </div>
            <table width='100%'>
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