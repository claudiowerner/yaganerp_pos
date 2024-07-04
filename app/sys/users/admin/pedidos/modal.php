<?php
	function modalRegistro()
	{
		return "<div class='modal fade' id='modalRegistro' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title' id='titulo'>Pedido <strong id='idPedido'>cargando</strong></h5>
            </div>
            <div class='modal-body'>
              <table>
                <tr>
                  <td><label>Nombre del pedido:</label></td>
                  <td><input type=text id='txtNombrePedido' class='form-control' onkeyup='editarNombrePedido'></td>
                </tr>
              </table>
              <table id='contenido'>
                <tr>
                  <td><label name='proveedor'>Proveedor</label></td>
                  <td>
                    <select name='slctProveedor' id='slctProveedor' class='form form-control select2' onchange='editarProveedor()'>
                    </select>
                  </td>
                  <td >
                    <div class=button align='right'>
                      <label name='swEstadoPagoRegistrar' align='center'>Estado del pago:</label>
                    </div>
                  </td>
                  <td>
                    <div class=boton>                    
                      <input type='checkbox' id='swEstadoPagoRegistrar'/>
                      <label id='lblFacturaConIva' for='swEstadoPagoRegistrar' style='color:white' class='switch'></label>
                    </div>
                  </td>
                  <td>
                    <div class=button align='right'>
                      <label name='swFacturaConIvaRegistrar' align='center'>Factura con IVA</label>
                    </div>
                  </td>
                  <td>
                    <div class=boton>                    
                      <input type='checkbox' id='swFacturaConIvaRegistrar'/>
                      <label id='lblFacturaConIva' for='swFacturaConIvaRegistrar' style='color:white' class='switch'></label>
                    </div>
                  </td>
                </tr>
              </table>
              <div>
                Nota: los cambios en el pedido se almacenan automáticamente
              </div>
              <div>
                <button id='btnAgregarProducto' class='btn btn-success'>+</button>
              </div>
              <br>
              <table id='tblPedidos' class='table'>
                <tr>
                  <th>ID</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Valor</th>
                  <th>Acción</th>
                </tr>
                <tbody id='bodyPedidos'>              
                </tbody>
              </table>
              <div>
                <button id='btnAgregarProducto2' class='btn btn-success'>+</button>
              </div>
            </div>
            <div class='modal-footer'>
              <button id='btnFinalizarPedido' class='btn btn-primary'>Finalizar pedido</button>
            </div>
        </div>
      </div>
    </div>";
	}

  function modalEditar()
  {
    return"<div class='modal fade' id='modalEditar' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-lg' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5 class='modal-title'>Editando pedido <strong id='idModal'>ID</strong></h5>
            </div>
              <div class='modal-body'>
                <table id='contenido' width='100%'>
                  <tr align='right'>
                    <td><label name='proveedor'>Proveedor</label></td>
                    <td>
                      <select name='slctProveedorEditar' id='slctProveedorEditar' class='form form-control select2' onChange='editarProveedorEditar()'>
                      </select>
                    </td>
                    <td >
                      <div class=button align='right'>
                        <label name='swEstadoPedido' align='center'>Estado del pedido:</label>
                      </div>
                    </td>
                    <td>
                      <div class=boton>                    
                        <input type='checkbox' id='swEstadoPedido'/>
                        <label id='lblEstadoPedido' for='swEstadoPedido' style='color:white' class='switch'></label>
                      </div>
                    </td>
                    <td >
                      <div class=button align='right'>
                        <label name='swEstadoPedido' align='center'>Estado del pago:</label>
                      </div>
                    </td>
                    <td>
                      <div class=boton>                    
                        <input type='checkbox' id='swEstadoPago'/>
                        <label id='lblEstadoPago' for='swEstadoPago' style='color:white' class='switch'></label>
                      </div>
                    </td>
                  
                    <td >
                      <div class=button align='right'>
                        <label name='swFacturaConIva' align='center'>Factura con IVA</label>
                      </div>
                    </td>
                    <td>
                      <div class=boton>                    
                        <input type='checkbox' id='swFacturaConIva'/>
                        <label id='lblFacturaConIva' for='swFacturaConIva' style='color:white' class='switch'></label>
                      </div>
                    </td>
                  </tr>
                </table>
                <div>
                  <button id='btnAgregarProductoEditar' class='btn btn-success'>+</button>
                </div>
                <br>
                <table id='tblPedidos' class='table'>
                  <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Valor</th>
                    <th>Acción</th>
                  </tr>
                  <tbody id='bodyPedidosEditar'>
                  </tbody>
                </table>
                <br>
                <div>
                  <button id='btnAgregarProductoEditar2' class='btn btn-success'>+</button>
                </div>
              </div>
              <div class='modal-footer'>
                <table width='100%' align='center' class='table'>
                  <tr>
                    <td width='50%'><label>Productos solicitados</label></td>
                    <td align='left' id='prodSolic'>0</td>
                  </tr>
                  <tr>
                    <td width='50%'><label>Valor del pedido: </label></td>
                    <td align='left'><strong></strong><strong id='valorPedidoFormateado'></strong></td>
                  </tr>
                  <tr>
                    <td width='50%'><label>IVA resultante (19%): </label></td>
                    <td align='left'><strong></strong><strong id='valorIvaFormateado'></strong></td>
                  </tr>
                  <tr>
                    <td width='50%'><label>Total del pedido</label></td>
                    <td align='left'><strong></strong><strong id='totalPedidoFormateado'></strong></td>
                  </tr>
                </table>
              </div>
              <div class='modal-footer'>
                <button id='btnFinalizarPedidoEditar' class='btn btn-primary'>Finalizar edición</button>
              </div>
            </div>
          </div>
        </div>";
  }
?>