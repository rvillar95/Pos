<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//////////////////////////////VISTAS//////////////////////////////

//Empresas
$route['Empresa'] = 'welcome/empresa';

//Inventario
////Configuraciones
$route['Proveedores'] = 'welcome/Proveedores';
$route['Maestro_de_Items'] = 'welcome/Maestro_de_Items';
$route['Centros_de_Costos'] = 'welcome/Centros_de_Costos';
$route['Grupos'] = 'welcome/Grupos';
$route['Familias'] = 'welcome/Familias';
$route['Tipo_Movimientos'] = 'welcome/Tipo_Movimientos';
$route['Bodegas'] = 'welcome/Bodegas';
$route['Unidades'] = 'welcome/Unidades';
////Movimientos
$route['Orden_de_Compra'] = 'welcome/Orden_de_Compra';
$route['Ingreso_Mercaderia'] = 'welcome/Ingreso_Mercaderia';
$route['Salida_Nota_de_Credito'] = 'welcome/Salida_Nota_de_Credito';
$route['Traspaso_Mercaderia'] = 'welcome/Traspaso_Mercaderia';
$route['Otros_Movimientos'] = 'welcome/Otros_Movimientos';
$route['Toma_Inventario'] = 'welcome/Toma_Inventario';
$route['Consulta_Items'] = 'welcome/Consulta_Items';
////Cuentas X PAGAR
$route['Pago_Proveedores'] = 'welcome/Pago_Proveedores';
$route['Cartola_Proveedores'] = 'welcome/Cartola_Proveedores';
$route['Consulta_Orden_Compra'] = 'welcome/Consulta_Orden_Compra';
$route['Consulta_Documentos_Compra'] = 'welcome/Consulta_Documentos_Compra';
$route['Consulta_Pagos_Proveedores'] = 'welcome/Consulta_Pagos_Proveedores';
////Reportes
$route['Reportes_Inventario'] = 'welcome/Reportes_Inventario';

//Ventas
////Configuraciones
$route['Clientes'] = 'welcome/Clientes';
$route['Cajas'] = 'welcome/Cajas';
$route['Tipos_Documentos'] = 'welcome/Tipos_Documentos';
$route['Tipos_Ventas'] = 'welcome/Tipos_Ventas';
$route['Formas_de_Pago'] = 'welcome/Formas_de_Pago';
$route['Clasificacion_Clientes'] = 'welcome/Clasificacion_Clientes';
$route['Listas_de_Precios'] = 'welcome/Listas_de_Precios';
$route['Ciudades'] = 'welcome/Ciudades';
$route['Comunas'] = 'welcome/Comunas';
$route['Notas'] = 'welcome/Notas';
////Movimientos
$route['Cotizaciones'] = 'welcome/Cotizaciones';
$route['Crear_Venta'] = 'welcome/Crear_Venta';
$route['Cancelaciones_y_Abonos'] = 'welcome/Cancelaciones_y_Abonos';
////Cuentas X Cobrar
$route['Pago_Clientes'] = 'welcome/Pago_Clientes';
$route['Cartola_Clientes'] = 'welcome/Cartola_Clientes';
$route['Consulta_Cotizaciones'] = 'welcome/Consulta_Cotizaciones';
$route['Consulta_Documentos_Venta'] = 'welcome/Consulta_Documentos_Venta';
$route['Consulta_Pagos_Clientes'] = 'welcome/Consulta_Pagos_Clientes';
////Reportes
$route['Reportes_Ventas'] = 'welcome/Reportes_Ventas';


//Cajas
////Configuración
$route['Ingresos_y_Egresos'] = 'welcome/Ingresos_y_Egresos';
////Movimientos
$route['Apertura'] = 'welcome/Apertura';
$route['Ingresos'] = 'welcome/Ingresos';
$route['Egresos'] = 'welcome/Egresos';
$route['Cierre'] = 'welcome/Cierre';
$route['Re_Imprime'] = 'welcome/Re_Imprime';
////Reportes
$route['Reportes_Cajas'] = 'welcome/Reportes_Cajas';


