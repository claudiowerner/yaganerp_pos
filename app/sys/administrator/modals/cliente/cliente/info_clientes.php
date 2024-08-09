<?php

function modalInfoClientes()
{
    return "<div class='modal fade' id='modalInfoClientes' role='dialog' style='overflow-y: scroll;' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-scrollable  modal-lg' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
          <h5 class='modal-title' id='exampleModalLongTitle'>
            <span id='idClienteInfo' style='display: none'></span>
            Detalles de <strong id='tituloCliente'></strong>
          </h5>
        </div>
        <div class='modal-body'>
          <div class='row'>
            <div class='col-lg-6'>
              <table class='table'>
                <tr>
                  <th colspan='2'>Datos del cliente</th>
                </tr>
                <tr>
                  <td><label>Nombre:</label></td>
                  <td><span id='nombreInfoCliente'></span></td>
                </tr>
                <tr>
                  <td><label>Rut:</label></td>
                  <td><span id='rutInfoCliente'></span></td>
                </tr>
                <tr>
                  <td><label>Correo:</label></td>
                  <td><span id='correoInfoCliente'></span></td>
                </tr>
                <tr>
                  <td><label>Teléfono:</label></td>
                  <td><span id='telefonoInfoCliente'></span></td>
                </tr>
                <tr>
                  <td><label>Dirección:</label></td>
                  <td><span id='direccionInfoCliente'></span></td>
                </tr>
                <tr>
                  <td><label>Estado:</label></td>
                  <td><span id='estadoInfoCliente'></span></td>
                </tr>
                <tr>
                  <td><label>Estado pago:</label></td>
                  <td><span id='estado_pagoInfoCliente'></span></td>
                </tr>
              </table>
            </div>
            <div class='col-lg-6'>
              <table class='table'>
                <tr>
                  <th colspan=2>Datos de la empresa</th>
                </tr>
                <tr>
                  <td><label>Nombre de fantasía:</label></td>
                  <td><span id='nom_fantasiaInfoCliente'></span></td>
                </tr>
                <tr>
                  <td><label>Razón social:</label></td>
                  <td><span id='razon_socialInfoCliente'></span></td>
                </tr>
                <tr>
                  <td><label>Giro:</label></td>
                  <td><span id='giroInfoCliente'></span></td>
                </tr>
                <tr>
                  <td><label>Plan comprado:</label></td>
                  <td><span id='plan_compradoInfoCliente'></span></td>
                </tr>
                <tr>
                  <td><label>Plazo de pago:</label></td>
                  <td><span id='plazo_pagoInfoCliente'></span></td>
                </tr>
                <tr>
                  <td><label>Fecha registro:</label></td>
                  <td><span id='fechaRegistroInfoCliente'></span></td>
                </tr>
                <tr>
                  <td><label>Paga desde:</label></td>
                  <td><span id='fecha_desdeInfoCliente'></span></td>
                </tr>
                <tr>
                  <td><label>Paga hasta:</label></td>
                  <td><span id='fecha_hastaInfoCliente'></span></td>
                </tr>
              </table>
            </div>
          </div>
          
          
          <button id='btnAbrirEdicion' class='btn btn-primary' >Editar</button>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
          <button type='submit' id='btnModificar' class='btn btn-primary'>Guardar</button>
        </div>
      </div>
    </div>
  </div>";
}


?>