<?php
	require_once('db.php');
 
	$db =  connect();
    session_start();


    //************* OBTENER IP DEL USUARIO CONECTADO *************


	if(!empty($_POST))
  	{
		$usuario = mysqli_real_escape_string($db,$_POST['usuario']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$error = '';
		$datos = '';
		$elem = $_POST['usuario'];
		$elem1 = $_POST['password'];
		$bandera=0;


		$query=$db->query("SELECT ID_USUARIO, ID_TIPO_USUARIO, NOMBRE FROM USUARIOS WHERE USUARIO = '$usuario' AND PASSWORD = '$password'");
		$usuarios = array();
		while($a=$query->fetch_object()){ $usuarios[]=$a; }
		foreach($usuarios as $c){
			$bandera=1;
			$_SESSION['id_usuario'] = $c->ID_USUARIO;
            $_SESSION['nombre_usuario'] = $c->NOMBRE;
			$_SESSION['continuar'] = 1;
		}
		if ($bandera==0){
			$error = "El usuario o password son incorrectos";
		}
		else
		{
     
			$datos = "Datos Correctos";
			
			header("Location: consaopar.php");
		
		}
	}

?>


<!DOCTYPE html>
<!--
 * A Design by GraphBerry
 * Author: GraphBerry
 * Author URL: http://graphberry.com
 * License: http://graphberry.com/pages/license
-->
<html lang="es">
    <head>
        <meta charset=iso-8859-1>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
        <title>Consulta de informaci&oacute;n</title>
        


    </head>

    <body style="background-color:#181A1C;">
    	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <img src="images/<?php echo $logoproyecto ?>" width="120" height="40" alt="Logo" />
                        <!-- This is website logo -->
                    </a>

                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- Service section start -->
        <div class="section primary-section" id="service">
            <div class="container">
                <!-- Start title section -->
                <div class="title">
                    <h1>
                  Acceso a consulta de informaci&oacute;n de Avance de Obra</h1>
                    <!-- Section's title goes here -->
                  <p><b>Ingrese los datos necesarios para continuar... </b></p>

                  <!--<p><b>Conectado desde ip:  <?php echo $clientIP ?> </b></p>-->

                    <!--Simple description for section goes here. -->
                    <table width="100%"  border="0" class="wrapper col4">
    <tr>
    	  	      <td width="43%" align="right"><b>Usuario:&nbsp;</b></td>
    	  	      <td width="57%" align="left"><input id="usuario" name="usuario" type="text"></td>
    </tr>
    <tr>
    	  	      <td width="43%" align="right"><b>Contrase&ntilde;a:&nbsp;</b></td>
		          <td width="57%" align="left"><b><input id="password" name="password" type="password"></td>
    </tr>
    <tr>
        <td width="43%"></td>
        <td width="57%" align="left"><input type="submit" name="login" Value="Aceptar"/></td>
	</tr>
    <tr>
        <td width="43%"></td>
        <td width="57%" align="left"> 		
            <div  style = "font-size:18px; color:#cc0000; font-weight:bold"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
        </td>
	</tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
  
  		  	</div>
		  	</div>
        </div>

        <!-- Service section end -->
        <!-- Newsletter section start -->
        <div class="section third-section">
            <div class="container newsletter">
                <div class="sub-section">
                    <div class="title clearfix">
                        <div class="pull-left">
                           
                        </div>
                    </div>
                </div>
                <div id="success-subscribe" class="alert alert-success invisible">
                    <strong>Well done!</strong>You successfully subscribet to our newsletter.</div>
                <div class="row-fluid">
                    <div class="span5">
                        <p>&nbsp;</p>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Newsletter section end -->
        <!-- Footer section start -->
        <div class="footer">
            <p>Todos los derechos reservados. <a href="http://www.dydproyectos.com">DyD Proyectos</a></p>
        </div>
        <!-- Footer section end -->
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
       
    </body>
</html>