<!DOCTYPE html>

<html>



<head>



    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>PymeSoft | Soluciones integrales para pequeñas y grandes empresas.</title>

    <link href="<?php echo base_url() ?>lib/css/toastr.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>lib/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet">
   <link href="<?php echo base_url() ?>lib/css/sweetalert.css" rel="stylesheet">


    <link href="<?php echo base_url() ?>lib/css/animate.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>lib/css/style.css" rel="stylesheet">

    



</head>





<body class="canvas-menu">



    <div id="wrapper">



        <nav class="navbar-default navbar-static-side" role="navigation">



            <div class="sidebar-collapse">

                <a class="close-canvas-menu"><i class="fa fa-times"></i></a>

                <ul class="nav metismenu" id="side-menu">

                    <li class="nav-header">

                        <img alt="image" class="img-responsive" src="<?php base_url() ?>lib/img/logo-negro.jpg" />

                    </li>

                    <li>

                        <a href="<?php echo base_url() ?>"><i class="fa fa-diamond"></i> <span class="nav-label">Inicio</span></a>

                    </li>

                    <li>

                        <a ><i class="fa fa-th-large"></i> <span class="nav-label">Empresas</span> <span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">

                            <li>

                                <a ><i class="fa fa-th-large"></i> <span class="nav-label">Configuración</span> <span class="fa arrow"></span></a>

                                <ul class="nav nav-second-level collapse">

                                    <li><a href="<?php echo base_url() ?>Empresa">Mantención</a></li>



                                </ul>

                            </li>



                        </ul>

                    </li>

                    <li>

                        <a ><i class="fa fa-th-large"></i> <span class="nav-label">Inventario</span> <span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">



                            <li>

                                <a ><i class="fa fa-th-large"></i> <span class="nav-label">Configuración</span> <span class="fa arrow"></span></a>

                                <ul class="nav nav-second-level collapse">

                                    <li><a href="<?php echo base_url() ?>Proveedores">Proveedores</a></li>

                                    <li><a href="<?php echo base_url() ?>Maestro_de_Items">Maestros Items</a></li>

                                    <li><a href="<?php echo base_url() ?>Centros_de_Costos">Centros de Costos</a></li>

                                    <li><a href="<?php echo base_url() ?>Grupos">Grupos</a></li>

                                    <li><a href="<?php echo base_url() ?>Familias">Familias</a></li>

                                    <li><a href="<?php echo base_url() ?>Tipo_Movimientos">Tipo Movimientos</a></li>

                                    <li><a href="<?php echo base_url() ?>Bodegas">Bodegas</a></li>

                                    <li><a href="<?php echo base_url() ?>Unidades">Unidades</a></li>

                                </ul>

                            </li>

                            <li>

                                <a ><i class="fa fa-th-large"></i> <span class="nav-label">Movimientos</span> <span class="fa arrow"></span></a>

                                <ul class="nav nav-second-level collapse">

                                    <li><a href="<?php echo base_url() ?>Orden_de_Compra">Orden de Compra</a></li>

                                    <li><a href="<?php echo base_url() ?>Ingreso_Mercaderia">Ingreso Mercaderia</a></li>

                                    <li><a href="<?php echo base_url() ?>Salida_Nota_de_Credito">Salida Nota de Credito</a></li>

                                    <li><a href="<?php echo base_url() ?>Traspaso_Mercaderia">Traspaso Mercaderia</a></li>

                                    <li><a href="<?php echo base_url() ?>Otros_Movimientos">Otros Movimientos</a></li>

                                    <li><a href="<?php echo base_url() ?>Toma_Inventario">Toma Inventario</a></li>

                                    <li><a href="<?php echo base_url() ?>Consulta_Items">Consulta Items</a></li>

                                </ul>

                            </li>

                            <li>

                                <a ><i class="fa fa-th-large"></i> <span class="nav-label">Cuentas x Pagar</span> <span class="fa arrow"></span></a>

                                <ul class="nav nav-second-level collapse">

                                    <li><a href="<?php echo base_url() ?>Pago_Proveedores">Pago Proveedores</a></li>

                                    <li><a href="<?php echo base_url() ?>Cartola_Proveedores">Cartola Proveedores</a></li>

                                    <li><a href="<?php echo base_url() ?>Consulta_Orden_Compra">Consulta Orden Compra</a></li>

                                    <li><a href="<?php echo base_url() ?>Consulta_Documentos_Compra">Consulta Documentos Compra</a></li>

                                    <li><a href="<?php echo base_url() ?>Consulta_Pagos_Proveedores">Consulta Pagos Proveedores</a></li>

                                </ul>

                            </li>

                            <li>

                                <a href="<?php echo base_url() ?>Reportes_Inventario"><i class="fa fa-diamond"></i> <span class="nav-label">Reportes</span></a>

                            </li>



                        </ul>

                    </li>

                    <li>

                        <a ><i class="fa fa-th-large"></i> <span class="nav-label">Ventas</span> <span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">



                            <li>

                                <a ><i class="fa fa-th-large"></i> <span class="nav-label">Configuración</span> <span class="fa arrow"></span></a>

                                <ul class="nav nav-second-level collapse">

                                    <li><a href="<?php echo base_url() ?>Clientes">Clientes</a></li>

                                    <li><a href="<?php echo base_url() ?>Cajas">Cajas</a></li>

                                    <li><a href="<?php echo base_url() ?>Tipos_Documentos">Tipos Documentos</a></li>

                                    <li><a href="<?php echo base_url() ?>Tipos_Ventas">Tipos Ventas</a></li>

                                    <li><a href="<?php echo base_url() ?>Formas_de_Pago">Formas de Pagos</a></li>

                                    <li><a href="<?php echo base_url() ?>Clasificacion_Clientes">Clasificacion Clientes</a></li>

                                    <li><a href="<?php echo base_url() ?>Listas_de_Precios">Listas de Precios</a></li>

                                    <li><a href="<?php echo base_url() ?>Ciudades">Ciudades</a></li>

                                    <li><a href="<?php echo base_url() ?>Comunas">Comunas</a></li>

                                    <li><a href="<?php echo base_url() ?>Notas">Notas</a></li>

                                </ul>

                            </li>

                            <li>

                                <a><i class="fa fa-th-large"></i> <span class="nav-label">Movimientos</span> <span class="fa arrow"></span></a>

                                <ul class="nav nav-second-level collapse">

                                    <li><a href="<?php echo base_url() ?>Cotizaciones">Cotizaciones</a></li>

                                    <li><a href="<?php echo base_url() ?>Crear_Venta">Crear Venta</a></li>

                                    <li><a href="<?php echo base_url() ?>Cancelaciones_y_Abonos">Cancelaciones y Abonos</a></li>



                                </ul>

                            </li>

                            <li>

                                <a><i class="fa fa-th-large"></i> <span class="nav-label">Cuentas x Cobrar</span> <span class="fa arrow"></span></a>

                                <ul class="nav nav-second-level collapse">

                                    <li><a href="<?php echo base_url() ?>Pago_Clientes">Pago Clientes</a></li>

                                    <li><a href="<?php echo base_url() ?>Cartola_Clientes">Cartola Clientes</a></li>

                                    <li><a href="<?php echo base_url() ?>Consulta_Cotizaciones">Consulta Cotizaciones</a></li>

                                    <li><a href="<?php echo base_url() ?>Consulta_Documentos_Venta">Consulta Documentos Venta</a></li>

                                    <li><a href="<?php echo base_url() ?>Consulta_Pagos_Clientes">Consulta Pagos Clientes</a></li>

                                </ul>

                            </li>

                            <li>

                                <a href="<?php echo base_url() ?>Reportes_Ventas"><i class="fa fa-diamond"></i> <span class="nav-label">Reportes</span></a>

                            </li>



                        </ul>

                    </li>

                    <li>

                        <a><i class="fa fa-th-large"></i> <span class="nav-label">Cajas</span> <span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">



                            <li>

                                <a><i class="fa fa-th-large"></i> <span class="nav-label">Configuración</span> <span class="fa arrow"></span></a>

                                <ul class="nav nav-second-level collapse">

                                    <li><a href="<?php echo base_url() ?>Ingresos_y_Egresos">Ingresos y Egresos</a></li>



                                </ul>

                            </li>

                            <li>

                                <a><i class="fa fa-th-large"></i> <span class="nav-label">Movimientos</span> <span class="fa arrow"></span></a>

                                <ul class="nav nav-second-level collapse">

                                    <li><a href="<?php echo base_url() ?>Apertura">Apertura</a></li>

                                    <li><a href="<?php echo base_url() ?>Ingresos">Ingreso</a></li>

                                    <li><a href="<?php echo base_url() ?>Egresos">Egresos</a></li>

                                    <li><a href="<?php echo base_url() ?>Cierre">Cierre</a></li>

                                    <li><a href="<?php echo base_url() ?>Re_Imprime">Re-Imprime</a></li>

                                </ul>

                            </li>

                            <li>

                                <a href="<?php echo base_url() ?>Reportes_Cajas"><i class="fa fa-diamond"></i> <span class="nav-label">Reportes</span></a>

                            </li>



                        </ul>

                    </li>

                    <li>

                        <a><i class="fa fa-th-large"></i> <span class="nav-label">Cuentas Corrientes</span> <span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">



                            <li>

                                <a><i class="fa fa-th-large"></i> <span class="nav-label">Configuración</span> <span class="fa arrow"></span></a>

                                <ul class="nav nav-second-level collapse">

                                    <li><a href="<?php echo base_url() ?>Crear_Cuentas_Corrientes">Crear Cuentas Corrientes</a></li>

                                    <li><a href="<?php echo base_url() ?>Conceptos_Bancarios">Conceptos Bancarios</a></li>

                                    <li><a href="<?php echo base_url() ?>Plazas">Plazas</a></li>

                                    <li><a href="<?php echo base_url() ?>Bancos">Bancos</a></li>



                                </ul>

                            </li>

                            <li>

                                <a><i class="fa fa-th-large"></i> <span class="nav-label">Movimientos</span> <span class="fa arrow"></span></a>

                                <ul class="nav nav-second-level collapse">

                                    <li><a href="<?php echo base_url() ?>Cuenta_Corriente">Cuenta Corriente</a></li>

                                    <li><a href="<?php echo base_url() ?>Consulta_Documentos_Emitidos">Consulta Documentos Emitidos</a></li>

                                    <li><a href="<?php echo base_url() ?>Consulta_Documentos_Recibidos">Consulta Documentos Recibidos</a></li>

                                </ul>

                            </li>

                            <li>

                                <a href="<?php echo base_url() ?>Reportes_Cuentas_Corrientes"><i class="fa fa-diamond"></i> <span class="nav-label">Reportes</span></a>

                            </li>



                        </ul>

                    </li>

                    <li>

                        <a><i class="fa fa-th-large"></i> <span class="nav-label">Administracion</span> <span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">



                            <li>

                                <a><i class="fa fa-th-large"></i> <span class="nav-label">Configuración</span> <span class="fa arrow"></span></a>

                                <ul class="nav nav-second-level collapse">

                                    <li><a href="<?php echo base_url() ?>Usuarios">Usuarios</a></li>

                                    <li><a href="<?php echo base_url() ?>Opciones">Opciones</a></li>

                                    <li><a href="<?php echo base_url() ?>Perfiles">Perfiles</a></li>

                                    <li><a href="<?php echo base_url() ?>Accesos">Accesos</a></li>

                                    <li><a href="<?php echo base_url() ?>Trabajadores">Trabajadores</a></li>

                                    <li><a href="<?php echo base_url() ?>Areas_Departamentos">Areas / Departamentos</a></li>

                                    <li><a href="<?php echo base_url() ?>Cargo_Trabajadores">Cargo Trabajadores</a></li>

                                </ul>

                            </li>





                        </ul>

                    </li>

                    <li>

                        <a href="<?php echo base_url() ?>Facturacion_Electronica"><i class="fa fa-diamond"></i> <span class="nav-label">Facturacion Electronica</span></a>

                    </li>

		              <li>
                        <select class="form-control" required name="provincia" id="getEmpresasSesion">

                        </select>
                    </li>

                </ul>



            </div>

        </nav>