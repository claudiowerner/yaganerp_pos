<div class="modal fade" id="modalConfCuenta" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
              <td align=right><label for="">Giro</label></td>
              <td align=left>
                  <select id="slctGiros" class="form form-control">sss</select>
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
</div>