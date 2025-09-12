<div class='modal fade' id='modalSugerencias' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                <h5 class='modal-title' id=''>Escriba su sugerencia</h5>
            </div>
            <div class='modal-body'>
                <textarea name="" id="txtSugerencia" maxlength="2000" class="form-control" style="width: 100%; height: 350px" onkeyup="contar_caracteres()"></textarea>
                <div>
                    <span id="caract">0</span>/<span id="caractMaximo">2000</span>
                </div>
                <div>
                    Nota: para su sugerencia, se utilizarán los datos que usted proporcionó al sistema, con el fin de obtener una mejor respuesta a lo que usted escriba.
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnEnviarSugerencia" class="btn btn-primary" disabled>Enviar</button>
            </div>
        </div>
    </div>
</div>