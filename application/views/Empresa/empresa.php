<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Salir
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Empresas</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Inicio</a>
                </li>
                <li class="active">
                    <strong>Empresas</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content  animated fadeInRight article">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">


                            <div class="col-lg-12">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Empresas</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Sucursales</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active">
                                            <div class="panel-body">
                                                <div class="ibox float-e-margins">
                                                    <div class="ibox-title" style="background-color: black;">
                                                        <h5 style="color: white">Tabla Empresas</h5>
                                                    </div>
                                                    <div class="ibox-content" style="padding: 0px;">

                                                        <div class="row" style="padding: 20px;">
                                                            <h2><strong>Registros de Empresas</strong></h2>
                                                            <div class="table-responsive">
                                                                <a data-toggle="modal" data-target="#myModal1" class="btn btn-info">Agregar Empresa <i class="fa fa-plus-circle"></i></a>
                                                                <table id="tablaEmpresas" class="table table-striped table-bordered table-hover tablaEmpresas">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Rut</th>
                                                                            <th>Nombre</th>
                                                                            <th>Giro</th>
                                                                            <th>Dirección</th>
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="ibox float-e-margins">
                                                    <div class="ibox-title" style="background-color: black;">
                                                        <h5 style="color: white">Tabla Sucursales</h5>
                                                    </div>
                                                    <div class="ibox-content" style="padding: 0px;">

                                                        <div class="row" style="padding: 20px;">
                                                            <h2><strong>Registros de Sucursales</strong></h2>
                                                            <div class="table-responsive">
                                                                <a data-toggle="modal" data-target="#myModal2" class="btn btn-info">Agregar Sucursales <i class="fa fa-plus-circle"></i></a>
                                                                <table id="tablaSucursales" class="table table-striped table-bordered table-hover tablaSucursales">

                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Nombre</th>
                                                                            <th>Correo</th>
                                                                            <th>Direccion</th>
                                                                            <th>Empresa Vinculada</th>
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="footer">
        <div>
            <strong>Copyright</strong> Soluciones Villar &copy; 2018-2020
        </div>
    </div>

</div>
</div>


