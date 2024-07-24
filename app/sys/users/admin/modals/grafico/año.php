<?php
	function modalAñoVenta()
	{
		echo "<div class='modal fade' id='modalAñoVenta' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id=''>Seleccione el año que desea graficar</h5>
            </div>
            
            <div class='modal-body'>
              <div id='añoVenta' class='modal-body' align='center'>
            
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