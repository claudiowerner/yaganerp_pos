<!--modal Imprimir cuenta General-->
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
      </div>