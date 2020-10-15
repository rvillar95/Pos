<?php

defined('BASEPATH') or exit('No direct script access allowed');

class IndexModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->database("original");
        $data = $this->session->userdata("empresa");
        if (count($data) > 0) {

            $hostname = $data['local'];
            $clave = $data['clave'];
            $usuario = $data['usuario'];
            $bd = $data['base'];
            $config_app = array(
                'hostname' => $hostname,
                'username' => $usuario,
                'password' => $clave,
                'database' => $bd,
                'dbdriver' => 'mysqli',
                'dbprefix' => '',
                'pconnect' => FALSE,
                'db_debug' => TRUE
            );
            $this->dbserver = $this->load->database($config_app, TRUE);
        }
    }

    function consultas()
    {
        $sql = "select * from trx_venta";
        $resultado = $this->dbserver->query($sql);
        return $resultado->result();
    }

    function iniciarSesion($rut, $clave)
    {
        $sql = "select * from empresas where rutEmpresa = '$rut' and passwordEmpresa = '$clave'";
        $resultado = $this->db->query($sql);
        return $resultado->result();
    }

    function getProductos()
    {


        $sql = "select * from maeite";
        $resultado = $this->dbserver->query($sql);
        return $resultado->result();
    }

    function getNombreCliente($rut)
    {

        $sql = "select des_cte nombre from maecte where rut_cte = '$rut' ";
        $resultado = $this->dbserver->query($sql);
        if (count($resultado->result()) == 0) {
            return "Cliente no registrado.";
        } else {
            $nombre = $resultado->result()[0]->nombre;
            return $nombre;
        }
    }

    function rescatarDocumento($rutEmpresa)
    {

        $sql = "SELECT MAX(idVenta) ID FROM `trx_venta` WHERE rutEmpresa = '$rutEmpresa'";
        $resultado = $this->db->query($sql);
        $id = $resultado->result()[0]->ID;

        $sqlRescatarDocumento = "select urlDocumento from trx_venta where idVenta = $id";
        $resultadoDocumento = $this->db->query($sqlRescatarDocumento);
        $documento = $resultadoDocumento->result()[0]->urlDocumento;
        if ($documento == "") {
            return "Documento no pudo ser generado.";
        } else {
            return $documento;
        }
    }

    function getProductosXbusqueda($palabra)
    {

        $sql = "select * from maeite where des_ite LIKE '%$palabra%'";
        $resultado = $this->dbserver->query($sql);
        return $resultado->result();
    }

    function getTipoDocumento()
    {
        $sql = "select * from documentos where est_pvt = 1";
        $resultado = $this->dbserver->query($sql);
        return $resultado->result();
    }

    function getTipoPago()
    {
        $sql = "select * from pagos where est_pgo = 1";
        $resultado = $this->dbserver->query($sql);
        return $resultado->result();
    }

    function getVendedor()
    {
        $sql = "select * from usuarios where est_usr = 1";
        $resultado = $this->dbserver->query($sql);
        return $resultado->result();
    }

    function getDocumentos($rutEmpresa)
    {

        $this->db->select("numeroDocumento,fechaCreacion,formaPago,tipoDocumento,totalVenta,urlDocumento, nombreCliente");
        $this->db->from("trx_venta");
        $this->db->where("rutEmpresa", $rutEmpresa);
        $this->db->where("estadoDocumento", 1);
        $this->db->order_by('fechaCreacion', 'DESC');
        return $this->db->get();

        // select idVenta,fechaCreacion,formaPago,tipoDocumento,totalVenta,urlDocumento from trx_venta where ru
    }

    function finalizarCompra($rut, $rutEmpresa, $pagos, $documentos, $fechaAbsoluta, $arregloTotal, $total, $iva, $totalVenta, $vendedor)
    {

        $this->dbserver->trans_begin();
        //bd empresa seleccionada
        $sql = "select count(*) contador from maecte where rut_cte = '$rut' ";
        $resultado = $this->dbserver->query($sql);
        $existeCliente = $resultado->result()[0]->contador;



        $sqlSecuenciaID = "select max(idVenta) id from trx_venta";
        $resultadoSecuencia = $this->dbserver->query($sqlSecuenciaID);
        $secuenciaID = $resultadoSecuencia->result()[0]->id + 1;

        if ($existeCliente > 0) {
            $ivaTotal = "19%";

            $sqlNombre = "select des_cte nombre from maecte where rut_cte = '$rut' ";
            $resultadoNombre = $this->dbserver->query($sqlNombre);
            $nombreCliente = $resultadoNombre->result()[0]->nombre;

            if ($fechaAbsoluta == "0") {
                $sqlInsertVenta = "insert into trx_venta (idVenta,
                rutEmpresa, 
                idVendedor,
                rutCliente, 
                nombreCliente,
                fechaDocumento,
                tipoDocumento,
                formaPago,
                fechaVencimiento,
                porcentajeIva,
                totalVentaNeto,
                totalIva,
                totalVenta,
                fechaCreacion) values
                ($secuenciaID,
                '$rutEmpresa',
                $vendedor,
                '$rut',
                '$nombreCliente',
                now(),
                $documentos,
                $pagos,
                now(),
                '$ivaTotal',
                $total,
                $iva,
                $totalVenta,
                now())";
                //echo $sqlInsertVenta;
                $this->dbserver->query($sqlInsertVenta, FALSE);
                $this->db->query($sqlInsertVenta, FALSE);
            } else {
                $sqlInsertVenta = "insert into trx_venta (idVenta,
                rutEmpresa, 
                idVendedor,
                rutCliente, 
                nombreCliente,
                fechaDocumento,
                tipoDocumento,
                formaPago,
                fechaVencimiento,
                porcentajeIva,
                totalVentaNeto,
                totalIva,
                totalVenta,
                fechaCreacion) values
                ($secuenciaID,
                '$rutEmpresa',
                $vendedor,
                '$rut',
                '$nombreCliente',
                now(),
                $documentos,
                $pagos,
                '$fechaAbsoluta',
                '$ivaTotal',
                $total,
                $iva,
                $totalVenta,
                now())";
                //echo $sqlInsertVenta;
                $this->dbserver->query($sqlInsertVenta, FALSE);
                $this->db->query($sqlInsertVenta, FALSE);
            }


            // echo "paso primer if";

            foreach ($arregloTotal as $key => $value) {
                $id = $value["id"];
                $cantidad = $value["cantidad"];
                $totalDetalle = $value["total"];
                $sqlDetalle = "insert into trx_detalle (idVenta,
                                                            idProducto,
                                                            cantidadUnitaria,
                                                            precioCostoVenta,
                                                            fechaCreacion)
                                                            values
                                                            ($secuenciaID,
                                                            $id,
                                                            $cantidad,
                                                            $totalDetalle,
                                                            now())";
                $this->dbserver->query($sqlDetalle, FALSE);
                $this->db->query($sqlDetalle, FALSE);
            }
        } else {
            return "cliente";
        }

        if ($this->dbserver->trans_status() === FALSE) {
            $this->dbserver->trans_rollback();
            return "error";
        } else {
            $this->dbserver->trans_commit();
            return "ok";
        }
    }
}
