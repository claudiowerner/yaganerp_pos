

<?php

function modalEditarPeriodoComprobante()
{
    return "<div class='modal fade' id='modalEditarPeriodo' overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-scrollable modal-lg' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
          <h5 class='modal-title' id='exampleModalLongTitle'><strong>Editar periodo de pago del comprobante</strong> <strong id='idPagoEditarComprobante'>ID</strong></h5>
        </div>
        <div class='modal-body'>
          <form action='' id='subirArchivo' method='post'>
            <table width='100%'>
              <tr>
                <td width='20%'><label>Periodo: </label></td>
                <td width='80%'><select id='slctPeriodoComprobanteEditar' class='form-control'></select></td>
              </tr>
            </table>
          </form>
        </div>
        <div class='modal-footer'>
          <button id='btnEditarPeriodo' class='btn btn-success'>Guardar</button>
        </div>
      </div>
    </div>
  </div>";
}

?>