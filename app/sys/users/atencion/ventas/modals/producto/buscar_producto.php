
<!--modal Imprimir cuenta General-->
<?php
  echo '<div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Búsqueda de producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table id="tblProducto" class="table table-bordered" width="100%">
        <tr>
          <thead>
            <th>Código de barra</th>
            <th>Categoría</th>
            <th>Producto</th>
            <th>Cantidad</th>
          </thead>
        </tr>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
'
?>
