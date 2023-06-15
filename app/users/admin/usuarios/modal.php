<?php
    //modal registro de usuario
    echo '<!--Modal registro-->
    <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Agregando usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" align="center">
            <table class=table>
              <tr>
                <th colspan=2>----------Datos del usuario----------</th>
              </tr>
              <tr>
                <td>
                  <label name="nombreUser">Nombre</label>
                </td>
                <td>
                  <input type="text" name="nomUser" id="nomUser" class="form-control" required>
                </td>
              </tr>
              <tr>
                <td>
                  <label name="user">User</label>
                </td>
                <td>
                  <input type="text" name="user" id="user" class="form-control" required>
                </td>
              </tr>
              <tr>
                <td>
                  <label name="pass">Password</label>
                </td>
                <td>
                  <input type="password" name="pass" id="pass" class="form-control" required>
                </td>
              </tr>
              <tr>
                <td>
                  Confirmar password
                </td>
                <td>
                  <input type="password" name="cPass" id="cPass" class="form-control" required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <label id="lblMsj"></label>
                </td>
              </tr>
              <tr>
                <td>
                  <label name="pass">Tipo de usuario</label>
                </td>
                <td>
                  <select id="slctTipoUsuario" class="form-control">
                    <option value="1">ADMINISTRADOR</option> 
                    <option value="2">CAJERO</option>
                    <option value="3">GARZÓN</option>
                  </select>
                </td>
              </tr>
            </table>
            <table>
              <tr align=center>
                <th colspan=2>----------Permisos del usuario----------</th>
              </tr>
              <tr>
                <td align=right margin=auto>
                  <div class=button>
                    <label name="pass">Vender</label>
                  </div>
                </td>
                <td>
                  <div class=boton>
                    <span class="toggle-switch">
                      <span class="toggle-knob"></span>
                    </span>
                  </div>
                </td>
              </tr>
              <tr>
                <td align=right margin=auto>
                  <div class=button>
                    <label name="pass">Pagar mesa</label>
                  </div>
                </td>
                <td>
                  <div class=boton>                    
                    <input type="checkbox" id="pagarMesa"/>
                    <label for="pagarMesa" class="switch"></label>
                  </div>
                </td>
              </tr>
              <tr>
                <td align=right margin=auto>
                  <div class=button>
                    <label name="pass">Anular venta</label>
                  </div>
                </td>
                <td>
                  <div class=boton>                    
                    <input type="checkbox" id="anularVenta"/>
                    <label for="anularVenta" class="switch"></label>
                  </div>
                </td>
              </tr>
              <tr>
                <td align=right margin=auto>
                  <div class=button>
                    <label name="pass">Cambiar mesa</label>
                  </div>
                </td>
                <td>
                  <div class=boton>                    
                    <input type="checkbox" id="cambiarMesa"/>
                    <label for="cambiarMesa" class="switch"></label>
                  </div>
                </td>
              </tr>
            </table>
            <div>
              <label id="lblMsj"></label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>';

    //modal edición de usuario
    echo '<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Editando usuario <strong id="usuario">ID_USUARIO</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" align="center">
          <table class=table>
            <tr>
              <th colspan=2>Datos del usuario</th>
            </tr>
            <tr>
              <td>
                <label name="nombreUser">Nombre</label>
              </td>
              <td>
                <input type="text" name="nomUserEditar" id="nomUserEditar" class="form-control" required>
              </td>
            </tr>
            <tr>
              <td>
                <label name="user">User</label>
              </td>
              <td>
                <input type="text" name="userEditar" id="userEditar" class="form-control" required>
              </td>
            </tr>
            <tr>
              <td>
                <label name="pass">Password</label>
              </td>
              <td>
                <input type="password" name="passEditar" id="passEditar" class="form-control" required>
              </td>
            </tr>
            <tr>
              <td>
                Confirmar password
              </td>
              <td>
                <input type="password" name="cPassEditar" id="cPassEditar" class="form-control" required>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <label id="lblMsjEditar"></label>
              </td>
            </tr>
            <tr>
              <td>
                Estado
              </td>
              <td>
                <select id="slctEstado" class="form-control">
                  <option value="ACTIVADO">ACTIVADO</option>
                  <option value="DESACTIVADO">DESACTIVADO</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <label name="pass">Tipo de usuario</label>
              </td>
              <td>
                <select id="slctTipoUsuarioEditar" class="form-control">
                  <option value="ADMINISTRADOR">ADMINISTRADOR</option> 
                  <option value="CAJERO">CAJERO</option>
                  <option value="GARZÓN">GARZÓN</option>
                </select>
              </td>
            </tr>
          </table>
          <table>
            <tr align=center>
              <th colspan=2>----------Permisos del usuario----------</th>
            </tr>
            <tr>
              <td align=right margin=auto>
                <div class=button>
                  <label name="pass">Vender</label>
                </div>
              </td>
              <td>
                <div class=boton>                    
                  <input type="checkbox" id="venderEditar"/>
                  <label for="venderEditar" class="switch"></label>
                </div>
              </td>
            </tr>
            <tr>
              <td align=right margin=auto>
                <div class=button>
                  <label name="pass">Pagar mesa</label>
                </div>
              </td>
              <td>
                <div class=boton>                    
                  <input type="checkbox" id="pagarMesaEditar"/>
                  <label for="pagarMesaEditar" class="switch"></label>
                </div>
              </td>
            </tr>
            <tr>
              <td align=right margin=auto>
                <div class=button>
                  <label name="pass">Anular venta</label>
                </div>
              </td>
              <td>
                <div class=boton>                    
                  <input type="checkbox" id="anularVentaEditar"/>
                  <label for="anularVentaEditar" class="switch"></label>
                </div>
              </td>
            </tr>
            <tr>
              <td align=right margin=auto>
                <div class=button>
                  <label name="pass">Cambiar mesa</label>
                </div>
              </td>
              <td>
                <div class=boton>                    
                  <input type="checkbox" id="cambiarMesaEditar"/>
                  <label for="cambiarMesaEditar" class="switch"></label>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="btnModificar" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>';
?>