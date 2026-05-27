<div class='modal fade' id='modalRegistro' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
	<div class='modal-dialog' role='document'>
		<div class='modal-content'>
            <div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</button>
				<h5 class='modal-title' id='titulo'><strong id='nombrePedido'>Nuevo pedido sin nombre</strong><strong id='idPedido' style='display: none'>cargando</strong></h5>
			</div>
            <div class='modal-body'>
				<table width=100%>
					<tr>
						<td><label>Nombre del pedido:</label></td>
						<td><input type=text id='txtNombrePedido' class='form-control' onkeyup="editarNombrePedido('')" value='Pedido sin nombre'></td>
					</tr>
				</table>
				<table id='contenido'>
					<tr>
						<td><label name='proveedor'>Proveedor</label></td>
						<td><select name='slctProveedor' id='slctProveedor' class='form form-control select2' onchange='editarProveedor()'></select></td>
						<td>
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
				<hr>
				<strong>Total pedido:</strong>
				<span id="totalPedido">Esperando...</span>
				<hr>
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
</div>