<?php
  function modalRegistro()
  {
    return "<div class='modal fade' id='modalRegistro' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLongTitle'>Agregando</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <form id='formRegistroProducto'>
              <div class='modal-body'>
                <table id='productos2' class='table'>
                  <tr>
                    <td margin=auto>
                      <div class=button>
                        <label name='swPesaje'>¿Requiere pesaje?</label>
                      </div>
                    </td>
                    <td>
                      <div class=boton>                    
                        <input type='checkbox' id='swPesaje'/>
                        <label for='swPesaje' class='switch'></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><label name='nombreCat'>Proveedor</label></td>
                    <td>
                      <select name='slctProveedor' id='slctProveedor' class='form-control'></select>
                    </td>
                  </tr>
                  <tr id=codBarra>
                    <td><label name='codigoBarra'>Código de barra</label></td>
                    <td>
                      <input type='text' name='codigoBarra' id='codigoBarra' class='form-control' required>
                    </td>
                  </tr>
                  <tr>
                    <td><label name='nombreProd'>Nombre</label></td>
                    <td>
                      <input type='text' name='nomProd' id='nomProd' class='form-control' required>
                    </td>
                  </tr>
                  <tr>
                    <td><label name='cat'>Categoría</label></td>
                    <td>
                      <select class='form-control' id='listCat' required>
                      </select>
                      <strong id='errCategoria' style='color:red'></strong>
                    </td>
                  </tr>
                  <tr id=cantidad>
                    <td>
                      <label name='cant'>Cantidad</label>
                    </td>
                    <td>
                      <input type='number' name='cantidadProd' id='cantidadProd' class='form-control' required>
                    </td>
                  </tr>
                  <tr id='pesaje' style='display: none'>
                    <td><label id='lblUnidad'>Unidad:</label></td>
                    <td><select id='slctUnidad' class='form form-control'></select></td>
                  </tr>
                  <tr>
                    <td><label name='cat' id='lblValorNeto'>Valor neto</label></td>
                    <td>
                      <input type='number' name='cantidad' id='valorNeto' class='form-control' required></td>
                    </td>
                  </tr>
                  <tr>
                    <td><label name='cat' id='lblValorNeto'>Margen (%) de ganancia</label></td>
                    <td>
                      <input type='number' name='cantidad' id='margenGanancia' class='form-control' required disabled='true'></td>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label name='cat'>Monto de ganancia</label>
                    </td>
                    <td>
                      <input type='number' name='cantidad' id='montoGanancia' class='form-control' required>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label name='cat'>Valor venta</label>
                    </td>
                    <td>
                      <input type='number' name='cantidad' id='valorVenta' class='form-control' required>
                    </td>
                  </tr>
                </table>
                <div>
                  <label id='lblMsj'></label>
                </div>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                <button type='submit' id='btnGuardar' class='btn btn-primary'>Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>";
  }

  
?>