<div class="modal inmodal fade in" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 16px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ibox float-e-margins">
                                            <div class="ibox-title" style="background-color: black;">
                                                <h5 style="color: white">Agregar Empresa</h5>
                                            </div>
                                            <div class="ibox-content" style="padding: 0px;">
                                                <div class="row" style="padding: 20px;">
                                                    <div class="col-md-12">
                                                        <br />
                                                        <form id="prueba" name="login" method="post" enctype="multipart/form-data">
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Rut Empresa</label>
                                                                <input type="text" required name="rutEmpresa" maxlength="100" placeholder="Ingrese Rut Empresa" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Nombre Empresa</label>
                                                                <input type="text" required name="nombreEmpresa" maxlength="100" placeholder="Ingrese Nombre Empresa" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Nombre Fantasia Empresa</label>
                                                                <input type="text" required name="nombreFantasiaEmpresa" maxlength="100" placeholder="Ingrese Nombre Fantasia Empresa" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Giro Empresa</label>
                                                                <input type="text" required name="giroEmpresa" maxlength="100" placeholder="Ingrese Giro Empresa" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Dirección Empresa</label>
                                                                <input type="text" required name="direccionEmpresa" maxlength="100" placeholder="Ingrese Dirección Empresa" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label for="getRegiones">Región</label>
                                                                <select class="form-control" required name="region" id="getRegiones">

                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label for="getProvincias">Provincia</label>
                                                                <select class="form-control" required name="provincia" id="getProvincias">
                                                                    <option disabled selected>Seleccione la Provincia</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label for="getComunas">Comuna</label>
                                                                <select class="form-control" required name="comuna" id="getComunas">
                                                                    <option disabled selected>Seleccione la Comuna</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Numeros de Telefono</label>
                                                                <input type="text" required name="num1" maxlength="100" placeholder="Ingrese Numero 1" class="form-control">
                                                                <input type="text" name="num2" maxlength="100" placeholder="Ingrese Numero 2" class="form-control">
                                                                <input type="text" name="num3" maxlength="100" placeholder="Ingrese Numero 3" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Sitio Web Empresa</label>
                                                                <input type="text" name="sitioWebEmpresa" placeholder="Ingrese Sitio Web Empresa" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Correo Empresa</label>
                                                                <input type="email" required name="correoEmpresa" placeholder="Ingrese Sitio Web Empresa" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>URL Logo Empresa</label>
                                                                <input type="file" name="foto" placeholder="Ingrese URL Logo Empresa" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Comentario Empresa</label>
                                                                <textarea class="form-control" placeholder="Ingrese algun comentario de la empresa" maxlength="100" name="comentarioEmpresa" cols="30" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Resolucion SII</label>
                                                                <input type="text" name="resolucionEmpresa" maxlength="100" placeholder="Resolucion SII" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Fecha Resolucion</label>
                                                                <input type="date" name="fechaResolucionEmpresa" class="form-control">
                                                            </div>

                                                            <div class="form-group form-group col-lg-12 col-md-12 col-sm-4 col-xs-12"><button type="submit" id="btnAgregarEmpresa" class="btn btn-primary" style="background-color: black; color: white; ">Agregar Empresa</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade in" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 16px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ibox float-e-margins">
                                            <div class="ibox-title" style="background-color: black;">
                                                <h5 style="color: white">Agregar Sucursal</h5>
                                            </div>
                                            <div id="form-sucursal" class="ibox-content" style="padding: 0px;">
                                                <div class="row" style="padding: 20px;">
                                                    <div class="col-md-12">
                                                        <br />
                                                        <form id="form_Sucursal" name="login" method="post" enctype="multipart/form-data">
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Nombre Sucursal</label>
                                                                <input type="text" required name="nombreSucursal" maxlength="100" placeholder="Ingrese Nombre Empresa" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Dirección Sucursal</label>
                                                                <input type="text" required name="direccionSucursal" maxlength="100" placeholder="Ingrese Dirección Sucursal" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Numeros de Telefono</label>
                                                                <input type="text" required name="nume1" maxlength="100" placeholder="Ingrese Numero 1" class="form-control">
                                                                <input type="text" name="nume2" maxlength="100" placeholder="Ingrese Numero 2" class="form-control">
                                                                <input type="text" name="nume3" maxlength="100" placeholder="Ingrese Numero 3" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label for="getRegiones">Región</label>
                                                                <select class="form-control" required name="region2" id="getRegiones2">

                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label for="getProvincias">Provincia</label>
                                                                <select class="form-control" required name="provincia2" id="getProvincias2">
                                                                    <option disabled selected>Seleccione la Provincia</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label for="getComunas">Comuna</label>
                                                                <select class="form-control" required name="comuna2" id="getComunas2">
                                                                    <option disabled selected>Seleccione la Comuna</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label for="getComunas">Empresa Asociada</label>
                                                                <select class="form-control" required name="empresa" id="getEmpresas">
                                                                    <option disabled selected>Seleccione la Empresa</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Correo Sucursal</label>
                                                                <input type="email" required name="correoSucursal" placeholder="Ingrese Correo Sucursal" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Comentario Sucursal</label>
                                                                <textarea class="form-control" placeholder="Ingrese algun comentario de la Sucursal" maxlength="100" name="comentarioSucursal" cols="30" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group form-group col-lg-12 col-md-12 col-sm-4 col-xs-12"><button type="submit" id="btnAgregarSucursal" name="btnAgregarSucursal" class="btn btn-primary" style="background-color: black; color: white; ">Agregar Sucursal</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade in" id="myModal3" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 16px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div id="info-sucursal" class="ibox-content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade in" id="myModal4" tabindex="-1" role="dialog" aria-hidden="true" style="display: none; padding-right: 16px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div id="info-empresa" class="ibox-content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo base_url() ?>lib/js/funciones.js"></script>
