<div class="modal fade" id="crearClave" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="tipoVenta">Crear clave de autorizaciones</h5>
      </div>
      <div class="modal-body" align="center">
      Nota: indique la clave solamente si desea actualizarla. De lo contrario, deje el espacio en blanco.
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
</div>