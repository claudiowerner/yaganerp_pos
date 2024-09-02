

<?php

function modalComprobantesPago()
{
    return "<div class='modal fade' id='modalComprobantesPago' overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
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
                <td><label>Periodo: </label></td>
                <td><select id='slctPeriodoComprobante' class='form-control'></select></td>
                <td><label>Cargar archivo: </label></td>
                <td><input type='file' id='archivo' class='form form-control'accept='.jpg, .jpeg, .pdf'></td>
                <td><button id='btnCargarArchivo' class='btn btn-success'>Cargar archivo</button></td>
              </tr>
            </table>
          </form>
          <h6>---Tabla de comprobantes---</h6>
            <table id=tablaComprobantes width='100%' class='table table-bordered table-hover dt-resposive display nowrap'>
              <thead>
                <th>ID</th>
                <th>Periodo</th>
                <th>Nombre archivo</th>
                <th>Fecha de carga</th>
              </thead>
            </table>
        </div>
      </div>
    </div>
  </div>";
}

?>