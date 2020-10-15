<?php

defined('BASEPATH') or exit('No direct script access allowed');



class ParController extends CI_Controller

{

	public function __construct()

	{

		parent::__construct();

		$this->load->model("parModel");

	}



	public function addComuna()

	{

		$nombre = $this->input->post("nombreComuna");

		$idProvincia = $this->input->post("idProvincia");

		$resultado = $this->parModel->addComuna($nombre, $idProvincia);

		echo json_encode(array("msg" => $resultado));

	}



	public function addProvincia()

	{

		$nombre = $this->input->post("nombreProvincia");

		$idRegion = $this->input->post("idRegion");

		$resultado = $this->parModel->addProvincia($nombre, $idRegion);

		echo json_encode(array("msg" => $resultado));

	}



	public function verProvincias()

	{

		echo json_encode($this->parModel->verProvincias());

	}



	public function verRegiones()

	{

		echo json_encode($this->parModel->verRegiones());

	}



	public function getProvincias()

	{

		$draw = intval($this->input->get("draw"));

		$start = intval($this->input->get("start"));

		$length = intval($this->input->get("length"));

		$books = $this->parModel->getProvincias();

		$data = array();

		foreach ($books->result() as $r) {

			$data[] = array(

				$r->provincia_id,

				$r->provincia_nombre,

				$r->region_nombre

			);

		}

		$output = array(

			"draw" => $draw,

			"recordsTotal" => $books->num_rows(),

			"recordsFiltered" => $books->num_rows(),

			"data" => $data

		);

		echo json_encode($output);

		exit();

	}



	public function verComunas()

	{



		$draw = intval($this->input->get("draw"));

		$start = intval($this->input->get("start"));

		$length = intval($this->input->get("length"));

		$books = $this->parModel->verComunas();

		$data = array();

		foreach ($books->result() as $r) {

			$data[] = array(

				$r->comuna_id,

				$r->comuna_nombre,

				$r->provincia_nombre

			);

		}

		$output = array(

			"draw" => $draw,

			"recordsTotal" => $books->num_rows(),

			"recordsFiltered" => $books->num_rows(),

			"data" => $data

		);

		echo json_encode($output);

		exit();

	}



	public function getProvinciasEmpresa()

	{

		$region = $this->input->post("region");

		echo json_encode($this->parModel->getProvinciasEmpresa($region));

	}



	public function getComunasEmpresa()

	{

		$provincia = $this->input->post("provincia");

		echo json_encode($this->parModel->getComunasEmpresa($provincia));

	}



	public function verEmpresas()

	{

		echo json_encode($this->parModel->verEmpresas());

	}



	public function getEmpresas()

	{

		$draw = intval($this->input->get("draw"));

		$start = intval($this->input->get("start"));

		$length = intval($this->input->get("length"));

		$books = $this->parModel->getEmpresas();

		$data = array();

		foreach ($books->result() as $r) {

			$data[] = array(

				$r->idEmpresa,

				$r->rutEmpresa,

				$r->nombreEmpresa,

				$r->giroEmpresa,

				$r->direccionEmpresa

			);

		}

		$output = array(

			"draw" => $draw,

			"recordsTotal" => $books->num_rows(),

			"recordsFiltered" => $books->num_rows(),

			"data" => $data

		);

		echo json_encode($output);

		exit();

	}



	public function getSucursales()

	{

		$draw = intval($this->input->get("draw"));

		$start = intval($this->input->get("start"));

		$length = intval($this->input->get("length"));

		$books = $this->parModel->getSucursales();

		$data = array();

		foreach ($books->result() as $r) {

			$data[] = array(

				$r->idSucursal,

				$r->nmSucursal,

				$r->correoSucursal,

				$r->direccionSucursal,

				$r->nombreEmpresa

			);

		}

		$output = array(

			"draw" => $draw,

			"recordsTotal" => $books->num_rows(),

			"recordsFiltered" => $books->num_rows(),

			"data" => $data

		);

		echo json_encode($output);

		exit();

	}



	public function addEmpresa()

