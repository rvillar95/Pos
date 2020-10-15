<?php



defined('BASEPATH') or exit('No direct script access allowed');



class ParModel extends CI_Model

{



    public function __construct()

    {

        parent::__construct();
    }



    function addComuna($nombre, $idProvincia)

    {

        $data = array(

            "comuna_nombre" => $nombre,

            "provincia_id" => $idProvincia

        );

        $this->db->insert("par_comunas", $data);

        return $this->db->affected_rows();
    }



    function addProvincia($nombre, $idRegion)

    {

        $data = array(

            "provincia_nombre" => $nombre,

            "region_id" => $idRegion

        );

        $this->db->insert("par_provincias", $data);

        return $this->db->affected_rows();
    }



    function verComunas()

    {

        $this->db->select("p.comuna_id, p.comuna_nombre ,r.provincia_nombre");

        $this->db->from("par_comunas p ");

        $this->db->join("par_provincias r", "r.provincia_id = p.provincia_id");

        return $this->db->get();
    }



    function getProvincias()

    {

        $this->db->select("p.provincia_id, p.provincia_nombre, concat(r.region_nombre,' ',r.region_ordinal) as region_nombre");

        $this->db->from("par_provincias p");

        $this->db->join("par_regiones r", "r.region_id = p.region_id");

        return $this->db->get();
    }



    function verProvincias()

    {

        $this->db->select("provincia_id, provincia_nombre");

        $this->db->from("par_provincias");

        return $this->db->get()->result();
    }



    function verRegiones()

    {

        $this->db->select("region_id, concat(region_nombre,' ',region_ordinal) as nombre");

        $this->db->from("par_regiones");

        return $this->db->get()->result();
    }



    function verEmpresas()

    {

        $this->db->select("idEmpresa, concat(nmEmpresa,' (',nmFantasiaEmpresa,')') as nombreEmpresa");

        $this->db->from("mae_empresa");

        return $this->db->get()->result();
    }



    function getProvinciasEmpresa($region)

    {

        $this->db->select("provincia_id, provincia_nombre");

        $this->db->from("par_provincias");

        $this->db->where("region_id", $region);

        return $this->db->get()->result();
    }



    function getComunasEmpresa($provincia)

    {

        $this->db->select("comuna_id, comuna_nombre ");

        $this->db->from("par_comunas");

        $this->db->where("provincia_id", $provincia);

        return $this->db->get()->result();
    }



    function addEmpresaSinFoto($rut, $nombre, $fantasia, $giro, $direccion, $region, $provincia, $comuna, $num1, $num2, $num3, $web, $correo, $comentario, $resolucion, $fechares)

    {

        $data = array(

            "rutEmpresa" => $rut,

            "nmEmpresa" => $nombre,

            "nmFantasiaEmpresa" => $fantasia,

            "giroEmpresa" => $giro,

            "direccionEmpresa" => $direccion,

            "idRegion" => $region,

            "idProvincia" => $provincia,

            "idComuna" => $comuna,

            "numeroTelefono1" => $num1,

            "numeroTelefono2" => $num2,

            "numeroTelefono3" => $num3,

            "sitioWebEmpresa" => $web,

            "correoEmpresa" => $correo,

            "comentarioEmpresa" => $comentario,

            "resolucionSII" => $resolucion,

            "fechaResolucion" => $fechares,

        );

        $this->db->insert("mae_empresa", $data);

        return "ok";
    }



    function addEmpresaConFoto($rut, $nombre, $fantasia, $giro, $direccion, $region, $provincia, $comuna, $num1, $num2, $num3, $web, $correo, $comentario, $resolucion, $fechares, $ruta_imagen)

