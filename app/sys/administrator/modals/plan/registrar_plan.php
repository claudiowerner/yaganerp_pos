

<?php 

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


?>