//Cuentas Corrientes
////Configuracion
$route['Crear_Cuentas_Corrientes'] = 'welcome/Crear_Cuentas_Corrientes';
$route['Conceptos_Bancarios'] = 'welcome/Conceptos_Bancarios';
$route['Plazas'] = 'welcome/Plazas';
$route['Bancos'] = 'welcome/Bancos';
////Movimientos
$route['Cuenta_Corriente'] = 'welcome/Cuenta_Corriente';
$route['Consulta_Documentos_Emitidos'] = 'welcome/Consulta_Documentos_Emitidos';
$route['Consulta_Documentos_Recibidos'] = 'welcome/Consulta_Documentos_Recibidos';
////Reportes
$route['Reportes_Cuentas_Corrientes'] = 'welcome/Reportes_Cuentas_Corrientes';

//Administracion
////Configuracion
$route['Usuarios'] = 'welcome/Usuarios';
$route['Opciones'] = 'welcome/Opciones';
$route['Perfiles'] = 'welcome/Perfiles';
$route['Accesos'] = 'welcome/Accesos';
$route['Trabajadores'] = 'welcome/Trabajadores';
$route['Areas_Departamentos'] = 'welcome/Areas_Departamentos';
$route['Cargo_Trabajadores'] = 'welcome/Cargo_Trabajadores';

//FACTURACION ELECTRONICA
$route['Facturacion_Electronica'] = 'welcome/Facturacion_Electronica';



//PAR
$route['addComuna'] = 'ParController/addComuna';
$route['addProvincia'] = 'ParController/addProvincia';
$route['verComunas'] = 'ParController/verComunas';
$route['verProvincias'] = 'ParController/verProvincias';
$route['verRegiones'] = 'ParController/verRegiones';
$route['getProvincias'] = 'ParController/getProvincias';
$route['getProvinciasEmpresa'] = 'ParController/getProvinciasEmpresa';
$route['getComunasEmpresa'] = 'ParController/getComunasEmpresa';
$route['addEmpresa'] = 'ParController/addEmpresa';
$route['getEmpresas'] = 'ParController/getEmpresas';
$route['getSucursales'] = 'ParController/getSucursales';
$route['addSucursal'] = 'ParController/addSucursal';
$route['verEmpresas'] = 'ParController/verEmpresas';
$route['getInfoSucursal'] = 'ParController/getInfoSucursal';
$route['editarSucursal'] = 'ParController/editarSucursal';
$route['eliminarSucursal'] = 'ParController/eliminarSucursal';
$route['getInfoEmpresa'] = 'ParController/getInfoEmpresa';
$route['editarEmpresa'] = 'ParController/editarEmpresa';
$route['eliminarEmpresa'] = 'ParController/eliminarEmpresa';
$route['getImpuesto'] = 'ParController/getImpuesto';
$route['getColor'] = 'ParController/getColor';
$route['getTalla'] = 'ParController/getTalla';
$route['getUnidad'] = 'ParController/getUnidad';
$route['getGrupo'] = 'ParController/getGrupo';
$route['getFamilia'] = 'ParController/getFamilia';
$route['getImpuestoAdicional'] = 'ParController/getImpuestoAdicional';
$route['addItem'] = 'ParController/addItem';

//02-10-2020
$route["Login"] = 'Welcome/login';
$route["iniciarSesion"] = 'Welcome/iniciarSesion';
$route["MenuVenta"] = 'Welcome/menuventa';
$route["getProductos"] = 'Welcome/getProductos';
$route["getProductosXbusqueda"] = 'Welcome/getProductosXbusqueda';
$route["addProducto"] = 'Welcome/addProducto';
$route["getCarro"] = 'Welcome/getCarro';
$route["eliminarProducto"] = 'Welcome/eliminarProducto';
$route["finalizarCompra"] = 'Welcome/finalizarCompra';
$route["getDocumentos"] = 'Welcome/getDocumentos';
$route["getNombreCliente"] = 'Welcome/getNombreCliente';
$route["rescatarDocumento"] = 'Welcome/rescatarDocumento';
$route["getTipoDocumento"] = 'Welcome/getTipoDocumento';
$route["getTipoPago"] = 'Welcome/getTipoPago';
$route["vaciarCarro"] = 'Welcome/vaciarCarro';
$route["getVendedor"] = 'Welcome/getVendedor';

$route["consultas"] = 'Welcome/consultas';