    {

        $data = array(

            "rutEmpresa" => $rut,

            "nmEmpresa" => $nombre,

            "nmFantasiaEmpresa" => $fantasia,

            "giroEmpresa" => $giro,

            "direccionEmpresa" => $direccion,

            "idRegion" => $region,

            "idProvincia" => $provincia,

            "idComuna" => $comuna,

            "numeroTelefono1" => $num1,

            "numeroTelefono2" => $num2,

            "numeroTelefono3" => $num3,

            "sitioWebEmpresa" => $web,

            "correoEmpresa" => $correo,

            "urlLogo" => $ruta_imagen,

            "comentarioEmpresa" => $comentario,

            "resolucionSII" => $resolucion,

            "fechaResolucion" => $fechares,

        );

        $this->db->insert("mae_empresa", $data);

        return "ok";
    }



    function getEmpresas()

    {

        $this->db->select("idEmpresa, rutEmpresa, concat(nmEmpresa,' (',nmFantasiaEmpresa,')') as nombreEmpresa,giroEmpresa,direccionEmpresa");

        $this->db->from("mae_empresa");

        return $this->db->get();
    }



    function getSucursales()

    {

        $this->db->select("s.idSucursal, s.nmSucursal,s.correoSucursal,s.direccionSucursal, concat(e.nmEmpresa,' (',e.nmFantasiaEmpresa,')') as nombreEmpresa");

        $this->db->from("mae_sucursal s");

        $this->db->join("mae_empresa e", "e.idEmpresa = s.idEmpresa");

        return $this->db->get();
    }



    function addSucursal($nombre,  $direccion, $region, $provincia, $comuna, $num1, $num2, $num3,  $correo, $comentario, $empresa)

    {

        $data = array(

            "idEmpresa" => $empresa,

            "nmSucursal" => $nombre,

            "direccionSucursal" => $direccion,



            "idRegion" => $region,

            "idProvincia" => $provincia,

            "idComuna" => $comuna,

            "numeroTelefono1" => $num1,

            "numeroTelefono2" => $num2,

            "numeroTelefono3" => $num3,

            "correoSucursal" => $correo,

            "comentarioSucursal" => $comentario



        );

        $this->db->insert("mae_sucursal", $data);

        return "ok";
    }

    function getInfoSucursal($id)
    {
        $this->db->select("s.idSucursal,concat(e.nmEmpresa,' (',e.nmFantasiaEmpresa,')') as nombreEmpresa,s.nmSucursal,s.direccionSucursal,r.region_nombre,p.provincia_nombre,c.comuna_nombre,s.numeroTelefono1,s.numeroTelefono2,s.numeroTelefono3,s.correoSucursal,s.comentarioSucursal");
        $this->db->from("mae_sucursal s");
        $this->db->join("par_regiones r", "r.region_id = s.idRegion");
        $this->db->join("par_comunas c", "c.comuna_id = s.idComuna");
        $this->db->join("par_provincias p", "p.provincia_id = s.idProvincia");
        $this->db->join("mae_empresa e", "e.idEmpresa = s.idEmpresa");
        $this->db->where("s.idSucursal", $id);
        return $this->db->get()->result();
    }

    function getInfoEmpresa($id)
    {
        $this->db->select("e.idEmpresa  ,e.rutEmpresa ,e.nmEmpresa ,e.nmFantasiaEmpresa ,e.giroEmpresa ,e.direccionEmpresa ,r.region_nombre,p.provincia_nombre,c.comuna_nombre,e.numeroTelefono1,e.numeroTelefono2,e.numeroTelefono3,e.sitioWebEmpresa ,e.correoEmpresa ,e.urlLogo ,e.comentarioEmpresa ,e.resolucionSII ,e.fechaResolucion ,e.idRegion");
        $this->db->from("mae_empresa e");
        $this->db->join("par_regiones r", "r.region_id = e.idRegion");
        $this->db->join("par_comunas c", "c.comuna_id = e.idComuna");
        $this->db->join("par_provincias p", "p.provincia_id = e.idProvincia");
        $this->db->where("e.idEmpresa", $id);
        return $this->db->get()->result();
    }