	{

		date_default_timezone_set("Chile/Continental");

		$hora = date('YmdHis');

		$nombre_imagen = $_FILES['foto']['name']; //nombre

		$tipo_imagen = $_FILES['foto']['type']; //tipo imagen

		$tamano_imagen = $_FILES['foto']['size']; //tamaño imagen

		if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {

			$user = $this->session->userdata("administrador");



			$rut = $this->input->post("rutEmpresa");

			$nombre = $this->input->post("nombreEmpresa");

			$fantasia = $this->input->post("nombreFantasiaEmpresa");

			$giro = $this->input->post("giroEmpresa");

			$direccion = $this->input->post("direccionEmpresa");

			$region = $this->input->post("region");

			$provincia = $this->input->post("provincia");

			$comuna = $this->input->post("comuna");

			$num1 = $this->input->post("num1");

			$num2 = $this->input->post("num2");

			$num3 = $this->input->post("num3");

			$web = $this->input->post("sitioWebEmpresa");

			$correo = $this->input->post("correoEmpresa");

			$comentario = $this->input->post("comentarioEmpresa");

			$resolucion = $this->input->post("resolucionEmpresa");

			$fechares = $this->input->post("fechaResolucionEmpresa");





			//$id = $user[0]->institucionAdministrador; // sacar el id de la sesion





			$resultado = $this->parModel->addEmpresaSinFoto($rut, $nombre, $fantasia, $giro, $direccion, $region, $provincia, $comuna, $num1, $num2, $num3, $web, $correo, $comentario, $resolucion, $fechares);

			if ($resultado == "ok") {

				echo "ok";

			} else if ($resultado == "no") {

				echo "error";

			}

		} else {

			if ($tamano_imagen <= 10000000) {

				if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpj" || $tipo_imagen == "image/gif") {

					$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/pos/lib/img/Empresas/';

					$nombre_imagen = $hora . $nombre_imagen;

					$ruta_imagen = base_url() . 'lib/img/Empresas/' . $nombre_imagen;

					$user = $this->session->userdata("administrador");

					$rut = $this->input->post("rutEmpresa");

					$nombre = $this->input->post("nombreEmpresa");

					$fantasia = $this->input->post("nombreFantasiaEmpresa");

					$giro = $this->input->post("giroEmpresa");

					$direccion = $this->input->post("direccionEmpresa");

					$region = $this->input->post("region");

					$provincia = $this->input->post("provincia");

					$comuna = $this->input->post("comuna");

					$num1 = $this->input->post("num1");

					$num2 = $this->input->post("num2");

					$num3 = $this->input->post("num3");

					$web = $this->input->post("sitioWebEmpresa");

					$correo = $this->input->post("correoEmpresa");

					$comentario = $this->input->post("comentarioEmpresa");

					$resolucion = $this->input->post("resolucionEmpresa");

					$fechares = $this->input->post("fechaResolucionEmpresa");



					//$institucion = $user[0]->institucionAdministrador;

					//$responsable = $user[0]->idAdministrador;



					$resultado = $this->parModel->addEmpresaConFoto($rut, $nombre, $fantasia, $giro, $direccion, $region, $provincia, $comuna, $num1, $num2, $num3, $web, $correo, $comentario, $resolucion, $fechares, $ruta_imagen);



					if ($resultado == "ok") {

						move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);



						echo "ok";

					} else if ($resultado == "no") {

						echo "error";

					}

				} else {

					echo "error2";

				}

			} else {

				echo "error2";

			}

		}

	}



	public function addSucursal()

	{

		date_default_timezone_set("Chile/Continental");



		$user = $this->session->userdata("administrador");





		$nombre = $this->input->post("nombreSucursal");

		$direccion = $this->input->post("direccionSucursal");

		$region = $this->input->post("region2");

		$provincia = $this->input->post("provincia2");

		$comuna = $this->input->post("comuna2");

		$num1 = $this->input->post("nume1");

		$num2 = $this->input->post("nume2");

		$num3 = $this->input->post("nume3");

		$correo = $this->input->post("correoSucursal");

		$comentario = $this->input->post("comentarioSucursal");

		$empresa = $this->input->post("empresa");



		//$id = $user[0]->institucionAdministrador; // sacar el id de la sesion

		$resultado = $this->parModel->addSucursal($nombre,  $direccion, $region, $provincia, $comuna, $num1, $num2, $num3,  $correo, $comentario, $empresa);

		if ($resultado == "ok") {

			echo "ok";

		} else if ($resultado == "no") {

			echo "error";

		}

	}

