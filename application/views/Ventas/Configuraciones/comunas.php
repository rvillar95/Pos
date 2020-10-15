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
            <h2>Comunas</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Inicio</a>
                </li>
                <li class="active">
                    <strong>Comunas</strong>
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
                            <div class="col-lg-3">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title" style="background-color: black;">
                                        <h5 style="color: white">Agregar Comunas</h5>
                                    </div>
                                    <div class="ibox-content" style="padding: 0px;">
                                        <div class="row" style="padding: 20px;">
                                            <div class="col-md-12">
                                                <br />
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label>Nombre Comuna</label>
                                                    <input type="text" id="nombreComuna" placeholder="Ingrese Comuna" class="form-control">
                                                </div>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="getAnnoEscolar">Provincia</label>
                                                    <select class="form-control" id="getProvincias">

                                                    </select>
                                                </div>
                                                <div class="form-group form-group col-lg-12 col-md-12 col-sm-4 col-xs-12"><button type="submit" id="btnAgregarComuna" class="btn btn-primary" style="background-color: black; color: white; ">Agregar Comuna</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-9">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title" style="background-color: black;">
                                        <h5 style="color: white">Tabla Comunas</h5>
                                    </div>
                                    <div class="ibox-content" style="padding: 0px;">

                                        <div class="row" style="padding: 20px;">
                                            <h2><strong>Registros de Comunas</strong></h2>
                                            <div class="table-responsive">
                                                <table id="tablaProvincia" class="table table-striped table-bordered table-hover tablaComunas">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Nombre</th>
                                                            <th>Provincia</th>
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



    <div class="footer">
        <div>
            <strong>Copyright</strong> Soluciones Villar &copy; 2018-2020
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
    $(document).ready(function() {
        var texto = "Seleccione la provincia de la comuna";
        getProvincias(texto);

        $("#btnAgregarComuna").click(function(e) {
            e.preventDefault();
            agregarComuna();

            var table = $('#tablaProvincia').DataTable();
            table.ajax.reload(function(json) {
                $('#btnAgregarComuna').val(json.lastInput);
            });
        });



        $('.tablaComunas').DataTable({
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
                url: "<?php echo site_url() ?>verComunas",
                type: 'GET'
            },

            dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel',
                    title: 'Lista de Comunas'
                },
                {
                    extend: 'pdf',
                    title: 'Lista de Comunas'
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