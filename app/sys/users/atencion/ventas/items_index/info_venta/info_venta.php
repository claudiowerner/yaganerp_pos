<div class="row">
    <div class="col-lg-3">
        Caja actual: 
        <strong id="nomCaja">
            <?php echo $_GET['nomCaja']?></strong>
            <strong id="nCaja" style="display: none">
                <?php echo $_GET['id']?>
            </strong>
            <strong id="idMesa" style="display:none"><?php echo $idMesa;?>
        </strong>
    </div>
    <div class="col-lg-3">
        ID venta: <strong name="id_venta" id="id_venta">CARGANDO...</strong>
    </div>
    <div class="col-lg-3">
        Caja/turno: <strong name="nombreCaja" id="nombreCaja">CARGANDO...</strong>
    </div>
    <div class="col-lg-3">
        N° de Productos: <strong name="nProd" id="nProd">CARGANDO...</strong>
    </div>

    <strong name="id_caja" id="id_caja" style="display: none"></strong>
</div>