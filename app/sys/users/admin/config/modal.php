<?php
  //modal crear clave
  echo '<div class="modal fade" id="crearClave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tipoVenta">Crear clave de autorizaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
        <form id="formClave">
          <table>
            <tr>
              <td>
                <label name="clave">Estado</label>
              </td>
              <td>
                <div class="boton">                    
                  <input type="checkbox" id="swEstadoClave">
                  <label for="swEstadoClave" class="switch"></label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label name="clave">Ingrese la clave</label>
              </td>
              <td>
                <input type="password" name="claveAut" id="claveAut" class="form-control" placeholder="Ingrese la clave">
              </td>
            </tr>
            <tr>
              <td>
                <label name="clave">Repita la clave</label>
              </td>
              <td>
                <input type="password" name="claveAut" id="repClaveAut" class="form-control" placeholder="Repita la clave">
                <label id="msj"></label>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-success" id="btnCrearClave">Guardar</button>
      </div>
    </div>
  </div>
</div>';


  //modal config de info de las cuentas

  echo '<div class="modal fade" id="modalConfCuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tipoVenta">Configurar información de las cuentas de ventas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
      <table width="100%">
          <tr>
              <td align=right><label for="">Nombre de fantasía</label></td>
              <td align=left>
                  <input type="text" name="nombreFantasia" id="txtNombreFantasia" class="form-control" placeholder="Cargando...">
                  <strong id="errorNomFantasia" style="color:red"></strong>
              </td>
          </tr>
          <tr>
              <td align=right><label for="">Razón social</label></td>
              <td align=left>
                  <input type="text" name="txtRazonSocial" id="txtRazonSocial" class="form-control" placeholder="Cargando...">
                  <strong id="errorRazonSocial" style="color:red"></strong>
              </td>
          </tr>
          <tr>
              <td align=right><label for="">Dirección</label></td>
              <td align=left>
                  <input type="text" name="txtDireccion" id="txtDireccion" class="form-control" placeholder="Cargando...">
                  <strong id="errorDireccion" style="color:red"></strong>
              </td>
          </tr>
          <tr>
              <td align=right><label for="">Correo</label></td>
              <td align=left>
                  <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" placeholder="Cargando...">
                  <strong id="errorCorreo" style="color:red"></strong>
              </td>
          </tr>
          <tr>
              <td align=right><label for="">Teléfono</label></td>
              <td align=left>
                  <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" placeholder="Cargando...">
                  <strong id="errorTelefono" style="color:red"></strong>
              </td>
          </tr>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="btnGuardarCambiosCuenta" class="btn-success btn">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>';


//modal config de info del stock de productos

echo '<div class="modal fade" id="modalConfProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="tipoVenta">Configuración de stock de productos</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" align="center">
    <table width="100%">
      <tr>
        <td align=right><label for="">Trabajar con stock de productos</label></td>
        <td align=left>
          <div class=boton>                    
            <input type="checkbox" id="swStockProductos"/>
            <label for="swStockProductos" class="switch"></label>
          </div>
        </td>
      </tr>
      <tr>
        <td align=right><label for="">Stock mínimo</label></td>
          <td align=left>
            <input type="number" name="txtNumMinimoStock" id="txtNumMinimoStock" class="form-control" placeholder="Cargando...">
          </td>
        </tr>
      </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      <button id="btnGuardarStock" class="btn btn-success">Guardar</button>
    </div>
  </div>
</div>
</div>';


//modal config de info del stock de productos

echo '
<div class="modal fade" id="modalConfConvenio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tipoVenta">Configuración de convenios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body" align="center">
      <table width="100%">
        <tr>
          <td align=right><label for="">Estado</label></td>
            <td align=left>
              <div class=boton>                    
                <input type="checkbox" id="swConvenio"/>
                <label for="swConvenio" class="switch"></label>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="btnGuardarConvenio" class="btn btn-success">Guardar</button>
      </div>
    </div>
  </div>
</div>';


?>