    function editarSucursal($id, $nombre,  $direccion, $region, $provincia, $comuna, $num1, $num2, $num3,  $correo, $comentario, $editRegion)
    {
        if ($editRegion == 0) {
            $data = array(
                "nmSucursal" => $nombre,
                "direccionSucursal" => $direccion,
                "numeroTelefono1" => $num1,
                "numeroTelefono2" => $num2,
                "numeroTelefono3" => $num3,
                "correoSucursal" => $correo,
                "comentarioSucursal" => $comentario
            );
            $this->db->where('idSucursal', $id);
            $this->db->update("mae_sucursal", $data);
            return "ok";
        } else {
            $data = array(
                "nmSucursal" => $nombre,
                "direccionSucursal" => $direccion,
                "idRegion" => $region,
                "idProvincia" => $provincia,
                "idComuna" => $comuna,
                "numeroTelefono1" => $num1,
                "numeroTelefono2" => $num2,
                "numeroTelefono3" => $num3,
                "correoSucursal" => $correo,
                "comentarioSucursal" => $comentario
            );
            $this->db->where('idSucursal', $id);
            $this->db->update("mae_sucursal", $data);
            return "ok";
        }
    }

    function eliminarEmpresa($id)
    {

        if ($this->db->simple_query("delete from mae_empresa where idEmpresa = $id")) {
            return "ok";
        } else {
            return "Error";
        }
    }

    function editEmpresaSinFotoSinRegion($id, $rut, $nombre, $fantasia, $giro, $direccion, $tel1, $tel2, $tel3, $web, $correo, $comentario, $resolucion, $fechares)
    {
        $data = array(
            "rutEmpresa" => $rut,
            "nmEmpresa" => $nombre,
            "nmFantasiaEmpresa" => $fantasia,
            "giroEmpresa" => $giro,
            "direccionEmpresa" => $direccion,
            "numeroTelefono1" => $tel1,
            "numeroTelefono2" => $tel2,
            "numeroTelefono3" => $tel3,
            "sitioWebEmpresa" => $web,
            "correoEmpresa" => $correo,
            "comentarioEmpresa" => $comentario,
            "resolucionSII" => $resolucion,
            "fechaResolucion" => $fechares,
        );
        $this->db->where('idEmpresa', $id);
        $this->db->update("mae_empresa", $data);
        return "ok";
    }

    function editEmpresaConFotoSinRegion($id, $rut, $nombre, $fantasia, $giro, $direccion, $tel1, $tel2, $tel3, $web, $correo, $comentario, $resolucion, $fechares, $ruta_imagen)
    {
        $data = array(
            "rutEmpresa" => $rut,
            "nmEmpresa" => $nombre,
            "nmFantasiaEmpresa" => $fantasia,
            "giroEmpresa" => $giro,
            "direccionEmpresa" => $direccion,
            "numeroTelefono1" => $tel1,
            "numeroTelefono2" => $tel2,
            "numeroTelefono3" => $tel3,
            "sitioWebEmpresa" => $web,
            "correoEmpresa" => $correo,
            "urlLogo" => $ruta_imagen,
            "comentarioEmpresa" => $comentario,
            "resolucionSII" => $resolucion,
            "fechaResolucion" => $fechares,
        );
        $this->db->where('idEmpresa', $id);
        $this->db->update("mae_empresa", $data);
        return "ok";
    }

