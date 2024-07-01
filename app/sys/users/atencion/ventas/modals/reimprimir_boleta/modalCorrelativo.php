<?php

    echo "<!--modal Imprimir cuenta General-->
      <div class='modal fade' id='modalCorrelativo' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true' style='overflow-y: scroll;'>
        <div class='modal-dialog modal-dialog modal-lg' role='document' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5><strong>Seleccione el año de la boleta</strong></h5>
              
            </div>
            <div class='modal-body' align='center'>
              <table  class='table'>
                <th align='center'>Correlativo</th>
                <th align='center'>Valor</th>
                <th align='center'>Fecha</th>
                <th align='center'>Acción</th>
                <tbody id='cuerpoCorrelativo'>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>";

?>