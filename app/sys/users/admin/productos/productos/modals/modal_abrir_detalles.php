<?php
  function modalAbrirDetalles()
  {
    return "<div class='modal fade' id='modalAbrirDetalles' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id='exampleModalLongTitle'>Detalles de producto: <strong id='detalleNombreProd'></strong></h5>
              
            </div>
              <div class='modal-body'>
                <table class='table'>
                  <tr>
                    <th width='50%'>Item</th>
                    <th width='50%'>Valor</th>
                  </tr>
                  <tr align='left'>
                    <td><label>Código de barra:</label></td>
                    <td id='tdCodigoBarraProducto'></td>
                  </tr>
                  <tr align='left'>
                    <td><label>Nombre:</label></td>
                    <td id='tdNombreProducto'></td>
                  </tr>
                  <tr align='left'>
                    <td><label>Requiere pesaje:</label></td>
                    <td id='tdPesaje'></td>
                  </tr>
                  <tr align='left'>
                    <td><label>Proveedor:</label></td>
                    <td id='tdNombreProveedor'></td>
                  </tr>
                  <tr align='left'>
                    <td><label>Categoria:</label></td>
                    <td id='tdNombreCategoria'></td>
                  </tr>
                  <tr align='left'>
                    <td><label>Cantidad:</label></td>
                    <td id='tdCantidadProducto'></td>
                  </tr>
                  <tr align='left'>
                    <td><label>Valor neto:</label></td>
                    <td id='tdValorNeto'></td>
                  </tr>
                  <tr align='left'>
                    <td><label>Margen de ganancia:</label></td>
                    <td id='tdMargenGanancia'></td>
                  </tr>
                  <tr align='left'>
                    <td><label>Monto ganancia:</label></td>
                    <td id='tdMontoGanancia'></td>
                  </tr>
                  <tr align='left'>
                    <td><label>Valor venta:</label></td>
                    <td id='tdValorVenta'></td>
                  </tr>
                  <tr align='left'>
                    <td><label>Descuento:</label></td>
                    <td id='tdDescuento'></td>
                  </tr>
                  <tr align='left'>
                    <td><label>Creado por:</label></td>
                    <td id='tdCreadoPor'></td>
                  </tr>
                  <tr align='left'>
                    <td><label>Fecha de creación:</label></td>
                    <td id='tdFecha'></td>
                  </tr>
                </table>
              </div>
              
          </div>
        </div>
      </div>";
  }

  
?>