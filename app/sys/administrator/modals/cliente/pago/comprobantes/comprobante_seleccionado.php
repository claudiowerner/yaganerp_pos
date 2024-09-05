<?php

function modalComprobanteSeleccionado()
	{
		return "<div class='modal fade' id='modalComprobanteSeleccionado' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable modal-lg' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id='exampleModalLongTitle'>
                <span id='idClienteInfo' style='display: none'></span>
                <strong>Comprobante</strong>
                <strong id='tituloCliente'></strong>
              </h5>
              <span id='idComprobante' style='display: none'></span>
            </div>
            <div class='modal-body'>
              <span id='url' style='display: none'></span>
              <button id='cambiarComprobante' class='btn btn-primary' ><i class='fa fa-edit' aria-hidden='true'></i>Cambiar archivo</i></button>
              <div id='archivoComprobante'>
              </div>
            </div>
          </div>
        </div>
      </div>";
	}
  

?>