    function editEmpresaSinFotoConRegion($id, $rut, $nombre, $fantasia, $giro, $direccion, $region, $provincia, $comuna, $tel1, $tel2, $tel3, $web, $correo, $comentario, $resolucion, $fechares)
    {
        $data = array(
            "rutEmpresa" => $rut,
            "nmEmpresa" => $nombre,
            "nmFantasiaEmpresa" => $fantasia,
            "giroEmpresa" => $giro,
            "direccionEmpresa" => $direccion,
            "idRegion" => $region,
            "idProvincia" => $provincia,
            "idComuna" => $comuna,
            "numeroTelefono1" => $tel1,
            "numeroTelefono2" => $tel2,
            "numeroTelefono3" => $tel3,
            "sitioWebEmpresa" => $web,
            "correoEmpresa" => $correo,
            "comentarioEmpresa" => $comentario,
            "resolucionSII" => $resolucion,
            "fechaResolucion" => $fechares,
        );
        $this->db->where('idEmpresa', $id);
        $this->db->update("mae_empresa", $data);
        return "ok";
    }

    function editEmpresaConFotoConRegion($id, $rut, $nombre, $fantasia, $giro, $direccion, $region, $provincia, $comuna, $tel1, $tel2, $tel3, $web, $correo, $comentario, $resolucion, $fechares, $ruta_imagen)
    {
        $data = array(
            "rutEmpresa" => $rut,
            "nmEmpresa" => $nombre,
            "nmFantasiaEmpresa" => $fantasia,
            "giroEmpresa" => $giro,
            "direccionEmpresa" => $direccion,
            "idRegion" => $region,
            "idProvincia" => $provincia,
            "idComuna" => $comuna,
            "numeroTelefono1" => $tel1,
            "numeroTelefono2" => $tel2,
            "numeroTelefono3" => $tel3,
            "sitioWebEmpresa" => $web,
            "correoEmpresa" => $correo,
            "urlLogo" => $ruta_imagen,
            "comentarioEmpresa" => $comentario,
            "resolucionSII" => $resolucion,
            "fechaResolucion" => $fechares,
        );
        $this->db->where('idEmpresa', $id);
        $this->db->update("mae_empresa", $data);
        return "ok";
    }

    function getImpuesto()
    {
        $this->db->select("idImpuesto, concat(nmImpuesto,' (',porcentajeImpuesto,'%)') as nmImpuesto");
        $this->db->from("par_impuesto_adicional");
        return $this->db->get()->result();
    }

    function getColor()
    {
        $this->db->select("idColor, nmColor");
        $this->db->from("par_color");
        return $this->db->get()->result();
    }

    function getTalla()
    {
        $this->db->select("idTalla, nmTalla");
        $this->db->from("par_talla");
        return $this->db->get()->result();
    }

    function getUnidad()
    {
        $this->db->select("idUnidad, nmUnidad");
        $this->db->from("par_unidad");
        return $this->db->get()->result();
    }

    function getGrupo()
    {
        $this->db->select("idGrupo, nmGrupo");
        $this->db->from("par_grupo");
        return $this->db->get()->result();
    }

    function getFamilia($grupo)
    {
        $this->db->select("idFamilia, nmFamilia");
        $this->db->from("par_familia");
        $this->db->where("idGrupo", $grupo);
        return $this->db->get()->result();
    }



    function getImpuestoEspecifico($idEmpresa)
    {
        $this->db->select("idParametro, porcentajeIva, porcentajeImpuestoEspecifico");
        $this->db->from("par_parametro");
        $this->db->where("idEmpresa", 1);
        return $this->db->get()->result();
    }

    function getImpuestoAdicional($porcentajeImpuestoAdicional)
    {
        $this->db->select("porcentajeImpuesto");
        $this->db->from("par_impuesto_adicional");
        $this->db->where("idImpuesto", $porcentajeImpuestoAdicional);
        return $this->db->get()->result();
    }

    function getSecuencia($grupos, $familias)
    {
        $this->db->select("COUNT(*) as 'total'");
        $this->db->from("mae_item");
        $this->db->where("idFamilia", $familias);
        $this->db->where("idGrupo", $grupos);
        return $this->db->get()->result();
    }

