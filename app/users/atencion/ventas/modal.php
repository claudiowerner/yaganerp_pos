<?php

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
          <button class='btn btn-success' id='btnEliminarVenta'>Confirmar</button>
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

  function modalCambiarMesa()
  {
    return "<!--modalCambiarMesa-->
  <div class='modal fade' id='cambiarMesa' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog modal-lg' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='tipoVenta'>Cambiar mesa
            <!--Envío de MESA ACTUAL a PHP via JS--><label id='nMesaActual'></label></h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body' align='center'>
          <section id='restaurant'>
            Cargando mesas...
          </section>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
          <button class='btn btn-success' id='btnEliminarVenta'>Confirmar</button>
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

  function modalImprimirCtaGral()
  {
    return "<!--modal Imprimir cuenta General-->
      <div class='modal fade' id='imprCtaGral' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document' style='max-width: 900px!important;' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tipoVenta'>Imprimir cuenta general</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body' align='center'>
              <table id='tblPagoGral' class='table'>
                <tr>
                  <th>Ítem</th>
                  <th>Folio</th>
                  <th>Ubicación</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Valor</th>
                  <th>Sel</th>
                  <th>Propina</th>
                </tr>
                <tbody id='bodyImprCtaGral'>
                </tbody>
              </table>
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
                      <button class='btn btn-success' id='btnPagoCtaGral' disabled='true'>Pagar cuenta</button>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
              <button class='btn btn-success' id='btnImprCtaGral' data-dismiss='modal' disabled='true'>Imprimir cuenta</button>
            </div>
          </div>
        </div>
      </div>";
  }
?>