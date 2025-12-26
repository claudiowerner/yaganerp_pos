<?php

  	session_start();
	date_default_timezone_set('America/Santiago');
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
  	header('Content-Type: application/json; charset=utf-8');
  

	
		require_once '../../../../../../../conexion.php';
	require_once "../../../../../../../php/mb_encoding.php";

		
	//arrays
	$arrayId = array();
	$arrayNombreProveedor = array();
	$arrayEstado = array();
	$arrayNombreUsuario = array();
	$arrayFechaRegistro = array();
	$arrayEstadoPago = array();
	$arrayValor = array();
	$arrayIva = array();
	$arrayNombrePedido = array();

	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

		date_default_timezone_set('America/Santiago');
		
		$json = array();

		//setear charset
		$conexion->set_charset("UTF8");

		$id_us = $_SESSION['user']['id'];
		$nombre = $_SESSION['user']["nombre"];
		$id_cl = $_SESSION['user']["id_cl"];


        $json = array();
		$resultado = "";

		//Verificar si se ha seteado la ID de la temporada, para hacer la query según la id indicada
		if(isset($_POST["id_temp"]))
		{
			//echo "entra al isset\n";
			//rellenar Array ID
			$id_temp = $_POST["id_temp"];
			$sql = 
			"SELECT id 
			FROM pedidos 
			WHERE id_cl = ?
			AND temporada = ?
			AND estado!='N'";

			if ($res = $mysqli->prepare($sql))
			{
				//echo "entra al mysql prepare 1\n";
				$res->bind_param('ii', $id_cl, $id_temp);

				$res->execute();

				$resultado = $res->get_result();
			}
		}
		else
		{
			$sql = 
			"SELECT id 
			FROM pedidos
			WHERE id_cl = ?
			AND estado!='N'";

			if ($res = $mysqli->prepare($sql))
			{
				$res->bind_param('i', $id_cl);

				$res->execute();

				$resultado = $res->get_result();
			}
		}

		while($row = $resultado -> fetch_array())
		{ 
			$arrayId[] = $row["id"];
		}
		//array que se va a imprimir con los resultados

		if($resultado->num_rows>0)
		{
			$length = count($arrayId);
			

			//Seleccionar si un pedido tiene factura o no
			//rellenar array de proveedores, nombre de usuario, estado pago y estado de pedido
			for($i=0;$i<$length;$i++)
			{
				$id = $arrayId[$i];
				$sql = "SELECT fac_con_iva FROM pedidos WHERE id = $id";
				$res = $conexion->query($sql);
				
				while($row = $res->fetch_array())
				{
					$arrayIva[$i] = $row["fac_con_iva"];
				}
			}
			//rellenar array de proveedores, nombre de usuario, estado pago y estado de pedido
			for($i=0;$i<$length;$i++)
			{
				$id = $arrayId[$i];
				$sql = 
				"SELECT pr.nombre_proveedor, ped.nombre_pedido, ped.estado, us.nombre, 
				DATE_FORMAT(ped.fecha_registro, '%d-%m-%Y') AS fecha_registro, ped.estado_pago
				FROM pedidos ped
				JOIN proveedores pr
				ON pr.id = ped.id_proveedor
				JOIN usuarios us 
				ON ped.creado_por = us.id
				WHERE ped.id_cl = $id_cl
				AND ped.id = $id";
				$res = $conexion->query($sql);

				while($row = $res->fetch_array())
				{
					$estado = "";
					if($row['estado']=="C")
					{
						$estado = "HECHO";
					}
					if($row['estado']=="A")
					{
						$estado = "POR HACER";
					}

					//estado pago
					$estado_pago = "";
					if($row['estado_pago']=="C")
					{
						$estado_pago = "HECHO";
					}
					if($row['estado_pago']=="A")
					{
						$estado_pago = "POR HACER";
					}
					
					$arrayNombreProveedor[] = mb_encoding($row["nombre_proveedor"]);
					$arrayNombrePedido[] = mb_encoding($row["nombre_pedido"]);
					$arrayEstado[] = $estado;
					$arrayNombreUsuario[] = mb_encoding($row["nombre"]);
					$arrayFechaRegistro[] = $row["fecha_registro"];
					$arrayEstadoPago[] = $estado_pago;
				}
			}
			for($i=0;$i<$length;$i++)
			{
				$id = $arrayId[$i];
				$sql = 
				"SELECT SUM(pd.valor*pd.cantidad) 
				AS valor, p.fac_con_iva
				FROM pedidos_detalle pd 
				JOIN pedidos p 
				ON p.id = pd.id_pedido
				WHERE pd.id_cl = $id_cl
				AND pd.estado='S'
				AND pd.id_pedido = $id";
				$res = $conexion->query($sql);

				while($row = $res->fetch_array())
				{
					$valorConIva = 0;
					if($arrayIva[$i]=="S")
					{
						$valorConIva = $row["valor"]*1.19;
					}
					else
					{
						$valorConIva = $row["valor"];
					}
					$arrayValor[$i] = $valorConIva;
				}
			}
			
			//rellenar JSON que se va a mostrar
			for($i=0; $i<$length; $i++)
			{
				$json[] =array(
					'item' => ($i+1),
					'id' => $arrayId[$i],
					'nombre_pedido' => $arrayNombrePedido[$i],
					'nombre_proveedor' => $arrayNombreProveedor[$i],
					'estado' => $arrayEstado[$i],
					'nombre' => $arrayNombreUsuario[$i],
					'fecha_registro' => $arrayFechaRegistro[$i],
					'valor' => $arrayValor[$i],
					'estado_pago' => $arrayEstadoPago[$i]
				);
			}
		}
		else
		{
			$json = array(
				"sEcho"=> 1,
				"iTotalRecords"=> "0",
				"iTotalDisplayRecords"=> "0",
				"aaData"=> []
			);
		}
		echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	}

	

?>
