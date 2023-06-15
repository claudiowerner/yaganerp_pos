<?php
  function modalRegistro()
  {
    return "<div class='modal fade' id='modalRegistro' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLongTitle'>Agregando</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <form id='formRegistroProducto'>
              <div class='modal-body'>
                <table id='productos2' class='table'>
                  <tr>
                    <td><label name='nombreProd'>Nombre</label></td>
                    <td>
                      <input type='text' name='nomProd' id='nomProd' class='form-control' required>
                    </td>
                  </tr>
                  <tr>
                    <td><label name='cat'>Categoría</label></td>
                    <td>
                      <select class='form-control' id='listCat' required>
                      </select>
                      <strong id='errCategoria' style='color:red'></strong>
                      </td>
                  </tr>
                  <tr>
                    <td>
                      <label name='cant'>Cantidad</label>
                    </td>
                    <td>
                      <input type='number' name='cantidad' id='cantidad' class='form-control' required>
                    </td>
                  </tr>
                  <tr>
                    <td><label name='cat'>Valor neto</label></td>
                    <td>
                      <input type='number' name='cantidad' id='valorNeto' class='form-control' required></td>
                    </td>
                  </tr>
                  <tr>
                    <td><label name='cat'>Valor venta</label></td>
                    <td>
                      <input type='number' name='cantidad' id='valorVenta' class='form-control' required></td>
                    </td>
                  </tr>
                  <tr>
                    <tr>
                      <td><label name='cat'>Es acompañamiento</label></td>
                      <td>
                        <select id='esAcom' class='form-control'>
                          <option value='O'>---SELECCIONE---</option>
                          <option value='S'>Si</option>
                          <option value='N'>No</option>
                        </select>
                        <strong id='errAcom' style='color:red'></strong>
                      </td>
                    </tr>
                    <tr>
                      <td><label name='cat'>Tiene acompañamiento</label></td>
                      <td>
                        <select id='tieneAcom' class='form-control'>
                          <option value='O'>---SELECCIONE---</option>
                          <option value='S'>Si</option>
                          <option value='N'>No</option>
                        </select>
                        <strong id='errTieneAcom' style='color:red'></strong>
                      </td>
                    </tr>
                  </tr>
                  <tr>
                    <td><label name='cat'>Comanda cocina</label></td>
                      <td>
                        <select id='comandaCocina' class='form-control'>
                          <option value='O'>---SELECCIONE---</option>
                          <option value='S'>Si</option>
                          <option value='N'>No</option>
                        </select>
                        <strong id='errComandaCocina' style='color:red'></strong>
                      </td>
                    </tr>
                    <tr>
                      <td><label name='cat'>Comanda bar</label></td>
                      <td>
                        <select id='comandaBar' class='form-control'>
                          <option value='O'>---SELECCIONE---</option>
                          <option value='S'>Si</option>
                          <option value='N'>No</option>
                        </select>
                        <strong id='errComandaBar' style='color:red'></strong>
                      </td>
                    </tr>
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
            </form>
          </div>
        </div>
      </div>";
  }

  function modalEditar()
  {
    return "<div class='modal fade' id='modalEditar' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='tituloModalEditar'></h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <form id='formEditarProducto'>
              <div class='modal-body'>
                <table id='productos2' class='table'>
                  <tr>
                    <td><label name='nombreCat'>Nombre</label></td>
                    <td>
                      <input type='text' id='nomProdEditar' name='nomProdEditar' id='nomCatEditar' class='form-control' required></td>
                    </tr>
                    <tr>
                      <td><label name='cat'>Categoría</label></td>
                    <td>
                      <select class='form-control' id='listCatEditar' required>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><label name='cant'>Cantidad</label></td>
                    <td>
                      <input type='number' name='cantidad' id='cantidadEditar' class='form-control' required>
                    </td>
                  </tr>
                  <tr>
                    <td><label name='cat'>Valor neto</label></td>
                    <td>
                      <input type='number' name='cantidad' id='valorNetoEditar' class='form-control' required></td>
                    </td>
                  </tr>
                  <tr>
                    <td><label name='valVenta'>Valor venta</label></td>
                    <td>
                      <input type='number' name='cantidad' id='valorVentaEditar' class='form-control' required></td>
                    </td>
                  </tr>
                  <tr>
                    <td><label name='cat'>Estado</label></td>
                    <td>
                      <input type='checkbox' id='swEditarProducto' onChange='check(this)'/>
                      <label for='swEditarProducto' class='switch'></label>
                    </td>
                    <tr>
                      <td><label name='cat'>Es acompañamiento</label></td>
                      <td>
                        <select id='esAcomEditar' class='form-control'>
                          <option value='O'>---SELECCIONE---</option>
                          <option value='S'>Si</option>
                          <option value='N'>No</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td><label name='cat'>Tiene acompañamiento</label></td>
                      <td>
                        <select id='tieneAcomEditar' class='form-control'>
                          <option value='O'>---SELECCIONE---</option>
                          <option value='S'>Si</option>
                          <option value='N'>No</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td><label name='cat'>Comanda cocina</label></td>
                      <td>
                        <select id='comandaCocinaEditar' class='form-control'>
                          <option value='O'>---SELECCIONE---</option>
                          <option value='S'>Si</option>
                          <option value='N'>No</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td><label name='cat'>Comanda bar</label></td>
                      <td>
                        <select id='comandaBarEditar' class='form-control'>
                          <option value='O'>---SELECCIONE---</option>
                          <option value='S'>Si</option>
                          <option value='N'>No</option>
                        </select>
                      </td>
                    </tr>
                  </tr>
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
            </form>
          </div>
        </div>
      </div>";
  }
?>