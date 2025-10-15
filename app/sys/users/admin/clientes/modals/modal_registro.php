<div class='modal fade' id='modalRegistro' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Editando </h5><span id='idCliente' style='display: none'></span>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <table id='productos2' class='table'>
                    <tr>
                        <td><label>Rut del cliente</label></td>
                        <td><input type='text' id='txtRutClte' class='form form-control' placeholder='12345678-0'/></td>
                    </tr>
                    <tr>
                        <td><label>Nombre</label></td>
                        <td><input type='text' id='txtNombreClte' class='form form-control'/></td>
                    </tr>
                    <tr>
                        <td><label>Apellido</label></td>
                        <td><input type='text' id='txtApellido' class='form form-control'/></td>
                    </tr>
                    <tr>
                        <td><label>Teléfono</label></td>
                        <td><input type='text' id='txtTelefono' class='form form-control'/></td>
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
        </div>
    </div>
</div>