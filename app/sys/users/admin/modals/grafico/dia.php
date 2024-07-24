<?php
	function modalDiaVenta()
	{
		echo "<div class='modal fade' id='modalDiaVenta' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id=''>Seleccione el día</h5>
            </div>
            <div class='modal-body'>
              <div id='diaVenta' class='modal-body' align='center'>
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
              <div>
                <label id='lblMsj'></label>
              </div>
            </div>
          </div>
        </div>
      </div>";
	}
?>