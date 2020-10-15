<?php $empresa = $this->session->userdata("empresa"); ?>
<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

            </div>
            <ul class="nav navbar-top-links navbar-right">
<input type="text" value="<?php echo $empresa?>">

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
            <h2>Maestro de Items</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Inicio</a>
                </li>
                <li class="active">
                    <strong>Maestro de Items</strong>
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
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title" style="background-color: black;">
                                            <h5 style="color: white">Tabla Items</h5>
                                        </div>
                                        <div class="ibox-content" style="padding: 0px;">

                                            <div class="row" style="padding: 20px;">
                                                <h2><strong>Registros de Items</strong></h2>
                                                <div class="table-responsive">
                                                    <a data-toggle="modal" data-target="#myModal1" class="btn btn-info">Agregar Items <i class="fa fa-plus-circle"></i></a>
                                                    <table id="tablaEmpresas" class="table table-striped table-bordered table-hover tablaEmpresas">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Grupo</th>
                                                                <th>Familia</th>
                                                                <th>Secuencia</th>
                                                                <th>Producto</th>
                                                                <th>C. Barra</th>
                                                                <th>C. Proveedor</th>
                                                                <th>Nombre</th>
                                                                <th>Descripcion</th>
                                                                <th>Posicion</th>
                                                                <th>Unidad</th>
                                                                <th>Talla</th>
                                                                <th>Color</th>
                                                                <th>S. Reposición</th>
                                                                <th>S. Critico</th>
                                                                <th>D. Maximo</th>
                                                                <th>% IVA</th>
                                                                <th>Costo Neto</th>
                                                                <th>Costo IVA</th>
                                                                <th>% Utilidad</th>
                                                                <th>Venta Neto</th>
                                                                <th>Venta IVA</th>
                                                                <th>Margen Utilidad $</th>
                                                                <th>Comentario</th>
                                                                <th>Imagen</th>
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
                                                <h5 style="color: white">Agregar Items</h5>
                                            </div>
                                            <div class="ibox-content" style="padding: 0px;">
                                                <div class="row" style="padding: 20px;">
                                                    <div class="col-md-12">
                                                        <br />
                                                        <form id="form_item" name="login" method="post" enctype="multipart/form-data">
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label for="getGrupos">Grupos</label>
                                                                <select class="form-control" required name="grupos" id="getGrupos">

                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label for="getFamilias">Familias</label>
                                                                <select class="form-control" required name="familias" id="getFamilias">
                                                                    <option disabled selected>Seleccione la Familia</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Codigo Interno</label>
                                                                <input type="text" required name="codigoInterno" maxlength="100" placeholder="Ingrese Codigo Interno" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Codigo Barra</label>
                                                                <input type="text" required name="codigoBarra" maxlength="100" placeholder="Ingrese Codigo de Barra" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Codigo Proveedor</label>
                                                                <input type="text" required name="codigoProveedor" maxlength="100" placeholder="Ingrese Codigo Proveedor" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Nombre Corto</label>
                                                                <input type="text" required name="nmCorto" maxlength="100" placeholder="Ingrese Nombre Corto" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Nombre Largo(Descripción)</label>
                                                                <input type="text" required name="nmLargo" maxlength="100" placeholder="Ingrese la descripcion del Item" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Posición</label>
                                                                <input type="text" required name="posicion" maxlength="100" placeholder="Ingrese la descripcion del Item" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label for="getFamilias">Unidad</label>
                                                                <select class="form-control" required name="unidad" id="getUnidades">
                                                                    <option disabled selected>Seleccione la Unidad</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label for="getFamilias">Talla</label>
                                                                <select class="form-control" required name="talla" id="getTallas">
                                                                    <option disabled selected>Seleccione la Talla</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label for="getFamilias">Color</label>
                                                                <select class="form-control" required name="color" id="getColores">
                                                                    <option disabled selected>Seleccione el Color</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Stock Reposicion</label>
                                                                <input type="number" required name="stkReposicion" maxlength="100" placeholder="Ingrese Stock de Reposicion" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Stock Critico</label>
                                                                <input type="number" required name="stkCritico" maxlength="100" placeholder="Ingrese Stock Critico" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div><label> <input type="checkbox" name="chek8" id="chek8" onclick="myFunction()" value="1"> Estado Servicio </label></div>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div><label> <input type="checkbox" name="chek1" id="chek1" value="1"> Estado Stock </label></div>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div><label> <input type="checkbox" name="chek2" value="1"> Estado Item </label></div>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div><label> <input type="checkbox" name="chek3" value="1"> Estado Pesable </label></div>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div><label> <input type="checkbox" name="chek4" value="1"> Estado Bloqueo </label></div>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div><label> <input type="checkbox" name="chek5" value="1"> Estado Excento </label></div>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div><label> <input type="checkbox" name="chek6" id="chek6" value="1" onclick="myFunction2()"> Estado Impuesto Especifico </label></div>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div><label> <input type="checkbox" name="chek7" value="1"> Mostrar Punto Venta </label></div>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div><label> <input type="checkbox"  name="chek9" value="1"> Estado Publicacion Web</label></div>
                                                            </div>
                                                            <div id="iEspecifico" class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: none;">
                                                                <label for="getFamilias">Impuesto Especifico</label>
                                                                <select class="form-control" required name="color" id="getImpuesto">
                                                                    <option disabled selected>Seleccione el Impuesto</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Descuento Maximo</label>
                                                                <input type="number" required name="descuentoMaximo" maxlength="100" placeholder="Ingrese Descuento Maximo" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Precio Costo Neto</label>
                                                                <input type="number" required name="costoNeto" maxlength="100" placeholder="Ingrese Precio Costo Neto" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Porcentaje Utilidad</label>
                                                                <input type="number" required name="porcentajeUtilidad" maxlength="100" placeholder="Ingrese % Utilidad" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Comentario Item</label>
                                                                <textarea class="form-control" placeholder="Ingrese algun comentario del Item" maxlength="200" name="comentario" cols="30" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Ruta Imagen</label>
                                                                <input type="file" name="foto" placeholder="Ingrese % Utilidad" class="form-control">
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

<script>
    $('body.canvas-menu .sidebar-collapse').slimScroll({
        height: '100%',
        railOpacity: 0.9
    });
</script>
<script>
    function myFunction() {
        // Get the checkbox
        var checkBox = document.getElementById("chek8");
        // Get the output text


        // If the checkbox is checked, display the output text
        if (checkBox.checked == true) {
            $("#chek1:not(:checked)").prop("disabled", true);
        } else {
            $("#chek1:not(:checked)").prop("disabled", false);
        }
    }

    function myFunction2() {
        // Get the checkbox
        var checkBox = document.getElementById("chek6");
        // Get the output text


        // If the checkbox is checked, display the output text
        if (checkBox.checked == true) {
            $("#iEspecifico").toggle();
        } else {
            $("#iEspecifico").toggle();
        }
    }
</script>
<script>
    $(document).ready(function() {
        getEmpresasSesion();
        getImpuesto();
        getGrupo();
        getColor();
        getTalla();
        getUnidad();
        $("#getEmpresasSesion").change(function(e) {
            e.preventDefault();
            postEmpresa();
        });





        $('#form_item').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url(); ?>addItem",
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
                        toastr.error("", "Error, indique grupo, familia, color, talla, o unidad.")
                    } else if (data == "faltaEmpresa") {
                        toastr.error("", "Seleccione la empresa a la cual se adieren cambios.")
                    }
                }
            })
        });


        $("body").on("change", "#getGrupos", function(e) {
            e.preventDefault();
            getFamilia();
        });
    });
</script>



</body>

</html>