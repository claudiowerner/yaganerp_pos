<?php

echo "<div class='modal fade' id='modalConvenio' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
	<div class='modal-dialog' role='document'>
	  <div class='modal-content'>
		<div class='modal-header'>
		  <h5 class='modal-title' id='tipoVenta'>Tipo de venta MESA <label id=nMesa>Cargando...</label><label id=nommesa></label></h5>
		  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
		  </button>
		</div>
		<div class='modal-body'>
		  <button type='button' id='ventaNormal' class='btn btn-secondary' style='width: 464px; height: 50px;'>Venta normal</button>
		  <button type='submit' id='btnVentaConvenio' class='btn btn-primary' style='width: 464px; height: 50px;'>Venta convenio</button>
		</div>
	  </div>
	</div>
  </div>";

?>