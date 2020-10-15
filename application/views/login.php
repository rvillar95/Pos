<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>PymeSoft | Login</title>	
	
	<link  rel="icon" href="<?php echo base_url() ?>lib/img/favicon.jpg" type="image/jpg" />
	
    <link href="<?php echo base_url() ?>lib/css/toastr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>lib/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>lib/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>lib/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><img src="<?php echo base_url() ?>lib/img/logo-negro.jpg" class="img-responsive" alt=""></h1>

            </div>
            <h3>Inicio Sesión</h3>
            <div class="form-group">
                <input type="text" class="form-control" id="rut" placeholder="Rut Empresa" required="">
            </div>
            <div class="form-group">
                <input type="password" id="clave" class="form-control" placeholder="Password" required="">
            </div>
           
            <button type="submit" id="btnIngresar" class="btn btn-primary block full-width m-b">Ingresar</button>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url() ?>lib/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url() ?>lib/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>lib/js/toastr.min.js" type="text/javascript"></script>

    <script>
        $("#btnIngresar").click(function(e) {
            e.preventDefault();
            var rut = $("#rut").val();
            var clave = $("#clave").val();

            console.log("El rut es " + rut);
            console.log("La clave es " + clave);
            $.ajax({
                url: 'iniciarSesion',
                type: 'POST',
                dataType: 'json',
                data: {
                    "rut": rut,
                    "clave": clave
                }
            }).then(function(msg) {
                if (msg.msg == "error") {
                    toastr.error("", "Rut o clave incorrectos")
                } else if (msg.msg == "ok") {
                    toastr.success("", "Acceso correcto. Redireccionando...");
                    setTimeout(() => {
                        window.location = "MenuVenta";
                    }, 3000);
                }
                console.log(msg.error);
            });
        });
    </script>

</body>

</html>