<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pymesoft | Pos</title>
    <link href="<?php echo base_url() ?>lib/css/toastr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>lib/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>lib/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/sweetalert.css" rel="stylesheet">

</head>

<body>

    <div id="page-wrapper" class="gray-bg" style="margin: 0px;">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>
                    <Menu:toolbar></Menu:toolbar>
                </h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url() ?>">Inicio</a>
                    </li>
                    <li class="active">
                        <strong>Venta</strong>
                    </li>

                </ol>
            </div>
            <div class="col-sm-8" style="text-align: center;">
                <?php
                $contador = 0;
                $carro = $this->session->userdata("carro");
                if (!isset($carro)) {
                    $contador = 1;
                }
                ?>
                <img src="<?php echo base_url() ?>lib/img/logo-negro.jpg" style="width: 165px; height: 70px;" alt="">
                <i class="fa fa-shopping-cart" data-toggle="modal" data-target="#myModal" id="cantidad" style="position: fixed; bottom: 10px; right: 10px; z-index: 1000; color: green; font-size: 40px; padding: 0px auto;"><?php if ($contador == 1) {
                                                                                                                                                                                                                                    echo "0";
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                    echo count($carro);
                                                                                                                                                                                                                                } ?></i>
            </div>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight article">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label id="labelCliente" for="documentos">Rut Cliente</label>
                                        <input type="text" class="form-control" id="rut" onblur="buscarNombre(this)" placeholder="Rut cliente" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="documentos">Tipo Documento</label>
                                            <select class="form-control" id="documentos">
                                                <option disabled selected>Seleccione el documento</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="pagos">Forma de Pago</label>
                                            <select class="form-control" id="pagos">
                                                <option disabled selected>Seleccione la forma de pago</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="pagos">Vendedor</label>
                                            <select class="form-control" id="vendedores">
                                                <option disabled selected>Seleccione el vendedor</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="divFecha" class="col-md-4" style="display: none;">
                                    <div class="form-group">
                                        <label for="documentos">Fecha Vencimiento Credito</label>
                                        <?php
                                        date_default_timezone_set("America/Santiago");
                                        $fecha = date('Y') . '-' . date('m') . '-' . date('d', strtotime("+1 day"))  ?>
                                        <input type="date" id="fechaCredito" class="form-control" min='<?php echo $fecha ?>'>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="articulos">
                                <div class="table-responsive">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="documentos"><i class="fa fa-search"></i></label>
                                            <input type="text" id="buscar" style="border-radius: 5%; border: 2px solid blue;" onkeyup="buscarProducto(this)">
                                        </div>
                                    </div>
                                    <table id="tablaProductos" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>Precio Venta Neto</th>
                                                <th>Total</th>
                                                <th>Agregar</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyProductos">

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
    <i class="fa fa-file-pdf-o" data-toggle="modal" data-target="#modalDocumentos" style="position: fixed; bottom: 60px; right: 10px; font-size: 40px; background-color: white; color: blue;"></i>
    <div class="modal inmodal" id="modalDocumentos" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-shopping-cart" style="font-size: 50px;"></i>
                    <h4 class="modal-title">Tabla documentos</h4>
                    <small class="font-bold">Revisa y descarga los documentos de tus ventas.</small><br>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="tablaDocumentos" class="table table-striped tablaDocumentos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Fecha Venta</th>
                                    <th>Forma de Pago</th>
                                    <th>Documento</th>
                                    <th>Total Venta</th>
                                    <th>Descargar</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-shopping-cart" style="font-size: 50px;"></i>
                    <h4 class="modal-title">Carrito de Venta</h4>
                    <small class="font-bold">Revisa tu carrito de venta antes de confirmar.</small><br>
                    <button type="button" id="btnVaciar" class="btn btn-primary">Vaciar Carro</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="tablaCarro" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio Venta</th>
                                    <th>Total</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyCarro">

                            </tbody>
                        </table>
                        <span id="totalCarro"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGrabar"> Grabar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url() ?>lib/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url() ?>lib/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>lib/js/toastr.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/datatables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>lib/js/sweetalert.min.js" type="text/javascript"></script>
    <script>
        var totalCarro = -1;
        var totalCompra = 0;
        var totalCompraIva = 0;
        var totalValorFinal = 0;

        function validarNegativos(entrada) {
            var boton = document.getElementById(entrada.id);
            if (entrada.value.includes('-')) {
                toastr.warning("", "La cantidad tiene que ser mayor o igual a 1")
                boton.focus();
                boton.style.border = "1px solid red";
            } else {

                var totalPrecio = entrada.id.split(".");
                var prueba = totalPrecio[0].split("-");
                var precio = totalPrecio[1];
                var idSpan = "total-" + prueba[1];
                var span = document.getElementById(idSpan);
                console.log("el span a cambiar es " + idSpan);
                var suma = precio * entrada.value;
                document.getElementById(idSpan).innerHTML = "$ " + formatearPrecios(suma);
                boton.style.border = "1px solid green";

            }
            //  console.log(entrada.value);
        }

        $("#btnGrabar").click(function(e) {
            e.preventDefault();
            var rut = $("#rut").val();
            var pagos = $("#pagos").val();
            var documentos = $("#documentos").val();
            var fechaCredito = $("#fechaCredito").val();
            var vendedor = $("#vendedores").val();

            if (pagos != undefined) {
                if (documentos != undefined) {
                    if (vendedor != undefined) {
                        if (rut != "") {
                            if (pagos == 20) {
                                if (fechaCredito != "") {
                                    if (totalCarro == -1 || totalCarro == 0) {
                                        toastr.warning("", "El carro esta vacio, seleccione productos para continuar")
                                    } else {
                                        $.ajax({
                                            url: 'finalizarCompra',
                                            type: 'POST',
                                            dataType: 'json',
                                            data: {
                                                "rut": rut,
                                                "pagos": pagos,
                                                "documentos": documentos,
                                                "vendedor": vendedor,
                                                "fechacredito": fechaCredito,
                                                "totalCompra": totalCompra,
                                                "totalCompraIva": totalCompraIva,
                                                "valorventa": totalValorFinal
                                            }
                                        }).then(function(msg) {
                                            if (msg.msg == "ok") {
                                                //swal("Generando Documento", "Por favor espere...", "success");											
                                                setTimeout(() => {
                                                    var table = $('#tablaDocumentos').DataTable();
                                                    table.ajax.reload(function(json) {
                                                        $('#btnGrabar').val(json.lastInput);
                                                    });
                                                }, 2000);
                                                $("#myModal").modal("hide");
                                                setTimeout(() => {
                                                    rescatarDocumento();
                                                }, 3000);
                                                vaciarCarro();
                                                //location.href = "MenuVenta";
                                            } else if (msg.msg == "error") {
                                                toastr.error("", "Error al grabar la venta")
                                            } else if (msg.msg == "cliente") {
                                                toastr.warning("", "El rut del cliente no se encuentra registrado")
                                            }
                                        });
                                    }
                                } else {
                                    toastr.warning("", "Ingrese la fecha del credito")
                                }

                            } else {
                                if (totalCarro == -1 || totalCarro == 0) {
                                    toastr.warning("", "El carro esta vacio, seleccione productos para continuar")
                                } else {
                                    $.ajax({
                                        url: 'finalizarCompra',
                                        type: 'POST',
                                        dataType: 'json',
                                        data: {
                                            "rut": rut,
                                            "pagos": pagos,
                                            "documentos": documentos,
                                            "vendedor": vendedor,
                                            "fechacredito": "0",
                                            "totalCompra": totalCompra,
                                            "totalCompraIva": totalCompraIva,
                                            "valorventa": totalValorFinal
                                        }
                                    }).then(function(msg) {
                                        if (msg.msg == "ok") {
                                            setTimeout(() => {
                                                var table = $('#tablaDocumentos').DataTable();
                                                table.ajax.reload(function(json) {
                                                    $('#btnGrabar').val(json.lastInput);
                                                });
                                            }, 2000);
                                            $("#myModal").modal("hide");
                                            setTimeout(() => {
                                                rescatarDocumento();
                                            }, 3000);
                                            vaciarCarro();
                                            //location.href = "MenuVenta";
                                        } else if (msg.msg == "error") {
                                            toastr.error("", "Error al grabar la venta")
                                        } else if (msg.msg == "cliente") {
                                            toastr.warning("", "El rut del cliente no se encuentra registrado")
                                        }

                                    });
                                }
                            }
                        } else {
                            toastr.warning("", "Ingrese el rut del cliente")
                        }
                    } else {
                        toastr.warning("", "Seleccione el vendedor")
                    }
                } else {
                    toastr.warning("", "Seleccione el tipo de documento")
                }
            } else {
                toastr.warning("", "Seleccione la forma de pago")
            }


        });

        function formatearPrecios(num) {
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            num = num.split('').reverse().join('').replace(/^[\.]/, '');
            return num;
        }

        $("#pagos").change(function(e) {
            e.preventDefault();
            var seleccion = this.value;
            if (seleccion == "20") {
                document.getElementById("divFecha").style.display = "block";
            } else {
                document.getElementById("divFecha").style.display = "none";
            }
        });
        getCarro();
        getProductos();
        getDocumentos();
        getTipoDocumento();
        getTipoPago();
        getVendedores();

        function getProductos() {
            $("#tbodyProductos").empty();
            var fila = "";
            $.getJSON("getProductos", function(result) {
                $.each(result, function(i, o) {
                    fila += '<tr>';
                    fila += '   <td>' + o.des_ite + '</td>';
                    fila += '   <td><input type="number" value="1" onblur="validarNegativos(this)" id="stock-' + o.cod_ide + '.' + o.pre_li1 + '" ></td>';
                    fila += '   <td>$ ' + formatearPrecios(parseInt(o.pre_li1) / 1, 19) + '</td>';
                    fila += '   <td><span id="total-' + o.cod_ide + '" >$ ' + formatearPrecios(o.pre_li1) + '</span></td>';
                    fila += '   <td><button class="btn btn-success" id="btnAgregarProducto" value="' + o.cod_ide + ',' + o.pre_li1 + ',' + o.pre_li1 + ',' + o.des_ite + '"><i class="fa fa-plus"></i> Agregar  </button></td>';
                    fila += '<tr>';
                });
                $("#tbodyProductos").append(fila);
            });
        }

        function getCarro() {
            $("#tbodyCarro").empty();
            var fila = "";
            var total = 0;
            var iva = 0;
            var tabla = "";
            var tamaño = 0;
            $.getJSON("getCarro", function(result) {
                $.each(result, function(i, o) {
                    fila += '<tr>';
                    fila += '   <td>' + o.nombre + '</td>';
                    fila += '   <td>' + o.cantidad + '</td>';
                    fila += '   <td>$' + formatearPrecios(o.precio) + '</td>';
                    fila += '   <td>$' + formatearPrecios(o.total) + '</td>';
                    fila += '   <td><button class="btn btn-danger" id="btnEliminarProducto" value="' + o.id + '"><i class="fa fa-trash"></i>  </button></td>';
                    fila += '<tr>';
                    total = (total + parseInt(o.total));
                    iva = iva + ((parseInt(o.total) * 19) / 100);
                    tamaño++;
                    totalCompra = total;
                    totalCompraIva = iva;
                    totalValorFinal = total + iva;
                });
                tabla = '<table class="table table-striped">       <thead>                                <tr>                                    <th>Total Neto</th>                                    <th>Total Iva</th>                                    <th>Total Compra</th>                                </tr>                            </thead>                            <tbody>                                <tr>                                    <td>$' + formatearPrecios(total) + '</td>                                    <td>$' + formatearPrecios(iva) + '</td>                                    <td>$' + formatearPrecios(total + iva) + '</td>                                </tr>                            </tbody>                        </table>';

                document.getElementById("totalCarro").innerHTML = tabla;
                totalCarro = tamaño;
                $("#tbodyCarro").append(fila);
            });
        }

        $("#btnVaciar").click(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'vaciarCarro',
                type: 'POST',
                dataType: 'json',
            }).then(function(msg) {
                toastr.success("", msg.msg);
                document.getElementById("cantidad").innerHTML = "0";
                totalCarro = 0;
                getCarro();
            });
        });

        function vaciarCarro() {
            $.ajax({
                url: 'vaciarCarro',
                type: 'POST',
                dataType: 'json',
            }).then(function(msg) {
                toastr.success("", msg.msg);
                document.getElementById("cantidad").innerHTML = "0";
                totalCarro = 0;
                getCarro();
            });
        }

        function rescatarDocumento() {
            $.ajax({
                url: 'rescatarDocumento',
                type: 'POST',
                dataType: 'json',
            }).then(function(msg) {
                if (msg.msg == "Documento no pudo ser generado.") {
                    swal("Error", "Documento no pudo ser generado", "error");
                } else {
                    window.open(msg.msg, '_blank');
                }

            });
        }

        function buscarNombre(prueba) {
            $.ajax({
                url: 'getNombreCliente',
                type: 'POST',
                dataType: 'json',
                data: {
                    "rut": prueba.value
                }
            }).then(function(msg) {
                if (msg.msg == "Cliente no registrado.") {
                    swal("Error", "Cliente no registrado", "error");
                } else {
                    document.getElementById("labelCliente").innerHTML = "Rut Cliente: " + msg.msg;
                }
            });
        }

        function buscarProducto(input) {
            var valor = input.value;
            if (valor != "") {
                $.ajax({
                    url: 'getProductosXbusqueda',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        "palabra": valor,
                    }
                }).then(function(msg) {
                    var fila = "";
                    $("#tbodyProductos").empty();
                    $.each(msg, function(i, o) {
                        fila += '<tr>';
                        fila += '   <td>' + o.des_ite + '</td>';
                        fila += '   <td><input type="number" value="1" onblur="validarNegativos(this)" id="stock-' + o.cod_ide + '.' + o.pre_li1 + '" ></td>';
                        fila += '   <td>$ ' + formatearPrecios(parseInt(o.pre_li1) / 1, 19) + '</td>';
                        fila += '   <td><span id="total-' + o.cod_ide + '" >$ ' + formatearPrecios(o.pre_li1) + '</span></td>';
                        fila += '   <td><button class="btn btn-success" id="btnAgregarProducto" value="' + o.cod_ide + ',' + o.pre_li1 + ',' + o.pre_li1 + ',' + o.des_ite + '"><i class="fa fa-plus"></i> Agregar  </button></td>';
                        fila += '<tr>';
                    });
                    $("#tbodyProductos").append(fila);
                });
            } else {
                getProductos();
            }
        }

        function getTipoDocumento() {
            $.ajax({
                url: 'getTipoDocumento',
                type: 'POST',
                dataType: 'json',
            }).then(function(msg) {
                var fila = " <option disabled selected>Seleccione el documento</option>";
                $("#documentos").empty();
                $.each(msg, function(i, o) {
                    fila += '<option value="' + o.cod_doc + '">' + o.des_doc + '</option>';
                });
                $("#documentos").append(fila);
            });
        }

        function getTipoPago() {
            $.ajax({
                url: 'getTipoPago',
                type: 'POST',
                dataType: 'json',
            }).then(function(msg) {
                var fila = " <option disabled selected>Seleccione el pago</option>";
                $("#pagos").empty();
                $.each(msg, function(i, o) {
                    fila += '<option value="' + o.cod_pgo + '">' + o.des_pgo + '</option>';
                });
                $("#pagos").append(fila);
            });
        }

        function getVendedores() {
            $.ajax({
                url: 'getVendedor',
                type: 'POST',
                dataType: 'json',
            }).then(function(msg) {
                var fila = " <option disabled selected>Seleccione el vendedor</option>";
                $("#vendedores").empty();
                $.each(msg, function(i, o) {
                    fila += '<option value="' + o.cod_cjr + '">' + o.cta_usr + '</option>';
                });
                $("#vendedores").append(fila);
            });
        }
        //btnEliminarProducto

        $("body").on("click", "#btnEliminarProducto", function(e) {
            e.preventDefault();
            var id = this.value;
            console.log(id);

            $.ajax({
                url: 'eliminarProducto',
                type: 'POST',
                dataType: 'json',
                data: {
                    "id": id
                }
            }).then(function(msg) {
                toastr.success("", msg.msg);
                document.getElementById("cantidad").innerHTML = msg.cantidad;
                totalCarro = msg.cantidad;
                getCarro();
            });

        });

        $("body").on("click", "#btnAgregarProducto", function(e) {
            e.preventDefault();
            var datos = this.value.split(",");
            var id = datos[0];
            var precio = datos[1];
            var imagen = datos[2];
            var nombre = datos[3];
            var index = "-" + id + "." + precio;
            var cantidad = document.getElementById("stock" + index).value;
            var total = cantidad * precio;
            console.log("el id es: " + id);
            console.log("la cantidad es: " + cantidad);
            console.log("el precio es: $" + precio);
            console.log("total es: $" + total);
            $.ajax({
                url: 'addProducto',
                type: 'POST',
                dataType: 'json',
                data: {
                    "id": id,
                    "nombre": nombre,
                    "cantidad": cantidad,
                    "precio": precio,
                    "total": total
                }
            }).then(function(msg) {
                toastr.success("", msg.msg);
                document.getElementById("cantidad").innerHTML = msg.cantidad;
                totalCarro = msg.cantidad;
                getCarro();
            });
        });

        function getDocumentos() {
            $('.tablaDocumentos').DataTable({
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
                    url: "<?php echo site_url() ?>getDocumentos",
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
                        title: 'Lista de Documentos'
                    },
                    {
                        extend: 'pdf',
                        title: 'Lista de Documentos'
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
        }

        //getProductosXbusqueda
    </script>

</body>

</html>