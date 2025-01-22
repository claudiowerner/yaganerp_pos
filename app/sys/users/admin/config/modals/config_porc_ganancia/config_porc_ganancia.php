<div class="modal fade" id="modalConfGanancia" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="tipoVenta">Configurar información de las cuentas de ventas</h5>
      </div>
      <div class="modal-body" align="center">
      <table width="100%">
        <tr>
          <td align=right><label for="">Margen (%) de ganancia: </label></td>
          <td align=left>
            <input type="text" name="txtMargenGanancia" id="txtMargenGanancia" class="form-control" placeholder="Cargando...">
            <strong id="errorNomFantasia" style="color:red"></strong>
          </td>
        </tr>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="btnGuardarCambiosMargen" class="btn-success btn">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>