<script src="<?php echo base_url() ?>lib/js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url() ?>lib/js/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>lib/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>lib/js/jquery.metisMenu.js"></script>
<script src="<?php echo base_url() ?>lib/js/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url() ?>lib/js/inspinia.js"></script>
<script src="<?php echo base_url() ?>lib/js/pace.min.js"></script>

<!-- TOAST -->
<script src="<?php echo base_url() ?>lib/js/toastr.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>lib/js/sweetalert.min.js" type="text/javascript"></script>
<script>
    $('body.canvas-menu .sidebar-collapse').slimScroll({
        height: '100%',
        railOpacity: 0.9
    });
</script>
<script>
    $(document).ready(function() {
        getRegionesEmpresa();
        getRegionesSucursal();
        getEmpresas();



        $("#getRegiones").change(function(e) {
            e.preventDefault();
            getProvinciasEmpresa();
        });

        $("#getProvincias").change(function(e) {
            e.preventDefault();
            getComunasEmpresa();
        });

        $("#getRegiones2").change(function(e) {
            e.preventDefault();
            getProvinciasSucursal();
        });

        $("#getProvincias2").change(function(e) {
            e.preventDefault();
            getComunasSucursal();
        });

        $("body").on("change", "#getRegiones3", function(e) {
            e.preventDefault();
            getProvinciasSucursalEdit();
        });

        $("body").on("change", "#getProvincias3", function(e) {
            e.preventDefault();
            getComunasSucursalEdit();
        });

        $("body").on("change", "#getRegiones4", function(e) {
            e.preventDefault();
            getProvinciasEmpresaEdit();
        });

        $("body").on("change", "#getProvincias4", function(e) {
            e.preventDefault();
            getComunasEmpresaEdit();
        });


        $("body").on("click", "#eliminarSucursal", function(e) {
            e.preventDefault();
            var id = $(this).parent().parent().children()[0];

            swal({
                title: "Esta usted seguro?",
                text: "Podria no recuperar los datos borrados!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, deseo Eliminar!",
                closeOnConfirm: false
            }, function() {
                eliminarSucursal($(id).text());
                swal("Eliminada!", "La sucursal a sido eliminada.", "success");
                var table = $('#tablaSucursales').DataTable();
                table.ajax.reload(function(json) {
                    $('#eliminarSucursal').val(json.lastInput);
                });
            });

        });

        $("#getEmpresasSesion").change(function(e) {
            e.preventDefault();
            postEmpresa();
        });

        function eliminarEmpresa(id) {
            var id = id;
            var si = "si";
            var no = "no";
            $.ajax({
                url: 'eliminarEmpresa',
                type: 'POST',
                dataType: 'json',
                data: {
                    "id": id
                }
            }).then(function(msg) {
                if (msg.msg == "ok") {
                    swal("Eliminada!", "La empresa a sido eliminada.", "success");
                    var table = $('#tablaEmpresas').DataTable();
                    table.ajax.reload(function(json) {
                        $('#eliminarEmpresa').val(json.lastInput);
                    });
                } else {
                    swal("Error!", "La empresa tiene sucursales relacionadas.", "warning");
                }
            });

        }

        $("body").on("click", "#eliminarEmpresa", function(e) {
            e.preventDefault();
            var id = $(this).parent().parent().children()[0];

            swal({
                title: "Esta usted seguro?",
                text: "Podria no recuperar los datos borrados!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, deseo Eliminar!",
                closeOnConfirm: false
            }, function() {
                eliminarEmpresa($(id).text());
            });

        });


        $("#pruebaEmpresa").click(function(e) {
            e.preventDefault();
            getIdEmpresa();
        });


        $("body").on("click", "#btnInfoSucursal", function(e) {
            e.preventDefault();
            var id = $(this).parent().parent().children()[0];
            getInfoSucursal($(id).text());

        });

        $("body").on("click", "#btnInfoEmpresa", function(e) {
            e.preventDefault();
            var id = $(this).parent().parent().children()[0];
            getInfoEmpresa($(id).text());
        });



        $("body").on("click", "#editOk", function(e) {
            e.preventDefault();
            editarSucursal();
            var table = $('#tablaSucursales').DataTable();
            table.ajax.reload(function(json) {
                $('#editOk').val(json.lastInput);
            });
        });


        $("body").on("click", "#editEmpresaOk", function(e) {
            e.preventDefault();
            // editarSucursal();
            var table = $('#tablaSucursales').DataTable();
            table.ajax.reload(function(json) {
                $('#editOk').val(json.lastInput);
            });
        });




        $("body").on("click", "#editarSucursal", function(e) {
            e.preventDefault();
            $("#s_provincia").toggle();
            $("#s_region").toggle();
            $("#s_comuna").toggle();
            $("#getProvincias3").toggle();
            $("#getComunas3").toggle();
            $("#editOk").toggle();
            $("#getRegiones3").toggle();
            if (document.getElementById('s_nombre').disabled == true) {
                document.getElementById('s_nombre').disabled = false;
                document.getElementById('s_direccion').disabled = false;
                document.getElementById('s_tel1').disabled = false;
                document.getElementById('s_tel2').disabled = false;
                document.getElementById('s_tel3').disabled = false;

                document.getElementById('s_correo').disabled = false;
                document.getElementById('s_comentario').disabled = false;
                document.getElementById('s_region').disabled = false;
                document.getElementById('s_comuna').disabled = false;
                document.getElementById('s_provincia').disabled = false;
            } else {
                document.getElementById('s_nombre').disabled = true;
                document.getElementById('s_direccion').disabled = true;
                document.getElementById('s_tel1').disabled = true;
                document.getElementById('s_tel2').disabled = true;
                document.getElementById('s_tel3').disabled = true;

                document.getElementById('s_correo').disabled = true;
                document.getElementById('s_comentario').disabled = true;
                document.getElementById('s_region').disabled = true;
                document.getElementById('s_comuna').disabled = true;
                document.getElementById('s_provincia').disabled = true;
            }


        });


        $("body").on("click", "#editarEmpresa", function(e) {
            e.preventDefault();
            $("#e_provincia").toggle();
            $("#e_region").toggle();
            $("#e_comuna").toggle();
            $("#getProvincias4").toggle();
            $("#getComunas4").toggle();
            $("#editEmpresaOk").toggle();
            $("#getRegiones4").toggle();
            $("#foto2").toggle();
            $("#e_logo").toggle();

            if (document.getElementById('e_rut').disabled == true) {
                document.getElementById('e_rut').disabled = false;
                document.getElementById('e_nombre').disabled = false;
                document.getElementById('e_tel1').disabled = false;
                document.getElementById('e_tel2').disabled = false;
                document.getElementById('e_tel3').disabled = false;
                document.getElementById('e_fantasia').disabled = false;
                document.getElementById('e_giro').disabled = false;
                document.getElementById('e_direccion').disabled = false;
                document.getElementById('e_region').disabled = false;
                document.getElementById('e_provincia').disabled = false;
                document.getElementById('e_comuna').disabled = false;
                document.getElementById('e_web').disabled = false;
                document.getElementById('e_logo').disabled = false;
                document.getElementById('e_comentario').disabled = false;
                document.getElementById('e_resolucion').disabled = false;
                document.getElementById('e_correo').disabled = false;
                document.getElementById('e_fecha').disabled = false;

            } else {
                document.getElementById('e_rut').disabled = true;
                document.getElementById('e_nombre').disabled = true;
                document.getElementById('e_tel1').disabled = true;
                document.getElementById('e_tel2').disabled = true;
                document.getElementById('e_tel3').disabled = true;
                document.getElementById('e_fantasia').disabled = true;
                document.getElementById('e_giro').disabled = true;
                document.getElementById('e_direccion').disabled = true;
                document.getElementById('e_region').disabled = true;
                document.getElementById('e_provincia').disabled = true;
                document.getElementById('e_comuna').disabled = true;
                document.getElementById('e_web').disabled = true;
                document.getElementById('e_logo').disabled = true;
                document.getElementById('e_comentario').disabled = true;
                document.getElementById('e_resolucion').disabled = true;
                document.getElementById('e_correo').disabled = true;
                document.getElementById('e_fecha').disabled = true;
            }


        });

        getEmpresasSesion();


        $('#prueba').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url(); ?>addEmpresa",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    getEmpresasSesion();
                    var table = $('#tablaEmpresas').DataTable();
                    table.ajax.reload(function(json) {
                        $('#btnAgregarEmpresa').val(json.lastInput);
                    });

                    if (data == "ok") {
                        toastr.success("", "Empresa registrada con Exito")
                    } else if (data == "error") {
                        toastr.warning("", "Rut ya registrado, intente con otro.")
                    } else if (data == "falta") {
                        toastr.error("", "Error, indique región, provincia o comuna.")
                    }
                }
            })
        });

        $('#form_Sucursal').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url(); ?>addSucursal",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {

                    var table = $('#tablaSucursales').DataTable();
                    table.ajax.reload(function(json) {
                        $('#btnAgregarSucursal').val(json.lastInput);
                    });
                    if (data == "ok") {
                        toastr.success("", "Sucursal registrada con Exito")
                    } else if (data == "error") {
                        toastr.warning("", "Rut ya registrado, intente con otro.")
                    } else if (data == "falta") {
                        toastr.error("", "Error, indique región, provincia, comuna o empresa.")
                    }
                }
            })
        });




        $("body").on("click", "#editEmpresaOk", function(e) {

            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url(); ?>editarEmpresa",
                method: "POST",
                data: new FormData(document.getElementById("form_editar_empresa")),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {

                    var table = $('#tablaEmpresas').DataTable();
                    table.ajax.reload(function(json) {
                        $('#editEmpresaOk').val(json.lastInput);
                    });
                    var table = $('#tablaSucursales').DataTable();
                    table.ajax.reload(function(json) {
                        $('#editEmpresaOk').val(json.lastInput);
                    });
                    if (data == "ok") {
                        toastr.success("", "Empresa editada con Exito.")
                    } else if (data == "faltandatosprincipales") {
                        toastr.warning("Rut, Nombre, Nombre Fantasia, Giro,Telefono 1, Dirección y Correo", "Tiene que completar los datos principales:")
                    } else if (data == "falta") {
                        toastr.warning("", "Faltan datos por completar.")
                    }
                }
            })

        });





        $('.tablaSucursales').DataTable({
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Registros _MENU_ ",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                url: "<?php echo site_url() ?>getSucursales",
                type: 'GET'
            },
            "columnDefs": [{
                    "targets": 5,
                    "data": null,
                    "defaultContent": '  <button class="btn btn-info" id="btnInfoSucursal" data-toggle="modal" data-target="#myModal3"><i class="fa fa-eye"></i></button>     <button class="btn btn-danger " id="eliminarSucursal"><i class="fa fa-times"></i></button>                                        '
                }

            ],
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel',
                    title: 'Lista de Sucursales'
                },
                {
                    extend: 'pdf',
                    title: 'Lista de Sucursales'
                },
                {
                    extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });

        $('.tablaEmpresas').DataTable({
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Registros _MENU_ ",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": {
                url: "<?php echo site_url() ?>getEmpresas",
                type: 'GET'
            },
            "columnDefs": [{
                    "targets": 5,
                    "data": null,
                    "defaultContent": '<button class="btn btn-info" id="btnInfoEmpresa" data-toggle="modal" data-target="#myModal4"><i class="fa fa-eye"></i></button>     <button class="btn btn-danger " id="eliminarEmpresa"><i class="fa fa-times"></i></button>'
                }

            ],
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel',
                    title: 'Lista de Empresas'
                },
                {
                    extend: 'pdf',
                    title: 'Lista de Empresas'
                },
                {
                    extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });






    });
</script>




</body>

</html>