    function addItemSinFotoConImpuestoAdicionalSinIva(
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
    ) {
        $data = array(
            "idGrupo" => $grupos,
            "idFamilia" => $familias,
            "secuencia" => $secuencia,
            "idProducto" => $idProducto,
            "codigoInterno" => $codigoInterno,
            "codigoBarra" =>  $codigoBarra,
            "codigoProveedor" => $codigoProveedor,
            "nmCorto" => $nmCorto,
            "nmLargo" => $nmLargo,
            "posicion" => $posicion,
            "idUnidad" => $unidad,
            "idTalla" => $talla,
            "idColor" => $color,
            "stkReposicion" => $stkReposicion,
            "stkCritico" => $stkCritico,
            "estadoStock" => $chek1,
            "estadoItem" => $chek2,
            "estadoPesable" => $chek3,
            "estadoBloqueo" => $chek4,
            "estadoExcento" => $chek5,
            "estadoImpuestoEspecifico" => $chek6,
            "estadoServicio" => $chek8,
            "mostrarPuntoVenta" => $chek7,
            "estadoPublicacionWeb" => $chek9,
            "descuentoMaximo" => $descuentoMaximo,
            "idImpuestoAdicional" => $idImpuestoAdicional,
            "porcentajeImpuestoAdicional" => $porcentajeImpuestoAdicional,
            "porcentajeImpuestoEspecifico" => $porcentajeImpuestoEspecifico,
            "porcentajeIva" => $porcentajeIva,
            "precioCostoNeto" => $costoNeto,
            "precioCostoIva" => $precioCostoIva,
            "porcentajeUtilidad" => $porcentajeUtilidad,
            "precioVentaNeto" => $precioVentaNeto,
            "PrecioVentaIva" => $precioVentaIva,
            "margenUtilidadPesos" => $margenUtilidadPesos,
            "comentarioItem" => $comentario,
        );
        $this->db->insert('mae_item', $data);

        return "ok";
    }

    function addItemSinFotoConImpuestoAdicionalConIva(
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
    ) {
        $data = array(
            "idGrupo" => $grupos,
            "idFamilia" => $familias,
            "secuencia" => $secuencia,
            "idProducto" => $idProducto,
            "codigoInterno" => $codigoInterno,
            "codigoBarra" =>  $codigoBarra,
            "codigoProveedor" => $codigoProveedor,
            "nmCorto" => $nmCorto,
            "nmLargo" => $nmLargo,
            "posicion" => $posicion,
            "idUnidad" => $unidad,
            "idTalla" => $talla,
            "idColor" => $color,
            "stkReposicion" => $stkReposicion,
            "stkCritico" => $stkCritico,
            "estadoStock" => $chek1,
            "estadoItem" => $chek2,
            "estadoPesable" => $chek3,
            "estadoBloqueo" => $chek4,
            "estadoExcento" => $chek5,
            "estadoImpuestoEspecifico" => $chek6,
            "estadoServicio" => $chek8,
            "mostrarPuntoVenta" => $chek7,
            "estadoPublicacionWeb" => $chek9,
            "descuentoMaximo" => $descuentoMaximo,
            "idImpuestoAdicional" => $idImpuestoAdicional,
            "porcentajeImpuestoAdicional" => $porcentajeImpuestoAdicional,
            "porcentajeImpuestoEspecifico" => $porcentajeImpuestoEspecifico,
            "porcentajeIva" => $porcentajeIva,
            "precioCostoNeto" => $costoNeto,
            "precioCostoIva" => $precioCostoIva,
            "porcentajeUtilidad" => $porcentajeUtilidad,
            "precioVentaNeto" => $precioVentaNeto,
            "PrecioVentaIva" => $precioVentaIva,
            "margenUtilidadPesos" => $margenUtilidadPesos,
            "comentarioItem" => $comentario,
        );
        $this->db->insert('mae_item', $data);

        return "ok";
    }

