



<?php

function modalPagos()
{
    return "<div class='modal fade' id='modalTablaPagos' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-scrollable  modal-lg' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                <h5 class='modal-title' id='exampleModalLongTitle'>Comprobantes de pago <strong id='idClientePago'></strong></h5>
            </div>
            <div class='modal-body'>
                <table id='tablaPagos' width='100%' class='table table-bordered table-hover dt-resposive display nowrap'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Válido desde</th>
                            <th>Válido hasta</th>
                            <th>Plan contratado</th>
                            <th>Método de pago</th>
                            <th>Monto</th>
                            <th>Periodo actual</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
  </div>";
}

?>