<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("indexModel");
    }

    public function index()
    {
        $this->load->view('menu');
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function finalizarCompra()
    {
        if (count($this->session->userdata("empresa")) > 0) {
            $rut = $this->input->post("rut");
            $pagos = $this->input->post("pagos");
            $documentos = $this->input->post("documentos");
            $fechacredito = $this->input->post("fechacredito");
            $total = $this->input->post("totalCompra");
            $vendedor = $this->input->post("vendedor");
            $iva = $this->input->post("totalCompraIva");
            $totalVenta = $this->input->post("valorventa");
            $carro = $this->session->userdata("carro");
            $empresa = $this->session->userdata("empresa");
            $rutEmpresa = $empresa['rut'];
            // echo $empresa[0]->rutEmpresa;
            $arregloTotal = array();
            $arregloTotal = $carro;
            $resultado = $this->indexModel->finalizarCompra($rut, $rutEmpresa, $pagos, $documentos, $fechacredito, $arregloTotal, $total, $iva, $totalVenta,$vendedor);

            echo json_encode(array("msg" => $resultado));
        }
    }

    public function getDocumentos()
    {
        if (count($this->session->userdata("empresa")) > 0) {
            $empresa = $this->session->userdata("empresa");
            $rutEmpresa = $empresa['rut'];

            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $books = $this->indexModel->getDocumentos($rutEmpresa);
            $data = array();
            foreach ($books->result() as $r) {
                if ($r->formaPago == "1") {
                    $r->formaPago = "Efectivo";
                } else if ($r->formaPago == "2") {
                    $r->formaPago = "Tarjeta";
                } else if ($r->formaPago == "3") {
                    $r->formaPago = "Credito";
                }
                if ($r->tipoDocumento == "39") {
                    $r->tipoDocumento = "Boleta Electronica";
                } else if ($r->tipoDocumento == "33") {
                    $r->tipoDocumento = "Factura Electronica";
                } else if ($r->tipoDocumento == "99") {
                    $r->tipoDocumento = "Otro Documento";
                }
                $data[] = array(
                    $r->numeroDocumento,
                    $r->nombreCliente,
                    $r->fechaCreacion,
                    $r->formaPago,
                    $r->tipoDocumento,
                    "$" . number_format($r->totalVenta, 0, '.', '.'),
                    '<a href="' . $r->urlDocumento . '" target="_blank"><i class="fa fa-cloud-download" style="font-size: 25px; text-align:center;"></i></a>'
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
    }

    public function getTipoDocumento()
    {
        if (count($this->session->userdata("empresa")) > 0) {
            echo json_encode($this->indexModel->getTipoDocumento());
        }
    }

    public function getTipoPago(){
        if (count($this->session->userdata("empresa")) > 0) {
            echo json_encode($this->indexModel->getTipoPago());
        }
    }

    public function iniciarSesion()
    {
        $rut = $this->input->post("rut");
        $clave = $this->input->post("clave");
        $usuario = $this->indexModel->iniciarSesion($rut, $clave);
        if (count($usuario) > 0) {
            $data = array(
                'rut' => $usuario[0]->rutEmpresa,
                'local' => $usuario[0]->hostnameEmpresa,
                'usuario' => $usuario[0]->userBd,
                'clave' => $usuario[0]->passwordBd,
                'base' => $usuario[0]->bdEmpresa
            );

            $this->session->set_userdata("empresa", $data);

            echo json_encode(array("msg" => "ok"));
        } else {
            echo json_encode(array("msg" => "error"));
        }
    }

    public function rescatarDocumento()
    {
        if (count($this->session->userdata("empresa")) > 0) {
            $empresa = $this->session->userdata("empresa");
            $rutEmpresa = $empresa['rut'];
            $documento = $this->indexModel->rescatarDocumento($rutEmpresa);
            //echo $nombre;
            echo json_encode(array("msg" => $documento));
        }
    }

    public function getNombreCliente()
    {
        if (count($this->session->userdata("empresa")) > 0) {
            $rut = $this->input->post("rut");
            $nombre = $this->indexModel->getNombreCliente($rut);
            //echo $nombre;
            echo json_encode(array("msg" => $nombre));
        }
    }

    public function getProductosXbusqueda()
    {
        if (count($this->session->userdata("empresa")) > 0) {
            $palabra = $this->input->post("palabra");
            echo json_encode($this->indexModel->getProductosXbusqueda($palabra));
        }
    }

    public function addProducto()
    {
        if (count($this->session->userdata("empresa")) > 0) {
            $id = $this->input->post("id");
            $cantidad = $this->input->post("cantidad");
            $precio = $this->input->post("precio");
            $total = $this->input->post("total");
            $nombre = $this->input->post("nombre");
            //$this->session->sess_destroy();
            $carro = $this->session->userdata("carro");
            if (!isset($carro)) {
                //no esta creado
                $arreglo = array();
                $carro = $arreglo;
                $array = array(
                    "id" => $id,
                    "nombre" => $nombre,
                    "cantidad" => $cantidad,
                    "precio" => $precio,
                    "total" => $total,
                );
                array_push($carro, $array);
                $this->session->set_userdata("carro", $carro);
                echo json_encode(array("msg" => "Producto agregado con exito", "cantidad" => count($carro)));
            } else {
                $contador = 0;
                $indice = -1;
                $arregloTotal = array();
                $arregloTotal = $carro;
                $arreglo = array();
                $arreglo;
                $idN = "";
                $cantidadN = "";
                $precioN = "";
                $totalN = "";

                foreach ($arregloTotal as $key => $value) {
                    $indice++;
                    if ($value["id"] == $id) {

                        $contador = 1;
                        $idN = $value["id"];
                        $cantidadN = $value["cantidad"];
                        $precioN = $value["precio"];
                        $totalN = $value["total"];
                        unset($arregloTotal[$key]);
                    }
                }

                if ($contador == 0) {
                    $array = array(
                        "id" => $id,
                        "nombre" => $nombre,
                        "cantidad" => $cantidad,
                        "precio" => $precio,
                        "total" => $total,
                    );
                    array_push($arregloTotal, $array);
                    $this->session->set_userdata("carro", $arregloTotal);
                    echo json_encode(array("msg" => "Producto agregado con exito", "cantidad" => count($arregloTotal)));
                } else {
                    $array = array(
                        "id" => $idN,
                        "nombre" => $nombre,
                        "cantidad" => $cantidadN + $cantidad,
                        "precio" => $precioN,
                        "total" => $totalN + $total,
                    );
                    array_push($arregloTotal, $array);
                    $this->session->set_userdata("carro", $arregloTotal);
                    echo json_encode(array("msg" => "Cantidad aumentada con exito", "cantidad" => count($arregloTotal)));
                }
            }
        }
    }

    public function eliminarProducto()
    {
        if (count($this->session->userdata("empresa")) > 0) {
            $id = $this->input->post("id");
            // echo $id."<br>";
            $carro = $this->session->userdata("carro");
            $arregloTotal = array();
            $arregloTotal = $carro;
            foreach ($arregloTotal as $key => $value) {
                if ($value["id"] == $id) {
                    //    echo $value["id"]."<br>";
                    unset($arregloTotal[$key]);
                }
            }
            $this->session->set_userdata("carro", $arregloTotal);
            echo json_encode(array("msg" => "Producto eliminado con exito", "cantidad" => count($arregloTotal)));
        }
    }

    public function getCarro()
    {
        if (count($this->session->userdata("empresa")) > 0) {
            echo json_encode($this->session->userdata("carro"));
        }
    }

    public function vaciarCarro()
    {
        if (count($this->session->userdata("empresa")) > 0) {
            $arreglo = array();
            $this->session->set_userdata("carro", $arreglo);
            echo json_encode(array("msg" => "Carrito vaciado"));
        }
    }

    public function getVendedor(){
        if (count($this->session->userdata("empresa")) > 0) {
            echo json_encode($this->indexModel->getVendedor());
        }
    }

    public function getProductos()
    {

        if (count($this->session->userdata("empresa")) > 0) {
            echo json_encode($this->indexModel->getProductos());
        }
    }

    public function menuventa()
    {
        if (count($this->session->userdata("empresa")) > 0) {
            $this->load->view("menuVenta");
        }
    }

    public function consultas()
    {
        echo json_encode($this->indexModel->consultas());
    }

    public function empresa()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Empresa/empresa');
    }

    public function Proveedores()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Configuraciones/proveedores');
    }

    public function Maestro_de_Items()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Configuraciones/maestro_de_items');
    }

    public function Centros_de_Costos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Configuraciones/centros_de_costos');
    }

    public function Grupos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Configuraciones/grupos');
    }
    public function Familias()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Configuraciones/familias');
    }
    public function Tipo_Movimientos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Configuraciones/tipo_movimientos');
    }
    public function Bodegas()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Configuraciones/bodegas');
    }
    public function Unidades()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Configuraciones/unidades');
    }
    public function Orden_de_Compra()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Movimientos/orden_de_compra');
    }
    public function Ingreso_Mercaderia()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Movimientos/ingreso_mercaderia');
    }
    public function Salida_Nota_de_Credito()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Movimientos/salida_nota_de_credito');
    }
    public function Traspaso_Mercaderia()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Movimientos/traspaso_mercaderia');
    }
    public function Otros_Movimientos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Movimientos/otros_movimientos');
    }
    public function Toma_Inventario()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Movimientos/toma_inventario');
    }
    public function Consulta_Items()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/Movimientos/consulta_items');
    }
    public function Pago_Proveedores()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/CuentasXPagar/pago_proveedores');
    }
    public function Cartola_Proveedores()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/CuentasXPagar/cartola_proveedores');
    }
    public function Consulta_Orden_Compra()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/CuentasXPagar/consulta_orden_compra');
    }
    public function Consulta_Documentos_Compra()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/CuentasXPagar/consulta_documentos_compra');
    }
    public function Consulta_Pagos_Proveedores()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/CuentasXPagar/consulta_pagos_proveedores');
    }

    public function Reportes_Inventario()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Inventario/reportes');
    }

    public function Clientes()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/Configuraciones/clientes');
    }

    public function Cajas()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/Configuraciones/cajas');
    }

    public function Tipos_Documentos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/Configuraciones/tipos_documentos');
    }
    public function Tipos_Ventas()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/Configuraciones/tipos_ventas');
    }
    public function Formas_de_Pago()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/Configuraciones/formas_de_pago');
    }
    public function Clasificacion_Clientes()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/Configuraciones/clasificacion_clientes');
    }
    public function Listas_de_Precios()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/Configuraciones/listas_de_precios');
    }

    public function Ciudades()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/Configuraciones/ciudades');
    }

    public function Comunas()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/Configuraciones/comunas');
    }

    public function Notas()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/Configuraciones/notas');
    }

    public function Reportes_Ventas()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/reportes');
    }

    public function Cotizaciones()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/Movimientos/cotizaciones');
    }

    public function Crear_Venta()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/Movimientos/crear_venta');
    }

    public function Cancelaciones_y_Abonos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/Movimientos/cancelaciones_y_abonos');
    }

    public function Pago_Clientes()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/CuentasXCobrar/pago_clientes');
    }

    public function Cartola_Clientes()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/CuentasXCobrar/cartola_clientes');
    }

    public function Consulta_Cotizaciones()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/CuentasXCobrar/consulta_cotizaciones');
    }

    public function Consulta_Documentos_Venta()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/CuentasXCobrar/consulta_documentos_venta');
    }

    public function Consulta_Pagos_Clientes()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Ventas/CuentasXCobrar/consulta_pagos_clientes');
    }

    public function Ingresos_y_Egresos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cajas/Configuraciones/ingresos_y_egresos');
    }

    public function Apertura()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cajas/Movimientos/apertura');
    }

    public function Ingresos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cajas/Movimientos/ingresos');
    }

    public function Egresos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cajas/Movimientos/egresos');
    }

    public function Cierre()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cajas/Movimientos/cierre');
    }

    public function Re_Imprime()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cajas/Movimientos/re_imprime');
    }

    public function Reportes_Cajas()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cajas/reportes');
    }

    public function Crear_Cuentas_Corrientes()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cuentas_Corrientes/Configuraciones/crear_cuentas_corrientes');
    }

    public function Conceptos_Bancarios()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cuentas_Corrientes/Configuraciones/conceptos_bancarios');
    }

    public function Plazas()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cuentas_Corrientes/Configuraciones/plazas');
    }

    public function Bancos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cuentas_Corrientes/Configuraciones/bancos');
    }

    public function Cuenta_Corriente()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cuentas_Corrientes/Movimientos/cuenta_corriente');
    }

    public function Consulta_Documentos_Emitidos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cuentas_Corrientes/Movimientos/consulta_documentos_emitidos');
    }

    public function Consulta_Documentos_Recibidos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cuentas_Corrientes/Movimientos/consulta_documentos_recibidos');
    }

    public function Reportes_Cuentas_Corrientes()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Cuentas_Corrientes/reportes');
    }

    public function Usuarios()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Administracion/Configuraciones/usuarios');
    }

    public function Opciones()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Administracion/Configuraciones/opciones');
    }

    public function Perfiles()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Administracion/Configuraciones/perfiles');
    }

    public function Accesos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Administracion/Configuraciones/accesos');
    }

    public function Trabajadores()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Administracion/Configuraciones/trabajadores');
    }

    public function Areas_Departamentos()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Administracion/Configuraciones/areas_departamentos');
    }

    public function Cargo_Trabajadores()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Administracion/Configuraciones/cargo_trabajadores');
    }

    public function Facturacion_Electronica()
    {
        $this->load->view('Menu/nav');
        $this->load->view('Facturacion_Electronica/facturacion');
    }
}