public function getInfoSucursal()
	{
		$id = $this->input->post("id");

		echo json_encode($this->parModel->getInfoSucursal($id));
	}

	public function getInfoEmpresa()
	{
		$id = $this->input->post("id");

		echo json_encode($this->parModel->getInfoEmpresa($id));
	}


	public function editarSucursal()
	{
		$id = $this->input->post("id");
		$nombre = $this->input->post("nombre");
		$direccion = $this->input->post("direccion");
		$region = $this->input->post("region");
		$provincia = $this->input->post("provincia");
		$comuna = $this->input->post("comuna");
		$num1 = $this->input->post("tel1");
		$num2 = $this->input->post("tel2");
		$num3 = $this->input->post("tel3");
		$correo = $this->input->post("correo");
		$comentario = $this->input->post("comentario");

		$editRegion = $this->input->post("editRegion");
		//$id = $user[0]->institucionAdministrador; // sacar el id de la sesion
		$resultado = $this->parModel->editarSucursal($id, $nombre,  $direccion, $region, $provincia, $comuna, $num1, $num2, $num3,  $correo, $comentario, $editRegion);
		echo json_encode(array("msg" => $resultado));
	}

	public function editarEmpresa()
	{
		date_default_timezone_set("Chile/Continental");
		$hora = date('YmdHis');
		$nombre_imagen = $_FILES['foto2']['name']; //nombre
		$tipo_imagen = $_FILES['foto2']['type']; //tipo imagen
		$tamano_imagen = $_FILES['foto2']['size']; //tamaño imagen

		$id = $this->input->post("e_idEmpr");
		$rut = $this->input->post("e_rut");
		$nombre = $this->input->post("e_nombre");
		$fantasia = $this->input->post("e_fantasia");
		$giro = $this->input->post("e_giro");
		$direccion = $this->input->post("e_direccion");
		$region = $this->input->post("region4");
		$comuna = $this->input->post("comuna4");
		$provincia = $this->input->post("provincia4");
		$tel1 = $this->input->post("e_tel1");
		$tel2 = $this->input->post("e_tel2");
		$tel3 = $this->input->post("e_tel3");
		$web = $this->input->post("e_web");
		$correo = $this->input->post("e_correo");
		$comentario = $this->input->post("e_comentario");
		$resolucion = $this->input->post("e_resolucion");
		$fecha = $this->input->post("e_fecha");
		$rutaFoto = $this->input->post("e_logo");
		$time = strtotime($fecha);
		$fechares = date('Y-m-d', $time);
		$user = $this->session->userdata("administrador");
		//$id = $user[0]->institucionAdministrador; // sacar el id de la sesion

		if ($nombre == "" || $rut == "" || $fantasia == "" || $giro == "" || $direccion == "" || $tel1 == "" || $correo == "") {
			echo "faltandatosprincipales";
		} else {
			if ($region == null && $provincia == null && $comuna == null) {
				if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {
					$resultado = $this->parModel->editEmpresaSinFotoSinRegion($id, $rut, $nombre, $fantasia, $giro, $direccion, $tel1, $tel2, $tel3, $web, $correo, $comentario, $resolucion, $fechares);
					if ($resultado == "ok") {
						echo "ok";
					} else if ($resultado == "no") {
						echo "error";
					}
				} else {
					if ($tamano_imagen <= 10000000) {
						if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpj" || $tipo_imagen == "image/gif") {
							$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/pos/lib/img/Empresas/';
							$nombre_imagen = $hora . $nombre_imagen;
							$ruta_imagen = base_url() . 'lib/img/Empresas/' . $nombre_imagen;


							$resultado = $this->parModel->editEmpresaConFotoSinRegion($id, $rut, $nombre, $fantasia, $giro, $direccion, $tel1, $tel2, $tel3, $web, $correo, $comentario, $resolucion, $fechares, $ruta_imagen);
							if ($resultado == "ok") {
								move_uploaded_file($_FILES['foto2']['tmp_name'], $carpeta_destino . $nombre_imagen);
								echo "ok";
							} else if ($resultado == "no") {
								echo "error";
							}
						} else {
							echo "error2";
						}
					} else {
						echo "error2";
					}
				}
			} else {
				if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {
					$resultado = $this->parModel->editEmpresaSinFotoConRegion($id, $rut, $nombre, $fantasia, $giro, $direccion, $region, $provincia, $comuna, $tel1, $tel2, $tel3, $web, $correo, $comentario, $resolucion, $fechares);
					if ($resultado == "ok") {
						echo "ok";
					} else if ($resultado == "no") {
						echo "error";
					}
				} else {
					if ($tamano_imagen <= 10000000) {
						if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpj" || $tipo_imagen == "image/gif") {
							$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/pos/lib/img/Empresas/';
							$nombre_imagen = $hora . $nombre_imagen;
							$ruta_imagen = base_url() . 'lib/img/Empresas/' . $nombre_imagen;
							$resultado = $this->parModel->editEmpresaConFotoConRegion($id, $rut, $nombre, $fantasia, $giro, $direccion, $region, $provincia, $comuna, $tel1, $tel2, $tel3, $web, $correo, $comentario, $resolucion, $fechares, $ruta_imagen);
							if ($resultado == "ok") {
								move_uploaded_file($_FILES['foto2']['tmp_name'], $carpeta_destino . $nombre_imagen);
								echo "ok";
							} else if ($resultado == "no") {
								echo "error";
							}
						} else {
							echo "error2";
						}
					} else {
						echo "error2";
					}
				}
			}
		}
	}

	public function eliminarSucursal()
	{
		$id = $this->input->post("id");
		$resultado = $this->parModel->eliminarSucursal($id);
		if ($resultado == "1") {
			echo 'ok';
		} else if ($resultado == "0") {
			echo 'error';
		}
	}

	public function eliminarEmpresa()
	{
		$id = $this->input->post("id");
		$resultado = $this->parModel->eliminarEmpresa($id);
		echo json_encode(array("msg" => $resultado));
	}




	public function getImpuesto()
	{
		echo json_encode($this->parModel->getImpuesto());
	}

	public function getColor()
	{
		echo json_encode($this->parModel->getColor());
	}

	public function getTalla()
	{
		echo json_encode($this->parModel->getTalla());
	}

	public function getUnidad()
	{
		echo json_encode($this->parModel->getUnidad());
	}

	public function getGrupo()
	{
		echo json_encode($this->parModel->getGrupo());
	}
	public function getFamilia()
	{
		$grupo = $this->input->post("grupo");
		echo json_encode($this->parModel->getFamilia($grupo));
	}



	public function setEmpresa()
	{
		$id = $this->input->post("id");
		$dato = $id;
		$this->session->set_userdata("empresa", $dato);
	}

	public function getIdEmpresa()
	{
		$arreglo[] = $this->session->userdata("carro");
		$var = $arreglo[0]->idEmpresa;
		echo json_encode(array("msg" => $var));
	}

	public function addItem()
	{
		////////////////////
		$user = $this->session->userdata("empresa");
		$idEmpresa = $user; // sacar el id de la sesion
		////////////////////

					$porcentajeImpuestoAdicional = $this->input->post("getImpuesto");
			$getPorcentajeAdicional = $this->parModel->getImpuestoAdicional($porcentajeImpuestoAdicional);
			$parametro_iva = $this->parModel->getImpuestoEspecifico($idEmpresa);
			$grupos = $this->input->post("grupos");
			$familias = $this->input->post("familias");
			$talla = $this->input->post("talla");
			$color = $this->input->post("color");
			$unidad = $this->input->post("unidad");
			$getSecuencia = $this->parModel->getSecuencia($grupos, $familias);
			$secuencia = $getSecuencia[0]->total;
			$secuencia++;
			$chek1 = $this->input->post("chek1");
			$chek2 = $this->input->post("chek2");
			$chek3 = $this->input->post("chek3");
			$chek4 = $this->input->post("chek4");
			$chek5 = $this->input->post("chek5");
			$chek6 = $this->input->post("chek6");
			$chek7 = $this->input->post("chek7");
			$chek8 = $this->input->post("chek8");
			$chek9 = $this->input->post("chek9");
			print_r($getPorcentajeAdicional);
			if ($grupos == null || $familias == null || $talla == null || $color == null || $unidad == null) {
				echo 'falta';
			} else {
				date_default_timezone_set("Chile/Continental");
				$hora = date('YmdHis');
				$nombre_imagen = $_FILES['foto']['name']; //nombre
				$tipo_imagen = $_FILES['foto']['type']; //tipo imagen
				$tamano_imagen = $_FILES['foto']['size']; //tamaño imagen
				if ($nombre_imagen == null || $tipo_imagen == null || $tamano_imagen == null) {
					$codigoInterno = $this->input->post("codigoInterno");
					$codigoBarra = $this->input->post("codigoBarra");
					$codigoProveedor = $this->input->post("codigoProveedor");
					$nmCorto = $this->input->post("nmCorto");
					$nmLargo = $this->input->post("nmLargo");
					$stkReposicion = $this->input->post("stkReposicion");
					$stkCritico = $this->input->post("stkCritico");
					$posicion = $this->input->post("posicion");
					$idImpuestoAdicional = $this->input->post("getImpuesto"); //id del par_impuesto_adicional
					$descuentoMaximo = $this->input->post("descuentoMaximo");
					$costoNeto = $this->input->post("costoNeto");
					$porcentajeUtilidad = $this->input->post("porcentajeUtilidad");
					$comentario = $this->input->post("comentario");

					//////////////////// Logica de negocio

					//////////////////// Secuencia
					$secGrupo = str_pad($grupos, 3, "0", STR_PAD_LEFT);
					$secSecuencia = str_pad($secuencia, 7, "0", STR_PAD_LEFT);
					$secFamilia = str_pad($familias, 2, "0", STR_PAD_LEFT);
					$idProducto = $secGrupo . $secFamilia . $secSecuencia;
					//str_pad($str, 6, "0", STR_PAD_LEFT);
					////////////////////
					$porcentajeIva = $parametro_iva[0]->porcentajeIva; //porcentaje iva tabla par_parametro

					$porcentajeImpuestoEspecifico = $parametro_iva[0]->porcentajeImpuestoEspecifico; //porcentaje impuesto especifico de la tabla par parametro
					if ($chek6 == 1) { //estado impuesto especifico Marcado
						$porcentajeImpuestoAdicional = $getPorcentajeAdicional[0]->porcentajeImpuesto;
						if ($chek5 == 1) { //estado excento marcado
							$porcentajeIva = 0;
							$porcentajeImpuestoAdicional = 0;
							$porcentajeImpuestoEspecifico = 0;
							$precioCostoIva = (($costoNeto * $porcentajeIva) / 100) + $costoNeto;
							$precioVentaNeto =  (($costoNeto * $porcentajeUtilidad) / 100)+$costoNeto;
							$precioVentaIva = ($costoNeto * $porcentajeUtilidad) * ($porcentajeIva + $porcentajeImpuestoEspecifico + $porcentajeImpuestoAdicional);
							$margenUtilidadPesos = ($precioVentaNeto - $costoNeto);
							$resultado = $this->parModel->addItemSinFotoConImpuestoAdicionalSinIva(
								$grupos,
								$familias,
								$idProducto,
								$posicion,
								$talla,
								$color,
								$unidad,
								$codigoInterno,
								$codigoBarra,
								$codigoProveedor,
								$nmCorto,
								$nmLargo,
								$stkReposicion,
								$stkCritico,
								$chek1,
								$chek2,
								$chek3,
								$chek4,
								$chek5,
								$chek6,
								$chek7,
								$chek8,
								$chek9,
								$comentario,
								$porcentajeImpuestoEspecifico,
								$descuentoMaximo,
								$porcentajeImpuestoAdicional,
								$costoNeto,
								$porcentajeIva,
								$porcentajeUtilidad,
								$idImpuestoAdicional,
								$precioCostoIva,
								$precioVentaNeto,
								$precioVentaIva,
								$margenUtilidadPesos,
								$secuencia
							);
							if ($resultado == "ok") {
								echo "ok";
							} else if ($resultado == "no") {
								echo "error";
							}
						} else { //estado excento no marcado

							$precioCostoIva = (($costoNeto * $porcentajeIva) / 100) + $costoNeto;
							$precioVentaNeto =  (($costoNeto * $porcentajeUtilidad) / 100)+$costoNeto;
							$precioVentaIva = ($costoNeto * $porcentajeUtilidad) * ($porcentajeIva + $porcentajeImpuestoEspecifico + $porcentajeImpuestoAdicional);
							$margenUtilidadPesos = ($precioVentaNeto - $costoNeto);
							$resultado = $this->parModel->addItemSinFotoConImpuestoAdicionalConIva(
								$grupos,
								$familias,
								$idProducto,
								$posicion,
								$talla,
								$color,
								$unidad,
								$codigoInterno,
								$codigoBarra,
								$codigoProveedor,
								$nmCorto,
								$nmLargo,
								$stkReposicion,
								$stkCritico,
								$chek1,
								$chek2,
								$chek3,
								$chek4,
								$chek5,
								$chek6,
								$chek7,
								$chek8,
								$chek9,
								$comentario,
								$porcentajeImpuestoEspecifico,
								$porcentajeImpuestoAdicional,
								$descuentoMaximo,
								$costoNeto,
								$porcentajeIva,
								$porcentajeUtilidad,
								$idImpuestoAdicional,
								$precioCostoIva,
								$precioVentaNeto,
								$precioVentaIva,
								$margenUtilidadPesos,
								$secuencia
							);
							if ($resultado == "ok") {
								echo "ok";
							} else if ($resultado == "no") {
								echo "error";
							}
						}
					} else {
						if ($chek5 == 1) { //estado excento marcado

							$porcentajeIva = 0;
							$porcentajeImpuestoAdicional = 0;
							$porcentajeImpuestoEspecifico = 0;
							$precioCostoIva = (($costoNeto * $porcentajeIva) / 100) + $costoNeto;
							$precioVentaNeto =  (($costoNeto * $porcentajeUtilidad) / 100)+$costoNeto;
							$precioVentaIva = ($costoNeto * $porcentajeUtilidad) * ($porcentajeIva + $porcentajeImpuestoEspecifico + $porcentajeImpuestoAdicional);
							$margenUtilidadPesos = ($precioVentaNeto - $costoNeto);
							$resultado = $this->parModel->addItemSinFotoSinImpuestoAdicionalSinIva(
								$grupos,
								$familias,
								$idProducto,
								$posicion,
								$talla,
								$color,
								$unidad,
								$codigoInterno,
								$codigoBarra,
								$codigoProveedor,
								$nmCorto,
								$nmLargo,
								$stkReposicion,
								$stkCritico,
								$porcentajeImpuestoAdicional,
								$chek1,
								$chek2,
								$chek3,
								$chek4,
								$chek5,
								$chek6,
								$chek7,
								$chek8,
								$chek9,
								$comentario,
								$porcentajeImpuestoEspecifico,
								$descuentoMaximo,
								$costoNeto,
								$porcentajeIva,
								$porcentajeUtilidad,
								$idImpuestoAdicional,
								$precioCostoIva,
								$precioVentaNeto,
								$precioVentaIva,
								$margenUtilidadPesos,
								$secuencia
							);
							if ($resultado == "ok") {
								echo "ok";
							} else if ($resultado == "no") {
								echo "error";
							}
						} else { //estado excento no marcado
							$porcentajeImpuestoAdicional = 0;
							$precioCostoIva = (($costoNeto * $porcentajeIva) / 100) + $costoNeto;
							$precioVentaNeto =  (($costoNeto * $porcentajeUtilidad) / 100)+$costoNeto;
							$precioVentaIva = ($costoNeto * $porcentajeUtilidad) * ($porcentajeIva + $porcentajeImpuestoEspecifico + $porcentajeImpuestoAdicional);
							$margenUtilidadPesos = ($precioVentaNeto - $costoNeto);
							$resultado = $this->parModel->addItemSinFotoSinImpuestoAdicionalConIva(
								$grupos,
								$familias,
								$idProducto,
								$posicion,
								$talla,
								$color,
								$unidad,
								$codigoInterno,
								$codigoBarra,
								$codigoProveedor,
								$nmCorto,
								$nmLargo,
								$stkReposicion,
								$stkCritico,
								$porcentajeImpuestoAdicional,
								$chek1,
								$chek2,
								$chek3,
								$chek4,
								$chek5,
								$chek6,
								$chek7,
								$chek8,
								$chek9,
								$comentario,
								$porcentajeImpuestoEspecifico,
								$descuentoMaximo,
								$costoNeto,
								$porcentajeIva,
								$porcentajeUtilidad,
								$idImpuestoAdicional,
								$precioCostoIva,
								$precioVentaNeto,
								$precioVentaIva,
								$margenUtilidadPesos,
								$secuencia
							);
							if ($resultado == "ok") {
								echo "ok";
							} else if ($resultado == "no") {
								echo "error";
							}
						}
					}
				} else {
					if ($tamano_imagen <= 10000000) {
						if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/jpj" || $tipo_imagen == "image/gif") {
							$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/pos/lib/img/Items/';
							$nombre_imagen = $hora . $nombre_imagen;
							$ruta_imagen = base_url() . 'lib/img/Items/' . $nombre_imagen;
							$codigoInterno = $this->input->post("codigoInterno");
							$codigoBarra = $this->input->post("codigoBarra");
							$codigoProveedor = $this->input->post("codigoProveedor");
							$nmCorto = $this->input->post("nmCorto");
							$nmLargo = $this->input->post("nmLargo");
							$stkReposicion = $this->input->post("stkReposicion");
							$stkCritico = $this->input->post("stkCritico");
							$posicion = $this->input->post("posicion");
							$idImpuestoAdicional = $this->input->post("getImpuesto"); //id del par_impuesto_adicional
							$descuentoMaximo = $this->input->post("descuentoMaximo");
							$costoNeto = $this->input->post("costoNeto");
							$porcentajeUtilidad = $this->input->post("porcentajeUtilidad");
							$comentario = $this->input->post("comentario");

							//////////////////// Logica de negocio

							//////////////////// Secuencia
							$secGrupo = str_pad($grupos, 3, "0", STR_PAD_LEFT);
							$secSecuencia = str_pad($secuencia, 7, "0", STR_PAD_LEFT);
							$secFamilia = str_pad($familias, 2, "0", STR_PAD_LEFT);
							$idProducto = $secGrupo . $secFamilia . $secSecuencia;
							//str_pad($str, 6, "0", STR_PAD_LEFT);
							////////////////////
							$porcentajeIva = $parametro_iva[0]->porcentajeIva; //porcentaje iva tabla par_parametro

							$porcentajeImpuestoEspecifico = $parametro_iva[0]->porcentajeImpuestoEspecifico; //porcentaje impuesto especifico de la tabla par parametro
							if ($chek6 == 1) { //estado impuesto especifico Marcado
								$porcentajeImpuestoAdicional = $getPorcentajeAdicional[0]->porcentajeImpuesto;
								if ($chek5 == 1) { //estado excento marcado
									$porcentajeIva = 0;
									$porcentajeImpuestoAdicional = 0;
									$porcentajeImpuestoEspecifico = 0;
									$precioCostoIva = (($costoNeto * $porcentajeIva) / 100) + $costoNeto;
									$precioVentaNeto =  (($costoNeto * $porcentajeUtilidad) / 100)+$costoNeto;
									$precioVentaIva = ($costoNeto * $porcentajeUtilidad) * ($porcentajeIva + $porcentajeImpuestoEspecifico + $porcentajeImpuestoAdicional);
									$margenUtilidadPesos = ($precioVentaNeto - $costoNeto);
									$resultado = $this->parModel->addItemConFotoConImpuestoAdicionalSinIva(
										$grupos,
										$familias,
										$idProducto,
										$posicion,
										$talla,
										$color,
										$unidad,
										$codigoInterno,
										$codigoBarra,
										$codigoProveedor,
										$nmCorto,
										$nmLargo,
										$stkReposicion,
										$stkCritico,
										$chek1,
										$chek2,
										$chek3,
										$chek4,
										$chek5,
										$chek6,
										$chek7,
										$chek8,
										$chek9,
										$comentario,
										$porcentajeImpuestoEspecifico,
										$descuentoMaximo,
										$porcentajeImpuestoAdicional,
										$costoNeto,
										$porcentajeIva,
										$porcentajeUtilidad,
										$idImpuestoAdicional,
										$precioCostoIva,
										$precioVentaNeto,
										$precioVentaIva,
										$margenUtilidadPesos,
										$secuencia,
										$ruta_imagen
									);
									if ($resultado == "ok") {
										move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);

										echo "ok";
									} else if ($resultado == "no") {
										echo "error";
									}
								} else { //estado excento no marcado

									$precioCostoIva = (($costoNeto * $porcentajeIva) / 100) + $costoNeto;
									$precioVentaNeto =  (($costoNeto * $porcentajeUtilidad) / 100)+$costoNeto;
									$precioVentaIva = ($costoNeto * $porcentajeUtilidad) * ($porcentajeIva + $porcentajeImpuestoEspecifico + $porcentajeImpuestoAdicional);
									$margenUtilidadPesos = ($precioVentaNeto - $costoNeto);
									$resultado = $this->parModel->addItemConFotoConImpuestoAdicionalConIva(
										$grupos,
										$familias,
										$idProducto,
										$posicion,
										$talla,
										$color,
										$unidad,
										$codigoInterno,
										$codigoBarra,
										$codigoProveedor,
										$nmCorto,
										$nmLargo,
										$stkReposicion,
										$stkCritico,
										$chek1,
										$chek2,
										$chek3,
										$chek4,
										$chek5,
										$chek6,
										$chek7,
										$chek8,
										$chek9,
										$comentario,
										$porcentajeImpuestoEspecifico,
										$porcentajeImpuestoAdicional,
										$descuentoMaximo,
										$costoNeto,
										$porcentajeIva,
										$porcentajeUtilidad,
										$idImpuestoAdicional,
										$precioCostoIva,
										$precioVentaNeto,
										$precioVentaIva,
										$margenUtilidadPesos,
										$secuencia,
										$ruta_imagen
									);
									if ($resultado == "ok") {
										move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);

										echo "ok";
									} else if ($resultado == "no") {
										echo "error";
									}
								}
							} else {
								if ($chek5 == 1) { //estado excento marcado

									$porcentajeIva = 0;
									$porcentajeImpuestoAdicional = 0;
									$porcentajeImpuestoEspecifico = 0;
									$precioCostoIva = (($costoNeto * $porcentajeIva) / 100) + $costoNeto;
									$precioVentaNeto =  (($costoNeto * $porcentajeUtilidad) / 100)+$costoNeto;
									$precioVentaIva = ($costoNeto * $porcentajeUtilidad) * ($porcentajeIva + $porcentajeImpuestoEspecifico + $porcentajeImpuestoAdicional);
									$margenUtilidadPesos = ($precioVentaNeto - $costoNeto);
									$resultado = $this->parModel->addItemConFotoSinImpuestoAdicionalSinIva(
										$grupos,
										$familias,
										$idProducto,
										$posicion,
										$talla,
										$color,
										$unidad,
										$codigoInterno,
										$codigoBarra,
										$codigoProveedor,
										$nmCorto,
										$nmLargo,
										$stkReposicion,
										$stkCritico,
										$porcentajeImpuestoAdicional,
										$chek1,
										$chek2,
										$chek3,
										$chek4,
										$chek5,
										$chek6,
										$chek7,
										$chek8,
										$chek9,
										$comentario,
										$porcentajeImpuestoEspecifico,
										$descuentoMaximo,
										$costoNeto,
										$porcentajeIva,
										$porcentajeUtilidad,
										$idImpuestoAdicional,
										$precioCostoIva,
										$precioVentaNeto,
										$precioVentaIva,
										$margenUtilidadPesos,
										$secuencia,
										$ruta_imagen
									);
									if ($resultado == "ok") {
										move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);

										echo "ok";
									} else if ($resultado == "no") {
										echo "error";
									}
								} else { //estado excento no marcado
									$porcentajeImpuestoAdicional = 0;
									$precioCostoIva = (($costoNeto * $porcentajeIva) / 100) + $costoNeto;
									$precioVentaNeto =  (($costoNeto * $porcentajeUtilidad) / 100)+$costoNeto;
									$precioVentaIva = ($costoNeto * $porcentajeUtilidad) * ($porcentajeIva + $porcentajeImpuestoEspecifico + $porcentajeImpuestoAdicional);
									$margenUtilidadPesos = ($precioVentaNeto - $costoNeto);
									$resultado = $this->parModel->addItemConFotoSinImpuestoAdicionalConIva(
										$grupos,
										$familias,
										$idProducto,
										$posicion,
										$talla,
										$color,
										$unidad,
										$codigoInterno,
										$codigoBarra,
										$codigoProveedor,
										$nmCorto,
										$nmLargo,
										$stkReposicion,
										$stkCritico,
										$porcentajeImpuestoAdicional,
										$chek1,
										$chek2,
										$chek3,
										$chek4,
										$chek5,
										$chek6,
										$chek7,
										$chek8,
										$chek9,
										$comentario,
										$porcentajeImpuestoEspecifico,
										$descuentoMaximo,
										$costoNeto,
										$porcentajeIva,
										$porcentajeUtilidad,
										$idImpuestoAdicional,
										$precioCostoIva,
										$precioVentaNeto,
										$precioVentaIva,
										$margenUtilidadPesos,
										$secuencia,
										$ruta_imagen
									);
									if ($resultado == "ok") {
										move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . $nombre_imagen);

										echo "ok";
									} else if ($resultado == "no") {
										echo "error";
									}
								}
							}
						} else {
							echo "error2";
						}
					} else {
						echo "error2";
					}
				}
			}
		
	}

}

