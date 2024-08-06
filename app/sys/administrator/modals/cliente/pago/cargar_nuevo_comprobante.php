<?php



function modalCargarNuevoComprobante()
{
    return "<div class='modal fade' id='modalCargarNuevoComprobante' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog modal-lg' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
          <h5 class='modal-title' id='exampleModalLongTitle'>
            <strong>Cargar nuevo comprobante: </strong>
          </h5>
        </div>
        <div class='modal-body'>
          <div class='row'>
            <div class='col-lg-10'>
              <input type='file' id='archivos2' name='archivos2' accept='.jpg, .jpeg, .pdf' />
            </div>
            <div class='col-lg-2'>
              <button id='btnCargarArchivoNuevo' class='btn btn-success'>Cargar archivo</button>
            </div>
          </div>
          
          
        </div>
      </div>
    </div>
  </div>";
}
?>