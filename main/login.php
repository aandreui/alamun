<?php

error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);

require_once('db.php');

$db =  connect();
session_start();


//************* OBTENER IP DEL USUARIO CONECTADO *************


if (!empty($_POST)) {
    $usuario = mysqli_real_escape_string($db, $_POST['usuario']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $error = '';
    $datos = '';
    $elem = $_POST['usuario'];
    $elem1 = $_POST['password'];
    $bandera = 0;


    $query = $db->query("SELECT ID_USUARIO, ID_TIPO_USUARIO, NOMBRE FROM USUARIOS WHERE USUARIO = '$usuario' AND PASSWORD = '$password'");
    $usuarios = array();
    while ($a = $query->fetch_object()) {
        $usuarios[] = $a;
    }
    foreach ($usuarios as $c) {
        $bandera = 1;
        $_SESSION['id_usuario'] = $c->ID_USUARIO;
        $_SESSION['nombre_usuario'] = $c->NOMBRE;
        $_SESSION['continuar'] = 1;
    }
    if ($bandera == 0) {
        $error = "El usuario o password son incorrectos";
    } else {

        $datos = "Datos Correctos";

        header("Location: consaopar.php");
    }
}

?>



<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title>Login </title>
    <link rel="stylesheet" href="styles\Committees_style.css">


</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

        <a href="main.html">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>

        <!-- Service section start -->
        <div class="section primary-section" id="service">
            <div class="container">
                <!-- Start title section -->
                <div class="title">
                    <h1>
                        Login </h1>
                    <!-- Section's title goes here -->


                    <!--<p><b>Conectado desde ip:  <?php echo $clientIP ?> </b></p>-->

                    <!--Simple description for section goes here. -->
                    <table width="100%" border="0" class="Aelements">
                        <tr>
                            <td width="43%" align="right"><b>user:</b></td>
                            <td width="57%" align="left"><input id="usuario" name="usuario" type="text"></td>
                        </tr>
                        <tr>
                            <td width="43%" align="right"><b>password:</b></td>
                            <td width="57%" align="left"><b><input id="password" name="password" type="password"></td>
                        </tr>
                        <tr>
                            <td width="43%"></td>
                            <td width="57%" align="left"><input type="submit" name="login" Value="Sign in" /></td>
                        </tr>
                        <tr>
                            <td width="43%"></td>
                            <td width="57%" align="left">
                                <div style="font-size:18px; color:#cc0000; font-weight:bold"><?php echo isset($error) ? utf8_decode($error) : ''; ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
    </form>
    <!-- Include javascript -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.mixitup.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="js/jquery.cslider.js"></script>
    <script type="text/javascript" src="js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="js/jquery.inview.js"></script>
    <!-- css3-mediaqueries.js for IE8 or older -->
    <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->

    <!----Scripts---->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>