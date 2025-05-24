<!--modalDescuento-->
<div class='modal fade' id='modalDescuento' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='tipoVenta'>Confirmar descuento al total de la venta</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body' align='center'>
        Ingrese porcentaje de descuento
        <br>
        <table>
          <tr>
            <td><label name='clave'>(%) Descuento</label></td>
            <td>
              <input type='number' maxlenght='3' min='0' max='100' name='txtPorcDescuento' id='txtPorcDescuento' class='form-control'>
            </td>
          </tr>
        </table>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
        <button class='btn btn-success' id='btnConfirmarDescto'>Confirmar</button>
      </div>
    </div>
  </div>
</div>