    function addItemSinFotoSinImpuestoAdicionalSinIva(
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
    ) {
        $data = array(
            "idGrupo" => $grupos,
            "idFamilia" => $familias,
            "secuencia" => $secuencia,
            "idProducto" => $idProducto,
            "codigoInterno" => $codigoInterno,
            "codigoBarra" =>  $codigoBarra,
            "codigoProveedor" => $codigoProveedor,
            "nmCorto" => $nmCorto,
            "nmLargo" => $nmLargo,
            "posicion" => $posicion,
            "idUnidad" => $unidad,
            "idTalla" => $talla,
            "idColor" => $color,
            "stkReposicion" => $stkReposicion,
            "stkCritico" => $stkCritico,
            "estadoStock" => $chek1,
            "estadoItem" => $chek2,
            "estadoPesable" => $chek3,
            "estadoBloqueo" => $chek4,
            "estadoExcento" => $chek5,
            "estadoImpuestoEspecifico" => $chek6,
            "estadoServicio" => $chek8,
            "mostrarPuntoVenta" => $chek7,
            "estadoPublicacionWeb" => $chek9,
            "descuentoMaximo" => $descuentoMaximo,
            "idImpuestoAdicional" => $idImpuestoAdicional,
            "porcentajeImpuestoAdicional" => $porcentajeImpuestoAdicional,
            "porcentajeImpuestoEspecifico" => $porcentajeImpuestoEspecifico,
            "porcentajeIva" => $porcentajeIva,
            "precioCostoNeto" => $costoNeto,
            "precioCostoIva" => $precioCostoIva,
            "porcentajeUtilidad" => $porcentajeUtilidad,
            "precioVentaNeto" => $precioVentaNeto,
            "PrecioVentaIva" => $precioVentaIva,
            "margenUtilidadPesos" => $margenUtilidadPesos,
            "comentarioItem" => $comentario,
        );
        $this->db->insert('mae_item', $data);

        return "ok";
    }

    function addItemSinFotoSinImpuestoAdicionalConIva(
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
    ) {
        $data = array(
            "idGrupo" => $grupos,
            "idFamilia" => $familias,
            "secuencia" => $secuencia,
            "idProducto" => $idProducto,
            "codigoInterno" => $codigoInterno,
            "codigoBarra" =>  $codigoBarra,
            "codigoProveedor" => $codigoProveedor,
            "nmCorto" => $nmCorto,
            "nmLargo" => $nmLargo,
            "posicion" => $posicion,
            "idUnidad" => $unidad,
            "idTalla" => $talla,
            "idColor" => $color,
            "stkReposicion" => $stkReposicion,
            "stkCritico" => $stkCritico,
            "estadoStock" => $chek1,
            "estadoItem" => $chek2,
            "estadoPesable" => $chek3,
            "estadoBloqueo" => $chek4,
            "estadoExcento" => $chek5,
            "estadoImpuestoEspecifico" => $chek6,
            "estadoServicio" => $chek8,
            "mostrarPuntoVenta" => $chek7,
            "estadoPublicacionWeb" => $chek9,
            "descuentoMaximo" => $descuentoMaximo,
            "idImpuestoAdicional" => $idImpuestoAdicional,
            "porcentajeImpuestoAdicional" => $porcentajeImpuestoAdicional,
            "porcentajeImpuestoEspecifico" => $porcentajeImpuestoEspecifico,
            "porcentajeIva" => $porcentajeIva,
            "precioCostoNeto" => $costoNeto,
            "precioCostoIva" => $precioCostoIva,
            "porcentajeUtilidad" => $porcentajeUtilidad,
            "precioVentaNeto" => $precioVentaNeto,
            "PrecioVentaIva" => $precioVentaIva,
            "margenUtilidadPesos" => $margenUtilidadPesos,
            "comentarioItem" => $comentario,
        );
        $this->db->insert('mae_item', $data);

        return "ok";
    }

