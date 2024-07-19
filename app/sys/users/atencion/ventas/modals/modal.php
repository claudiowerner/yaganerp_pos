<?php

function modalDescuento()
{
  return "<!--modalDescuento-->
<div class='modal fade' id='modalDescuento' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='tipoVenta'>Confirmar descuento al total de la venta</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body' align='center'>
        Ingrese porcentaje de descuento
        <br>
        <table>
          <tr>
            <td><label name='clave'>(%) Descuento</label></td>
            <td>
              <input type='number' maxlenght='3' min='0' max='100' name='txtPorcDescuento' id='txtPorcDescuento' class='form-control'>
            </td>
          </tr>
        </table>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
        <button class='btn btn-success' id='btnConfirmarDescto'>Confirmar</button>
      </div>
    </div>
  </div>
</div>";
};

  function modalSolicitarAutorizacion()
  {
    return "<!--modalSolicitarClaveAutorizacion-->
  <div class='modal fade' id='solicClaveAut' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='tipoVenta'>Eliminar venta de producto <span id='anVenta'>id</span>
            <!--Env�o de ID venta a PHP via JS--><span id='idVentaElim'></span>
            <!--Env�o de NOMBRE DEL PRODUCTO a PHP via JS--><label id='prodModCantElim'></label></h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body' align='center'>
          Para poder anular este producto, debe ingresar la clave de autorizaci�n
          <br>
          <table>
            <tr>
              <td><label name='clave'>Clave</label></td>
              <td>
                <input type='password' name='clave' id='clave' class='form-control' placeholder='Clave'>
              </td>
            </tr>
            <tr>
              <td></td>
              <td><label id='msjClave'></label></td>
            </tr>
          </table>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
          <button class='btn btn-success' id='btnConfirmarEliminarVenta'>Confirmar</button>
        </div>
      </div>
    </div>
  </div>";
  };

  function modalAnular()
  {
    return "<!--modalSolicitarClaveAutorizacionAnular-->
  <div class='modal fade' id='solicClaveAutAnular' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='tipoVentaAnular'>Anular venta <span id='anVentaAnular'>id</span> mesa <span id='mesaAnular'>id</span></h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body' align='center'>
          Para poder anular la venta asociada a esta mesa, debe ingresar la clave de autorización
          <br>
          <table>
            <tr>
              <td><label name='clave'>Clave</label></td>
              <td>
                <input type='password' name='clave' id='claveAnular' class='form-control' placeholder='Clave'>
              </td>
            </tr>
            <tr>
              <td></td>
              <td><label id='msjClaveAnular'></label></td>
            </tr>
          </table>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
          <button class='btn btn-success' id='btnAnularVenta'>Confirmar</button>
        </div>
      </div>
    </div>
  </div>
";
  }

  function modalAñadirCuenta()
  {
    return "<!--modalCambiarCantidad-->
      <div class='modal fade' id='modalAñadirCuenta' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Modificar cantidad venta ID 
                <!--Env�o de ID venta a PHP via JS--><span id='idVenta'></span>
                <!--Env�o de NOMBRE DEL PRODUCTO a PHP via JS--><label id='id_prod' style='display:  none'></label></h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center'>
              <table style='width:100%'>
                <tr>
                  <td>
                    <label for=''>R.U.T.</label>
                  </td>
                  <td>
                    <input type='text' name='txtRut' id='txtRut' class='form form-control'>
                  </td>
                  <td>
                    <button id='btnAgregarCliente' class='btn btn-success' style='width:100%' disabled >Agregar</button>
                  </td>
                </tr>
              </table>
            </div>
            <div class='modal-body' align='center'>
              <table class='table'>
                <th>
                  <tr style='width:33%'>
                    <td>R.U.T.</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Seleccionar</td>
                  </tr>
                </th>
                <tbody id='datosCliente'>
                  <tr>
                    <td colspan=4 align=center>
                      Indique un parámetro de búsqueda
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>  
          </div>
        </div>
      </div>
      ";
  }


  function modalPagarCuenta()
  {
    return "<!--modalCambiarCantidad-->
      <div class='modal fade' id='modalPagarCuenta' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Pagar cuenta 
                <span id='idVenta'></span>
                <label id='id_prod' style='display:  none'></label>
              </h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center'>
              <table style='width:100%'>
                <tr>
                  <td>
                    <label for=''>Cliente</label>
                  </td>
                  <td width='80%'>
                    <input type='text' id='txtBuscarCliente' class='form form-control select2' autocomplete='off'>
                  </td>
                  <td>
                    <button id='btnAgregarCliente' class='btn btn-success' style='width:100%' disabled >Agregar</button>
                  </td>
                </tr>
              </table>
            </div>
            <div class='modal-body' align='center'>
              <table class='table'>
                <th>
                  <tr style='width:33%'>
                    <td>R.U.T.</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Seleccionar</td>
                  </tr>
                </th>
                <tbody id='datosClientePagarCuenta'>
                  <tr>
                    <td colspan=4 align=center>
                      Indique un parámetro de búsqueda
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>  
          </div>
        </div>
      </div>
      ";
  }

  function modalSeleccionarCuenta()
  {
    return "<!--modalCambiarCantidad-->
      <div class='modal fade' id='modalSeleccionarCuenta' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Seleccione la cuenta para pagar
                <span id='idVenta'></span>
                <span id='spanRut'></span>
              </h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center'>
              <table class='table'>
                <th>
                  <tr style='width:33%'>
                    <td>Seleccionar</td>
                    <td>Fecha</td>
                    <td>Valor</td>
                  </tr>
                </th>
                <tbody id='bodyCuentas'>
                  <tr>
                    
                  </tr>
                </tbody>
              </table>
            </div>  
          </div>
        </div>
      </div>
      ";
  }


  function modalAgregarCliente()
  {
    return "<!--modalCambiarCantidad-->
      <div class='modal fade' id='modalAgregarCliente' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Modificar cantidad venta ID 
                <!--Env�o de ID venta a PHP via JS--><span id='idVenta'></span>
                <!--Env�o de NOMBRE DEL PRODUCTO a PHP via JS--><label id='id_prod' style='display:  none'></label></h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center'>
                <table style='width:100%'>
                  <tr>
                    <td>
                      <label for=''>R.U.T.</label>
                    </td>
                    <td>
                      <input type='text' name='txtRutGuardar' id='txtRutGuardar' class='form form-control' required>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for=''>Nombre:</label>
                    </td>
                    <td>
                      <input type='text' name='txtNombreGuardar' id='txtNombreGuardar' class='form form-control' required>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for=''>Apellido:</label>
                    </td>
                    <td>
                      <input type='text' name='txtApellidoGuardar' id='txtApellidoGuardar' class='form form-control' required>
                    </td>
                  </tr>
                </table>
            </div>
            <div class='modal-footer'>
              <label for='' id='lblRutValido'></label>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
              <button type='submit' class='btn btn-success' id='btnGuardarCliente' data-dismiss='modal'>Guardar</button>
            </div> 
          </div>
        </div>
      </div>
      ";
  }

  function modalCambiarCantidad()
  {
    return "<!--modalCambiarCantidad-->
      <div class='modal fade' id='cambiarCantidad' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Modificar cantidad venta ID 
                <!--Env�o de ID venta a PHP via JS--><span id='idVenta'></span>
                <!--Env�o de NOMBRE DEL PRODUCTO a PHP via JS--><label id='id_prod' style='display:  none'></label></h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center' id='modificarCantidad'>
              <button type='button' id='restarCantMod' class='btn btn-danger'>
                <img src='../../../img/restar.png' width='10'>
              </button>
              <strong id='cantProdMod'>1</strong>
              <button type='button' id='sumarCantMod' class='btn btn-success'>
                <img src='../../../img/sumar.png' width='10'>
              </button>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
              <button class='btn btn-success' id='btnActCantidad' data-dismiss='modal'>Actualizar</button>
            </div>
          </div>
        </div>
      </div>
      ";
  }
  function modalCambiarCantidadPesaje()
  {
    return "<!--modalCambiarCantidad-->
      <div class='modal fade' id='cambiarCantidadPesaje' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Modificar pesaje
                <!--Envío de ID venta a PHP via JS--><span id='idVentaPesaje'></span>
                <!--Envío de NOMBRE DEL PRODUCTO a PHP via JS--><label id='id_prodPesaje' style='display:  none'></label></h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center' id='modificarCantidad'>
              <table>
                <tr>
                  <td>Ingrese el pesaje: </td>
                  <td><input type='number' id='cantModPesaje' class='form form-control' ></td>
                  <td>KGs</td>
                </tr>
              </table>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
              <button class='btn btn-success' id='btnActCantidadPesaje' data-dismiss='modal'>Actualizar</button>
            </div>
          </div>
        </div>
      </div>
      ";
  }

  function modalMetodoPago()
  {
    return "<!--modal Imprimir cuenta General-->
      <div class='modal fade' id='modalMetodoPago' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document' style='max-width: 900px!important;' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Imprimir cuenta general</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center'>
              <div>
                <table class='table'>
                  <tr>
                    <td>
                      <strong>Método de pago</strong>
                    </td>
                    <td>
                      <select id='metodoPagoGral' class='form-control' onChange='activarBotonCuentaGral(this)'>
                        <option>Cargando...</option>
                      </select>
                    </td>
                    <td>
                      <button class='btn btn-success' id='btnConfirmarPaga' disabled='true'>Pagar cuenta</button>
                    </td>
                  </tr>
                </table>
                <table id='tblMontoVuelto'>
                  <tr>
                    <td><label>Paga con:</label></td>
                    <td><input type='number' id='txtMontoPago' class='form-control'></td>
                  </tr>
                  <tr>
                    <td><label>Vuelto: </label></td>
                    <td><label id='lblResultadoVuelto'></label></td>
                  </tr>
                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>";
  }
  function modalResumenCaja()
  {
    return "<!--modal Imprimir cuenta General-->
      <div class='modal fade' id='modalResumenCaja' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document' style='max-width: 900px!important;' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Resumen de ventas del día</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center'>
              <div>
                <table class='table'>
                  <th width=50%>Método de pago</th>
                  <th>Valor</th>
                  <tbody id='bodyResumenCaja'>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>";
  }


  function modalResumenCierreCaja()
  {
    return "<!--modal Imprimir cuenta General-->
      <div class='modal fade' id='modalResumenCierreCaja' data-backdrop='static' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document' style='max-width: 900px!important;' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Resumen de ventas del día</h5>
            </div>
            <div class='modal-body' align='center'>
              <div>
                <table class='table'>
                  <th width=50%>Método de pago</th>
                  <th>Valor</th>
                  <tbody id='bodyResumenCierreCaja'>
                  </tbody>
                </table>
              </div>
            </div>
            <div class=modal-footer>
              <button id='btnCierreModal' class='btn btn-secondary' >Cierre definitivo</button>
              <button id='btnCierreDefinitivoCaja' class='btn btn-success' >Cierre definitivo</button>
            </div>
          </div>
        </div>
      </div>";
  }

  
  function modalConsultarPrecio()
  {
    return "<!--modal Imprimir cuenta General-->
      <div class='modal fade' id='modalConsultarPrecio' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog modal-lg' role='document' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <table width='100%'>
                <tr>
                  <td align='left'>
                    <h5 class='modal-title' id='tipoVenta'><strong id=cuenta>Consultar precio</strong></h5>
                  </td>
                  <td align='right'>
                    <h5>Código de barra:</h5>
                  </td>
                  <td>
                    <input type='text' name='txtCodConsultaPrecio' id='txtCodConsultaPrecio' class='form-control'>
                  </td>
                </tr>
              </table>
              
            </div>
            <div class='modal-body' align='center'>
              <table width='100%'>
                <tr>
                  <th align='center' width='50%'>Producto</th>
                  <th align='center' width='50%'>Precio</th>
                </tr>
                <tr align='center'>
                  <td align='center'>
                    <h1 id='nomProdConsulta'>Producto</h1>
                  </td>
                  <td align='center'>
                    <h1>$<h1 id='precioProdConsulta'>Precio</h1></h1>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>";
  }
  function modalCajaInicial()
  {
    return "<!--modal Imprimir cuenta General-->
      <div class='modal fade' id='modalCajaInicial' data-backdrop='static' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog modal-lg' role='document' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5><strong>Monto inicial de caja</strong></h5>
            </div>
            <div class='modal-body' align='center'>
              <table width='100%'>
                <tr>
                  <td align='right' width='50%'><strong>Monto</strong></td>
                  <td align='left' width='50%'><input type='number' id='txtMontoInicialCaja' class='form-control'></td>
                </tr>
              </table>
            </div>
            <div class='modal-footer'>
              <button class='btn btn-success' id='btnConfirmarMontoInicial'>Confirmar</button>
            </div>
          </div>
        </div>
      </div>";
  }

  function modalMovimientoCaja()
  {
    return "<!--modal Imprimir cuenta General-->
      <div class='modal fade' id='modalMovimientoCaja' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog modal-lg' role='document' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <h5><strong>Monto inicial de caja</strong></h5>
              
            </div>
            <div class='modal-body' align='center'>
              <table>
                <tr>
                  <td width='50%'>
                    <strong>Ingresar operación:</strong>
                    <br>
                    Para agregar dinero, escriba el número sin signos adelante.
                    Para registrar un retiro, agregue un signo - y luego la cifra a retirar
                  </td>
                  <td width='25%'><input type=number id='txtMovimientoCaja' class='form-control'></td>
                  <td width='25%'><button id='btnAgregarMovimiento' class='btn btn-success'>Agregar movimiento</button></td>
                </tr>
              </table>
              <table class='table'>
                <tr align='center'>
                  <th width='33%'>Operación</th>
                  <th width='33%'>Motivo</th>
                  <th width='34%'>Monto</th>
                </tr>
                <tbody id='bodyMovimientoCaja'>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>";
  }

?>