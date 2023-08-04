<?php
	function modalRegistro()
	{
		return "<div class='modal fade' id='modalRegistro' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='titulo'>Agregando</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
              <div class='modal-body'>
                <table id='contenido'>
                  <tr>
                    <td><label name='proveedor'>Proveedor</label></td>
                    <td>
                      <select name='slctProveedor' id='slctProveedor' class='form form-control select2'>
                      </select>
                    </td>
                  </tr>
                </table>
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
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                <button type='submit' id='btnGuardar' class='btn btn-primary'>Guardar</button>
              </div>
          </div>
        </div>
      </div>";
	}

  function modalEditar()
  {
    return"<div class='modal fade' id='modalEditar' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title'>Editando <strong id='idModal'>ID</strong></h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
              <div class='modal-body'>
                <table id='contenido'>
                  <tr>
                    <td><label name='proveedor'>Proveedor</label></td>
                    <td>
                      <select name='slctProveedorEditar' id='slctProveedorEditar' class='form form-control select2'>
                      </select>
                    </td>
                  </tr>
                </table>
                <div>
                  <button id='btnAgregarProductoEditar' class='btn btn-success'>+</button>
                </div>
                <br>
                <table id='tblPedidos' class='table'>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Valor</th>
                    <th>Acción</th>
                  </tr>
                  <tbody id='bodyPedidosEditar'>
                    
                  </tbody>
                </table>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                <button type='button' id='btnGuardarCambios' class='btn btn-primary'>Guardar</button>
              </div>
          </div>
        </div>
      </div>";
  }
?>