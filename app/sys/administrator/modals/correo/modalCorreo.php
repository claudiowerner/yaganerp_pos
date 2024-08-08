


<?php 

function modalEnviarCorreo()
{
    return 
    "<div class='modal fade' id='modalEnviarCorreo' data-backdrop='static' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-lg modal-dialog-scrollable ' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'>Enviando correo...</h5>
                </div>
                <div class='modal-body'>
                    <div class='progress'>
                        <div class='progress-bar progress-bar-striped active' role='progressbar' style='width: 100%' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}


?>