<!--modalCambiarCantidad-->
      <div class='modal fade' id='cambiarCantidad' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Modificar cantidad venta ID 
                <!--Env�o de ID venta a PHP via JS--><span id='idVenta'></span>
                <!--Env�o de NOMBRE DEL PRODUCTO a PHP via JS--><label id='id_prod' style='display:  none'></label></h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center' id='modificarCantidad'>
              <button type='button' id='restarCantMod' class='btn btn-danger'>
                <img src='../../../img/restar.png' width='10'>
              </button>
              <strong id='cantProdMod'>1</strong>
              <button type='button' id='sumarCantMod' class='btn btn-success'>
                <img src='../../../img/sumar.png' width='10'>
              </button>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
              <button class='btn btn-success' id='btnActCantidad' data-dismiss='modal'>Actualizar</button>
            </div>
          </div>
        </div>
      </div>
      