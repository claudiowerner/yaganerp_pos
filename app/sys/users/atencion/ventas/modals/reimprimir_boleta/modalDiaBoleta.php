<?php

    echo "<!--modal Imprimir cuenta General-->
      <div class='modal fade' id='modalDiaBoleta' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-xl' role='document' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5><strong>Seleccione el día de la boleta</strong></h5>
              
            </div>
            <div id='diaBoleta' class='modal-body' align='center'>
              <table class='table'>
                <th>Lun</th>
                <th>Mar</th>
                <th>Mie</th>
                <th>Jue</th>
                <th>Vie</th>
                <th>Sab</th>
                <th>Dom</th>

                <tbody id='calendario'>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>";

?>