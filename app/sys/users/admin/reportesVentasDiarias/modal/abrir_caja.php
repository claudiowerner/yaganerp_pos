<!--modal Abrir Caja-->
    <div class="modal fade" id="abrirCaja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" name="TituloModalCaja">Abrir caja</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" align="center">
            <table>
              <tr>
                <td><label name="nombre">Nombre</label></td>
                <td>
                  <input type="text" name="clave" id="nombreCaja" class="form-control" placeholder="Nombre caja">
                </td>
              </tr>
              <tr>
                <td></td>
                <td><label id="msjCaja"></label></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button class="btn btn-success" id="btnAbrirCaja">Abrir caja</button>
          </div>
        </div>
      </div>
    </div>