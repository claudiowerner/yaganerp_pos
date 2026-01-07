<div id="productos" class="tab-pane fade">
    <div class="row">
        <div class="col-lg-6" style = "text-align: left">
            <h1>Productos</h1>
            <button type="button" class="btn btn-success" id="btnAgregarCategoria">Agregar producto</button>
            <button type="button" class="btn btn-success" id="imprimirPrecios">Imprimir precios</button>
            <button type="button" class="btn btn-primary" id="btnResumenProductos">Resumen de productos</button>
        </div>
        <div class="col-lg-6" style = "text-align: right; padding: 30px">
            <label>Número de productos activos: </label>
            <span id="num_prod_activos">Cargando...</span>
        </div>
    </div>
    <div class="tab-content col-lg-12"></div>
        <property name="characterEncoding" value="UTF-8">
            <table id="producto" class="table table-bordered table-hover dt-resposive display nowrap">
                <thead>
                    <tr>
                        <th>Cód. de barra</th>
                        <th>Nombre</th>
                        <th>Proveedor</th>
                        <th>Categoría</th>
                        <th>Cantidad</th>
                        <th>Valor venta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </property>
    </div>
</div>