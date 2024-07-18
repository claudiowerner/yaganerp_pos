<?php
    //modal registro de usuario
    echo '<!--Modal registro-->
    <div class="modal fade" id="modalRegistro" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                  <select id="slctTipoUsuario" class="form-control" onchange="activarPermisoAdministrar()">
                    <option value="1">ADMINISTRADOR</option> 
                    <option value="2">VENDEDOR</option>
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
                    <label name="pass">Administrar sistema</label>
                  </div>
                </td>
                <td>
                  <div class=boton>                    
                    <input type="checkbox" id="swAdministrar"/>
                    <label for="swAdministrar" class="switch"></label>
                  </div>
                </td>
              </tr>
              
              <tr>
                <td align=right margin=auto>
                  <div class=button>
                    <label name="pass">Vender</label>
                  </div>
                </td>
                <td>
                  <div class=boton>                    
                    <input type="checkbox" id="swVender"/>
                    <label for="swVender" class="switch"></label>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>';

    //modal edición de usuario
    echo '<div class="modal fade" id="modalEditar" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="exampleModalLongTitle">Editando usuario <strong id="usuario">ID_USUARIO</strong><span id="idUsuarioEditar" style="display: none"></span></h5>
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
                No indique la contraseña si no la desea cambiar.
              </td>
            </tr>
            <tr>
              <td>
                <label name="pass">Tipo de usuario</label>
              </td>
              <td>
                <select id="slctTipoUsuarioEditar" class="form-control" onchange="activarPermisoAdministrarEditar()">
                  <option value="1">ADMINISTRADOR</option> 
                  <option value="2">VENDEDOR</option>
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
                  <label name="pass">Administrar</label>
                </div>
              </td>
              <td>
                <div class=boton>                    
                  <input type="checkbox" id="swAdministrarEditar"/>
                  <label for="swAdministrarEditar" class="switch"></label>
                </div>
              </td>
            </tr>
            <tr>
              <td align=right margin=auto>
                <div class=button>
                  <label name="pass">Vender</label>
                </div>
              </td>
              <td>
                <div class=boton>                    
                  <input type="checkbox" id="swVenderEditar"/>
                  <label for="swVenderEditar" class="switch"></label>
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