    function addItemConFotoConImpuestoAdicionalSinIva(
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
    ) {
        $data = array(
            "idGrupo" => $grupos,
            "idFamilia" => $familias,
            "secuencia" => $secuencia,
            "idProducto" => $idProducto,
            "codigoInterno" => $codigoInterno,
            "codigoBarra" =>  $codigoBarra,
            "codigoProveedor" => $codigoProveedor,
            "nmCorto" => $nmCorto,
            "nmLargo" => $nmLargo,
            "posicion" => $posicion,
            "idUnidad" => $unidad,
            "idTalla" => $talla,
            "idColor" => $color,
            "stkReposicion" => $stkReposicion,
            "stkCritico" => $stkCritico,
            "estadoStock" => $chek1,
            "estadoItem" => $chek2,
            "estadoPesable" => $chek3,
            "estadoBloqueo" => $chek4,
            "estadoExcento" => $chek5,
            "estadoImpuestoEspecifico" => $chek6,
            "estadoServicio" => $chek8,
            "mostrarPuntoVenta" => $chek7,
            "estadoPublicacionWeb" => $chek9,
            "descuentoMaximo" => $descuentoMaximo,
            "idImpuestoAdicional" => $idImpuestoAdicional,
            "porcentajeImpuestoAdicional" => $porcentajeImpuestoAdicional,
            "porcentajeImpuestoEspecifico" => $porcentajeImpuestoEspecifico,
            "porcentajeIva" => $porcentajeIva,
            "precioCostoNeto" => $costoNeto,
            "precioCostoIva" => $precioCostoIva,
            "porcentajeUtilidad" => $porcentajeUtilidad,
            "precioVentaNeto" => $precioVentaNeto,
            "PrecioVentaIva" => $precioVentaIva,
            "margenUtilidadPesos" => $margenUtilidadPesos,
            "comentarioItem" => $comentario,
            "rutaImagen" => $ruta_imagen
        );
        $this->db->insert('mae_item', $data);

        return "ok";
    }

    function addItemConFotoConImpuestoAdicionalConIva(
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
    ) {
        $data = array(
            "idGrupo" => $grupos,
            "idFamilia" => $familias,
            "secuencia" => $secuencia,
            "idProducto" => $idProducto,
            "codigoInterno" => $codigoInterno,
            "codigoBarra" =>  $codigoBarra,
            "codigoProveedor" => $codigoProveedor,
            "nmCorto" => $nmCorto,
            "nmLargo" => $nmLargo,
            "posicion" => $posicion,
            "idUnidad" => $unidad,
            "idTalla" => $talla,
            "idColor" => $color,
            "stkReposicion" => $stkReposicion,
            "stkCritico" => $stkCritico,
            "estadoStock" => $chek1,
            "estadoItem" => $chek2,
            "estadoPesable" => $chek3,
            "estadoBloqueo" => $chek4,
            "estadoExcento" => $chek5,
            "estadoImpuestoEspecifico" => $chek6,
            "estadoServicio" => $chek8,
            "mostrarPuntoVenta" => $chek7,
            "estadoPublicacionWeb" => $chek9,
            "descuentoMaximo" => $descuentoMaximo,
            "idImpuestoAdicional" => $idImpuestoAdicional,
            "porcentajeImpuestoAdicional" => $porcentajeImpuestoAdicional,
            "porcentajeImpuestoEspecifico" => $porcentajeImpuestoEspecifico,
            "porcentajeIva" => $porcentajeIva,
            "precioCostoNeto" => $costoNeto,
            "precioCostoIva" => $precioCostoIva,
            "porcentajeUtilidad" => $porcentajeUtilidad,
            "precioVentaNeto" => $precioVentaNeto,
            "PrecioVentaIva" => $precioVentaIva,
            "margenUtilidadPesos" => $margenUtilidadPesos,
            "comentarioItem" => $comentario,
            "rutaImagen" => $ruta_imagen
        );
        $this->db->insert('mae_item', $data);

        return "ok";
    }

    function addItemConFotoSinImpuestoAdicionalSinIva(
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
    ) {
        $data = array(
            "idGrupo" => $grupos,
            "idFamilia" => $familias,
            "secuencia" => $secuencia,
            "idProducto" => $idProducto,
            "codigoInterno" => $codigoInterno,
            "codigoBarra" =>  $codigoBarra,
            "codigoProveedor" => $codigoProveedor,
            "nmCorto" => $nmCorto,
            "nmLargo" => $nmLargo,
            "posicion" => $posicion,
            "idUnidad" => $unidad,
            "idTalla" => $talla,
            "idColor" => $color,
            "stkReposicion" => $stkReposicion,
            "stkCritico" => $stkCritico,
            "estadoStock" => $chek1,
            "estadoItem" => $chek2,
            "estadoPesable" => $chek3,
            "estadoBloqueo" => $chek4,
            "estadoExcento" => $chek5,
            "estadoImpuestoEspecifico" => $chek6,
            "estadoServicio" => $chek8,
            "mostrarPuntoVenta" => $chek7,
            "estadoPublicacionWeb" => $chek9,
            "descuentoMaximo" => $descuentoMaximo,
            "idImpuestoAdicional" => $idImpuestoAdicional,
            "porcentajeImpuestoAdicional" => $porcentajeImpuestoAdicional,
            "porcentajeImpuestoEspecifico" => $porcentajeImpuestoEspecifico,
            "porcentajeIva" => $porcentajeIva,
            "precioCostoNeto" => $costoNeto,
            "precioCostoIva" => $precioCostoIva,
            "porcentajeUtilidad" => $porcentajeUtilidad,
            "precioVentaNeto" => $precioVentaNeto,
            "PrecioVentaIva" => $precioVentaIva,
            "margenUtilidadPesos" => $margenUtilidadPesos,
            "comentarioItem" => $comentario,
            "rutaImagen" => $ruta_imagen
        );
        $this->db->insert('mae_item', $data);

        return "ok";
    }

    function addItemConFotoSinImpuestoAdicionalConIva(
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
    ) {
        $data = array(
            "idGrupo" => $grupos,
            "idFamilia" => $familias,
            "secuencia" => $secuencia,
            "idProducto" => $idProducto,
            "codigoInterno" => $codigoInterno,
            "codigoBarra" =>  $codigoBarra,
            "codigoProveedor" => $codigoProveedor,
            "nmCorto" => $nmCorto,
            "nmLargo" => $nmLargo,
            "posicion" => $posicion,
            "idUnidad" => $unidad,
            "idTalla" => $talla,
            "idColor" => $color,
            "stkReposicion" => $stkReposicion,
            "stkCritico" => $stkCritico,
            "estadoStock" => $chek1,
            "estadoItem" => $chek2,
            "estadoPesable" => $chek3,
            "estadoBloqueo" => $chek4,
            "estadoExcento" => $chek5,
            "estadoImpuestoEspecifico" => $chek6,
            "estadoServicio" => $chek8,
            "mostrarPuntoVenta" => $chek7,
            "estadoPublicacionWeb" => $chek9,
            "descuentoMaximo" => $descuentoMaximo,
            "idImpuestoAdicional" => $idImpuestoAdicional,
            "porcentajeImpuestoAdicional" => $porcentajeImpuestoAdicional,
            "porcentajeImpuestoEspecifico" => $porcentajeImpuestoEspecifico,
            "porcentajeIva" => $porcentajeIva,
            "precioCostoNeto" => $costoNeto,
            "precioCostoIva" => $precioCostoIva,
            "porcentajeUtilidad" => $porcentajeUtilidad,
            "precioVentaNeto" => $precioVentaNeto,
            "PrecioVentaIva" => $precioVentaIva,
            "margenUtilidadPesos" => $margenUtilidadPesos,
            "comentarioItem" => $comentario,
            "rutaImagen" => $ruta_imagen
        );
        $this->db->insert('mae_item', $data);

        return "ok";
    }
}
