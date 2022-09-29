<?php

	/*error_reporting(E_ALL);
  ini_set('display_errors', true);
  ini_set('html_errors', false);*/

	include "db.php";
	session_start();
	$db = connect();
	mysqli_set_charset($db,"utf8");  
	

	$logoproyecto=$_SESSION['logoproyecto'];
	$idproyecto=$_SESSION['IDProyecto'];
	$nombreusuario=$_SESSION['nombre_usuario'];	

	if(!empty($_POST['ltaTramos'])) {
		$postidTramo=$_POST['ltaTramos'];
		$arrtram=explode(':', $postidTramo);          
		$idtram=$arrtram[0];
	}
	if(!empty($_POST['ltaEstandar'])) {
		$postidEstandar=$_POST['ltaEstandar'];
		$arrestd=explode(':', $postidEstandar);           
		$idest=$arrestd[0];

		$resultsubest = $db->query("select * from p WHERE ID_ESTANDAR=$idest");
		$subestandar = array();
		if($resultsubest){
		while($e=$resultsubest->fetch_object()){ $subestandar[]=$e; }
			$resultsubest->close();
			$db->next_result();
		}
	}
	if(!empty($_POST['ltaSubEstandar'])) {
		$postidSubEstandar=$_POST['ltaSubEstandar'];
		$arrsubestd=explode(':', $postidSubEstandar);           
		$idsubest=$arrsubestd[0];        
	}

	if(!empty($_POST['ltaInventario'])) {
		$idinv=$_POST['ltaInventario'];		
	}

	if(!empty($_POST['ltaUsuario'])) {
		$idusr=$_POST['ltaUsuario'];		
	}

	$idbuscfechas=1; //FIJAR LA LISTA EN VALOR SI
	if(!empty($_POST['ltaFechas'])) {
		$postbuscFechas=$_POST['ltaFechas'];        
		$idbuscfechas=$postbuscFechas;
	}
	if(!empty($_POST['fechaIni'])) {
		$fechaIni=$_POST['fechaIni'];
	}
	if(!empty($_POST['fechaFin'])) {
		$fechaFin=$_POST['fechaFin'];
	}
	if(!empty($_SESSION['tipo_usuario'])) {
		$tipousuario=$_SESSION['tipo_usuario'];
	}
	
	if(!empty($_POST['registroIni'])) {
		$regIni=$_POST['registroIni'];
	}
	if(!empty($_POST['registroFin'])) {
		$regFin=$_POST['registroFin'];
	}

	if(!empty($_POST['kmInicial'])) {
		$kmIni=$_POST['kmInicial'];
	}
	if(!empty($_POST['kmFinal'])) {
		$kmFin=$_POST['kmFinal'];
	}

	$result = $db->query("select * from DISTRITOS_PARAGUAY");
	$distritos = array();
	if($result){
	while($r=$result->fetch_object()){ $distritos[]=$r; }
		$result->close();
		$db->next_result();
	}

	/*$query = $db->query("select * from USUARIOS");
	$usuarios = array();
	while($u=$query->fetch_object()){ $usuarios[]=$u; }*/

	$resultest = $db->query("select * from AVANCE_OBRAS_ESTANDAR WHERE VISIBLE = 1");
	$estandar = array();
	if($resultest){
	while($e=$resultest->fetch_object()){ $estandar[]=$e; }
		$resultest->close();
		$db->next_result();
	}

	$resulttram = $db->query("select * from TRAMOS_PARAGUAY WHERE ID_RUTA=1");
	$tramos = array();
	if($resulttram){
	while($t=$resulttram->fetch_object()){ $tramos[]=$t; }
		$resulttram->close();
		$db->next_result();
	}

	$resultinv = $db->query("SELECT * FROM INVENTARIO WHERE MOSTRAR = 1");
	$inventario = array();
	if($resultinv){
	while($i=$resultinv->fetch_object()){ $inventario[]=$i; }
		$resultinv->close();
		$db->next_result();
	}

	$resultusr = $db->query("SELECT * FROM USUARIOS WHERE ID_PROYECTO = 5 AND MOSTRAR = 1 ORDER BY NOMBRE");
	$usuarios = array();
	if($resultusr){
	while($u=$resultusr->fetch_object()){ $usuarios[]=$u; }
		$resultusr->close();
		$db->next_result();
	}

	//close connection
	$db->close();
?>

<script type="text/javascript">
	function generarBusqueda() { 
		
		var IDTramo = document.getElementById('ltaTramos').value;
		var IDSubtramo = document.getElementById('ltaSubTramos').value;
		var IDEstado = document.getElementById('ltaEstados').value;
		
		alert("Clic al bot?n, tramo seleccionado: " +IDTramo + " Subtramo: " + IDSubtramo + " IDEstado: " + IDEstado); 
		
		<?php echo "aqui" ?>
		
	
	/*	<table border="1">
			<thead>
				<tr>
					<th><b>ID</b></th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Telefono</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>*/
	
	}
</script>


<!DOCTYPE html>
<!--
 * A Design by GraphBerry
 * Author: GraphBerry
 * Author URL: http://graphberry.com
 * License: http://graphberry.com/pages/license
-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
		<title>Consulta de informaci&oacute;n</title>
		<link rel="stylesheet"  href="css/button.css" />
		<!-- Load Roboto font -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<!-- Load css styles -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/pluton.css" />
		<!--[if IE 7]>
			<link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
		<link rel="stylesheet" type="text/css" href="css/animate.css" />
		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
		<link rel="shortcut icon" href="images/ico/favicon.ico">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link href="dist/css/tableexport.css" rel="stylesheet" type="text/css">  

		<style type="text/css">
		  a:link {
			color: yellow;
		  }

		  a:visited {
			  color: yellow;		  
		  }	

		  a:hover {
			color: white;
			background-color: yellow;
		  }

		  /*a:active {
			color: blue;
		  }*/

		  .divbotones {
				display:inline-block;
			}
		</style>

	</head>
	
	<body style="background-color:#181A1C;">
		<form action="consaopar.php" method="post">
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<a href="#" class="brand">
						<!--<img src="images/bandera_argentina.jpg" width="120" height="40" alt="Logo" />
						<!-- This is website logo -->
						<img src="images/<?php echo $logoproyecto ?>" width="120" height="40" alt="Logo" />
					</a>
					<!-- Navigation button, visible on small resolution -->
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<i class="icon-menu"></i>
					</button>
					<!-- Main navigation 
					<div class="nav-collapse collapse pull-right"> -->
					<?php if ($tipousuario==1){ ?>                    	
						
						<ul class="nav" id="top-navigation">
							<li><a href="documentopar.php" onclick="window.open(this.href, this.target, 'width=460 height=766, toolbar=no, location=no, status=no, menubar=no'); return false;
							">Alta Documentos</a></li>                           
						</ul>
						<ul class="nav" id="top-navigation">
							<li><a href="estandarpar.php" onclick="window.open(this.href, this.target, 'width=460 height=766, toolbar=no, location=no, status=no, menubar=no'); return false;
							">Est&aacute;ndares</a></li>                           
						</ul>
						<ul class="nav" id="top-navigation">
							<li><a href="subestandarpar.php" onclick="window.open(this.href, this.target, 'width=465 height=766, toolbar=no, location=no, status=no, menubar=no'); return false;
							">Subest&aacute;ndares</a></li>                           
						</ul>
						<ul class="nav" id="top-navigation">
						<li><a href="consavisos.php">Avisos</a></li>                            
					</ul>
					<ul class="nav" id="top-navigation">
						<li><a href="consaoparpr.php">Sel. Mult.</a></li>                           
					</ul>
					<?php } ?>					
					<ul class="nav" id="top-navigation">
						<li><a href="">Bienvenido <?php echo $nombreusuario; ?></a></li>                           
					</ul>
					<ul class="nav" id="top-navigation">
						<li><a href="cerrarsesion.php" >Cerrar Sesi&oacute;n</a></li>                           
					</ul>

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
				  Consulta de informaci&oacute;n de Avance de Obra</h1>
					<!-- Section's title goes here -->
				  <p>Seleccione los criterios de b&uacute;squeda para realizar la consulta</p>
					<!--Simple description for section goes here. -->
					<!--<table width="100%" border="0" class="wrapper col4">-->
					<div>	<!-- EN LUGAR DE LA TABLA -->           
						<!--<tr>
							<td align="right"><b>Distrito:&nbsp</b></td>
							<td><select name="ltaDistritos" id="ltaDistritos" class="form-control"> 
									<option value="0">Todos</option>    
									<?php foreach($distritos as $c):?>
										<option value="<?php echo $c->ID_DISTRITO; ?>:<?php echo $c->DISTRITO; ?>"><?php echo $c->DISTRITO; ?></option>
									<?php endforeach; ?>
								</select> 
						   </td>
							<td><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td align="right"><b>Ruta:&nbsp</b></td>
							<td><select name="ltaEstados" id="ltaEstados" class="form-control"> 
									<option value="0">Todas</option>    
								</select>
							</td>
							<td><b></b></td>
							<td><b></b></td>
							<td><b></b></td>
						</tr>
						<tr>
							<td align="right"><b>Tramo:&nbsp</b></td>
							<td><select name="ltaTramos" id="ltaTramos" class="form-control"> 
									<option value="0">Todos</option>      
								</select> 
							  </td>
							<td><b></b></td>
							<td></td>
							<td></td>
						</tr>-->
						<!--
						<div class="row">
						  <div class="col-md-2" align="right" style="vertical-align: middle;"><b>Tramo:&nbsp;</b></div>
						  <div class="col-md-4" align="left">
							<select name="ltaTramos" id="ltaTramos" class="form-control" max-width=350 style="width: 200px;"> 
									<option value="0">Todos</option>
									<?php foreach($tramos as $tram):?>
										<?php 
										$idtramrec=$tram->ID_TRAMO;
										if ($idtram==$idtramrec){
										?>
											<option selected value="<?php echo $tram->ID_TRAMO; ?>:<?php echo $tram->CLAVE_TRAMO; ?>"><?php echo $tram->CLAVE_TRAMO; ?></option>
										<?php
										}else{
										?>  
											<option value="<?php echo $tram->ID_TRAMO; ?>:<?php echo $tram->CLAVE_TRAMO; ?>"><?php echo $tram->CLAVE_TRAMO; ?></option>
										<?php
										}
										?>  
									<?php endforeach; ?>
								</select>

						  </div>
						</div>
						-->
						
						<div style="width:100%; ">							
							<td align="right" style="width: 100px;"></td><b>Registro inicial:&nbsp</b><input id="registroIni" name="registroIni" type="text"  value="<?php echo $regIni; ?>" style="height: 35px; width: 100px; text-align: center;margin-right: 20px;" onChange="validarNumero(this.value);">	
							<td align="right" style="width: 100px; "></td><b>Registro final:&nbsp</b><input id="registroFin" name="registroFin" type="text"  value="<?php echo $regFin; ?>" style="height: 35px; width: 100px; text-align: center;" onChange="validarNumero(this.value);">	
						</div>

						<div style="width:100%; margin-top: 10px;">							
							<td align="right" style="width: 100px;"></td><b>Km. Inicial:&nbsp</b><input id="kmInicial" name="kmInicial" type="text"  value="<?php echo $kmIni; ?>" style="height: 35px; width: 100px; text-align: center; margin-right: 20px;" onChange="validarNumeroDecimal(this.value);">	
							<td align="right" style="width: 100px;"></td><b>Km. Final:&nbsp</b><input id="kmFinal" name="kmFinal" type="text"  value="<?php echo $kmFin; ?>" style="height: 35px; width: 100px; text-align: center;" onChange="validarNumeroDecimal(this.value);">
						</div>

						<tr>
							<td align="right" max-width=250 style="width: 160px;"><b>Tramo:&nbsp</b> <!--</td>-->
							<!--<td width="250px">-->
								<select name="ltaTramos" id="ltaTramos" class="form-control" max-width=350 > 
									
									<!--<?php foreach($tramos as $tram):?>
									<option value="<?php echo $tram->ID_TRAMO; ?>:<?php echo $tram->CLAVE_TRAMO; ?>"><?php echo $tram->CLAVE_TRAMO; ?></option>
									<?php endforeach; ?>-->
								
								<option value="0">Todos</option>
								<?php foreach($tramos as $tram):?>
									<?php 
									$idtramrec=$tram->ID_TRAMO;
									if ($idtram==$idtramrec){
									?>
										<option selected value="<?php echo $tram->ID_TRAMO; ?>:<?php echo $tram->CLAVE_TRAMO; ?>"><?php echo $tram->CLAVE_TRAMO; ?></option>
									<?php
									}else{
									?>  
										<option value="<?php echo $tram->ID_TRAMO; ?>:<?php echo $tram->CLAVE_TRAMO; ?>"><?php echo $tram->CLAVE_TRAMO; ?></option>
									<?php
									}
									?>  
								<?php endforeach; ?>
								</select>
							</td>
							<td><b></b></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td align="right"><b>Agrupador:&nbsp</b></td>
							<td>
								<select name="ltaEstandar" id="ltaEstandar" class="form-control"> 
									<!--<option value="0">Todos</option>     
									<?php foreach($estandar as $est):?>
									<option value="<?php echo $est->ID_ESTANDAR; ?>:<?php echo $est->ESTANDAR; ?>"><?php echo $est->ESTANDAR; ?></option>
									<?php endforeach; ?>-->
								
								<option value="0">Todos</option>
								<?php foreach($estandar as $est):?>
									<?php 
									$idestrec=$est->ID_ESTANDAR;
									if ($idest==$idestrec){
									?>
										<option selected value="<?php echo $est->ID_ESTANDAR; ?>:<?php echo $est->ESTANDAR; ?>"><?php echo $est->ESTANDAR; ?></option>
									<?php
									}else{
									?>  
										<option value="<?php echo $est->ID_ESTANDAR; ?>:<?php echo $est->ESTANDAR; ?>"><?php echo $est->ESTANDAR; ?></option>
									<?php
									}
									?>  
								<?php endforeach; ?>    
								</select>
							</td>
							<td></td>
							<td></td>
							<td></td>
						</tr> 
						<tr>
							<td align="right"><b>Est&aacutendar:&nbsp</b></td>
							<td>
								<select name="ltaSubEstandar" id="ltaSubEstandar" class="form-control"> 
									<!--<option value="0">Todos</option>     
									<?php foreach($estandar as $est):?>
									<option value="<?php echo $est->ID_ESTANDAR; ?>:<?php echo $est->ESTANDAR; ?>"><?php echo $est->ESTANDAR; ?></option>
									<?php endforeach; ?>-->
								
								<option value="0">Todos</option>
									<?php foreach($subestandar as $subest):?>
									<?php 
										$idsubestrec=$subest->ID_ESTANDAR_VALOR;
										if ($idsubest==$idsubestrec){
									?>                                    
									<option selected value="<?php echo $subest->ID_ESTANDAR_VALOR; ?>:<?php echo $subest->ESTANDAR_VALOR; ?>"><?php echo $subest->ESTANDAR_VALOR; ?></option>
									<?php
									}else{
									?>
									<option value="<?php echo $subest->ID_ESTANDAR_VALOR; ?>"><?php echo $subest->ESTANDAR_VALOR; ?></option>
									<?php
									}
									?>
									<?php endforeach; ?>

								<!--<?php foreach($estandar as $est):?>
									<?php 
									$idestrec=$est->ID_ESTANDAR;
									if ($idest==$idestrec){
									?>
										<option selected value="<?php echo $est->ID_ESTANDAR; ?>:<?php echo $est->ESTANDAR; ?>"><?php echo $est->ESTANDAR; ?></option>
									<?php
									}else{
									?>  
										<option value="<?php echo $est->ID_ESTANDAR; ?>:<?php echo $est->ESTANDAR; ?>"><?php echo $est->ESTANDAR; ?></option>
									<?php
									}
									?>  
								<?php endforeach; ?>-->
								</select>

							</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td align="right"><b>Tipo:&nbsp</b></td>
							<td>
								<select name="ltaInventario" id="ltaInventario" class="form-control"> 
								<option value="0">Todos</option>
									<?php foreach($inventario as $inv):?>
									<?php 
										$idinvrec=$inv->ID_INVENTARIO;
										if ($idinv==$idinvrec){
									?>                                    
									<option selected value="<?php echo $inv->ID_INVENTARIO; ?>"><?php echo $inv->INVENTARIO; ?></option>
									<?php
									}else{
									?>
									<option value="<?php echo $inv->ID_INVENTARIO; ?>"><?php echo $inv->INVENTARIO; ?></option>
									<?php
									}
									?>
									<?php endforeach; ?>
								</select>

							</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>					
						<tr>
							<td align="right" style="width: 100px;"><b>Usuario:&nbsp</b></td>
							<td>
								<select name="ltaUsuario" id="ltaUsuario" class="form-control"> 
								<option value="0">Todos</option>
									<?php foreach($usuarios as $usr):?>
									<?php 
										$idusrrec=$usr->ID_USUARIO;
										if ($idusr==$idusrrec){
									?>                                    
									<option selected value="<?php echo $usr->ID_USUARIO; ?>:<?php echo $usr->NOMBRE; ?>"><?php echo $usr->NOMBRE; ?></option>
									<!--<option selected value="<?php echo $usr->ID_USUARIO; ?>:<?php echo $usr->NOMBRE; ?>"><?php echo $usr->NOMBRE; ?></option>-->
									<?php
									}else{
									?>
									<!--<option value="<?php echo $usr->USUARIO; ?>"><?php echo $usr->NOMBRE; ?></option>-->
									<option value="<?php echo $usr->ID_USUARIO; ?>"><?php echo $usr->NOMBRE; ?></option>
									<?php
									}
									?>
									<?php endforeach; ?>
								</select>

							</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>																																

						<tr>
							<td align="right"><b>Buscar por fechas:</b></td>
							<td><select name="ltaFechas" id="ltaFechas" class="form-control"> 
								<?php  if ($idbuscfechas==0){   ?>
									<option selected value="0">No</option>     
								<?php
									}else{
									?>  
									<option value="0">No</option>     
								<?php  }    ?> 
								<?php  if ($idbuscfechas==1){   ?>
									<option selected value="1">Si</option>                                    
								<?php
									}else{
									?>  
									<option value="1">Si</option>                                    
								<?php  }    ?> 

								</select>
							</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>                        
						<tr>
							<td align="right"><b>Fecha inicial:</b></td>                            
							<td width="200px">                                    
								<?php  if ($fechaIni>""){   ?>
									<input type="date" name="fechaIni" id="fechaIni" value="<?php echo $fechaIni; ?>">
								<?php
									}else{
									?>  
									<input type="date" name="fechaIni" id="fechaIni" value="<?php echo date('Y-m-d'); ?>">
								<?php  }    ?> 
							</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>                        
						<tr>
							<td align="right"><b>Fecha final:</b></td>
							<td >
								<?php  if ($fechaIni>""){   ?>
									<input type="date" name="fechaFin" id="fechaFin" value="<?php echo $fechaFin; ?>">
								<?php
									}else{
									?>  
									<input type="date" name="fechaFin" id="fechaFin" value="<?php echo date('Y-m-d'); ?>">
								<?php  }    ?>                                
							</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>                        
						<tr>
							<td></td>
							<td><input type="submit" name="submit" Value="Buscar" style="width: 100px;margin-left: 20px;margin-top: 10px;"/></td>
							<td><b></b></td>
							<!--<td><input type="submit" name="reporte" Value="Reporte"/></td>
							<td><b></b></td>-->
						</tr>

						<!--<tr>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="reporte" id="reporte" Value="Reporte Web" onclick="event.preventDefault(); generaReporte();"/></td>
					  </tr>

					  <tr>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="reportePDF" id="reportePDF" Value="Reporte PDF" onclick="event.preventDefault(); generaReportePDF();"/><br></td>
					  </tr>-->

					  <div style="width:100%;">							
							<button type="submit" name="reporte" id="reporte" onclick="event.preventDefault(); generaReporte();" style="width: 160px;margin-right: 20px;">Reporte Web</button>
							<button type="submit" name="reportePDF" id="reportePDF" onclick="event.preventDefault(); generaReportePDF();" style="width: 160px;margin-right: 20px;">Reporte PDF</button>
							<button type="submit" name="generarMapa" id="generarMapa" onclick="event.preventDefault(); generaMapa();" style="width: 160px;margin-right: 20px;">Mapa Registros</button>
							<button type="submit" name="generarAviso" id="generarAviso" onclick="event.preventDefault(); generaAviso();" style="width: 160px;margin-right: 20px;">Generar Aviso</button>
						</div>

						<div style="width:100%;">							
							<button type="submit" name="seleccionar" id="seleccionar" onclick="event.preventDefault(); seleccionarTodo();" style="width: 160px;margin-right: 20px;">Sel. todos</button>
							<button type="submit" name="quitar" id="quitar" onclick="event.preventDefault(); quitarTodo();" style="width: 160px;margin-right: 20px;">Quitar todos</button>
							<button type="submit" name="asignais" id="asignais" onclick="event.preventDefault(); asignaIndServ();" style="width: 160px;margin-right: 20px;">Asignar I. S.</button>							
						</div>

					<!--</table>-->
						<tr>
							
							<td>  <!-----Including PHP Script----->
								  <?php include 'searchaopar.php';?></td>
						</tr>
						<tr>
						  <td>&nbsp;</td>
						</tr>
					  <!--</table>-->
					</div> <!-- EN LUGAR DE LA TABLA -->           
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
		<!-- Load google maps api and call initializeMap function defined in app.js -->
		<script async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initializeMap"></script>
		<!-- css3-mediaqueries.js for IE8 or older -->
		<!--[if lt IE 9]>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript" src="js/app.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#ltaDistritos").change(function(){
			//alert ("Despues de seleccionar distrito");
			distrito=$("#ltaDistritos").val();
			//alert ("distrito " + distrito);
			
			//alert ("distrito " + distrito);
			var arrdist = new Array();
			arrdist=distrito.split(":");
			$.get("get_rutas_ao_par.php","ID_DISTRITO="+arrdist[0], function(data){
				$("#ltaEstados").html(data);
				console.log(data);
			});
			//alert ("id distrito " + arrdist[0]);
		   /* var distrito=$("#ltaDistritos").val();
			alert (distrito);
			var arrdist = new Array();
			arrdist=distrito.split(:);
			/*$.get("get_rutas_ao_par.php","ID_DISTRITO="+$("#ltaDistritos").val(), function(data){
				$("#ltaEstados").html(data);
				console.log(data);
			});
			$.get("get_rutas_ao_par.php","ID_DISTRITO="+arrdist[0], function(data){
				$("#ltaEstados").html(data);
				console.log(data);
			});*/
		});

		$("#ltaEstados").change(function(){
			ruta=$("#ltaEstados").val();
			var arrdist = new Array();
			arredo = ruta.split(":");
			$.get("get_tramos_par.php","ID_RUTA="+arredo[0], function(data){
				$("#ltaTramos").html(data);
				console.log(data);
			});
			/*$.get("get_tramos_par.php","ID_RUTA="+$("#ltaEstados").val(), function(data){
				$("#ltaTramos").html(data);
				console.log(data);
			});*/
		});

		$("#ltaEstandar").change(function(){
			est=$("#ltaEstandar").val();
			var arrest = new Array();
			arrsubest = est.split(":");
			$.get("get_subestandar_cons.php","ID_ESTANDAR="+arrsubest[0], function(data){
				$("#ltaSubEstandar").html(data);
				console.log(data);
			});
		});



	});//document.ready





  //document.getElementById('reporte').onclick = function() {      
  function generaReporte(){    
	const tableReg = document.getElementById('registros');
	var rg=0;
	var ch;
	var chb;
	var check;
	var ireg=0;
	var bMostrar=false;
	//var formData = new FormData();
	var cadena="";
//    rg=725;
//  chb=document.getElementById('725').checked;
//    chb=document.getElementById(rg).checked;
//    alert ('Valor del chb: '+chb);

	//alert('Registros: '+tableReg.rows.length);
	for (var i=2;i < document.getElementById('registros').rows.length; i++){
	  //alert('Registro recorrido: '+i);
	  rg=document.getElementById('registros').rows[i].cells[2].innerHTML;
	  chb=document.getElementById(rg).checked;
	  if (chb == true)
	  {
			ireg=ireg+1;
			//formData.append('idreg'+ireg,rg);
			cadena=cadena+"&"+"reg"+ireg+"="+rg;
			bMostrar=true;
			//alert ('chb seeleccionado '+rg+' Valor del chb: '+chb);        
	  }                  

	  /*// Create a form
	  var mapForm = document.createElement("form");
	  mapForm.target = "_blank";    
	  mapForm.method = "POST";
	  mapForm.action = "http://www.vercaminos.com/reportewebfiltro.php";
	  // Create an input
	  var mapInput = document.createElement("input");
	  mapInput.type = "text";
	  mapInput.name = "variable";
	  mapInput.value = "lalalalala";
	  // Add the input to the form
	  mapForm.appendChild(mapInput);  
	  // Add the form to dom
	  document.body.appendChild(mapForm); 
	  form.submit();
	  document.body.removeChild(form);*/


	  //if (bMostrar) 
	  //{
		/*$.ajax({                
		  url: "reportewebfiltro.php",
		  type: 'post',
		  data: formData,          
		  contentType: false,
		  processData: false,
		  beforeSend: function(){
		  //$('.actual').attr("disabled","disabled");
		  //$('#actpar').css("opacity",".5");
		  },
		  success: function(message) {
			//alert ("MENSAJE: "+message);
			//var win = window.open();
			//win.document.write(data);

			//  var w = window.open('data:text/csv;charset=utf-8,' + encodeURIComponent(data));
			//  w.focus();
			if (message == 1){
				
				//******************************************************
				//Cuando es ventana popup usamos para refrescar la ventana
			//    window.opener.location.href=window.opener.location.href;
				//Cuando es ventana popup cerramos la ventana                
				//******************************************************
			}

		  }
		});*/
	  //}

	  //alert ('chb seeleccionado '+rg+' Valor del chb: '+chb);      
	  //chb=document.getElementById(rg).checked;
	  //ch=document.getElementById('registros').rows[i].cells[1].innerHTML;
	  //var chb=document.getElementById('"+rg+"');
	  //var chb=document.getElementById('725').checked;
	//  var valor=chb.checked;

	  //alert('chb seeleccionado '+rg+' checked '+valor );
	  /*if (chb.checked == true)
	  {
		alert('checkbox seleccionado '+rg);             
	  } */    

	  //alert('Valor registro: '+rg);
	  //for (var j=0; j<4; j++){
	  //              textos = textos + document.getElementById('registros').rows[i].cells[j].innerHTML + " -> ";
	  //       }
	 }//ciclo for recorrer la tabla
	if (bMostrar)
	{
	  window.open("reportewebfiltro.php?registros="+ireg+cadena,'_blank');  
	}
	else
	{
	  alert('Debe seleccionar por lo menos 1 registro para generar el reporte.');
	}

	 //formData.append('total',ireg);
	 
	 //window.open("reportewebfiltro.php",'_blank');  

	/*for (let i = 3; i < tableReg.rows.length; i++) {
	  alert('valor de i: '+i);
	  const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
	  valor = cellsOfRow[1].innerHTML(); 
	  alert('No. Reg.: '+valor);
	}*/


  }; 


  function generaReportePDF(){    
		const tableReg = document.getElementById('registros');
		var rg=0;
		var ch;
		var chb;
		var check;
		var ireg=0;
		var bMostrar=false;
		var cadena="";

		for (var i=2;i < document.getElementById('registros').rows.length; i++){
		  rg=document.getElementById('registros').rows[i].cells[2].innerHTML;
		  chb=document.getElementById(rg).checked;
		  if (chb == true)
		  {
				ireg=ireg+1;
				cadena=cadena+"&"+"reg"+ireg+"="+rg;
				bMostrar=true;
		}                  
		}//ciclo for recorrer la tabla
		if (bMostrar)
		{
		  window.open("generareportepdf.php?registros="+ireg+cadena,'_blank');  
		}
		else
		{
		  alert('Debe seleccionar por lo menos 1 registro para generar el reporte.');
		}
  }; 

  function generaMapa(){    
		const tableReg = document.getElementById('registros');
		var rg=0;
		var ch;
		var chb;
		var check;
		var ireg=0;
		var bMostrar=false;
		var cadena="";

		for (var i=2;i < document.getElementById('registros').rows.length; i++){
		  rg=document.getElementById('registros').rows[i].cells[2].innerHTML;
		  chb=document.getElementById(rg).checked;
		  if (chb == true)
		  {
				ireg=ireg+1;
				cadena=cadena+"&"+"reg"+ireg+"="+rg;
				bMostrar=true;
		}                  
		}//ciclo for recorrer la tabla
		if (bMostrar)
		{
		  window.open("mapafiltro.php?registros="+ireg+cadena,'_blank');  
		}
		else
		{
		  alert('Debe seleccionar por lo menos 1 registro para poder ver el mapa.');
		}
  }; 

  function generaAviso(){    
		const tableReg = document.getElementById('registros');
		var rg=0;
		var ch;
		var chb;
		var check;
		var ireg=0;
		var bMostrar=false;
		var cadena="";

		for (var i=2; i < document.getElementById('registros').rows.length; i++){
		  rg=document.getElementById('registros').rows[i].cells[2].innerHTML;
		  chb=document.getElementById(rg).checked;
		  if (chb == true)
		  {
				ireg=ireg+1;
				cadena=cadena+"&"+"reg"+ireg+"="+rg;
				bMostrar=true;
		}                  
		}//ciclo for recorrer la tabla
		if (bMostrar)
		{
		  //window.open("avisopar.php?registros="+ireg+cadena, this.target, 'width=410 height=766, toolbar=no, location=no, status=no, menubar=no'); 
		  window.open("avisopar.php?registros="+ireg+cadena, this.target, 'width=500 height=496, toolbar=no, location=no, status=no, menubar=no');  
		}
		else
		{
		  alert('Debe seleccionar por lo menos 1 registro para poder generar un aviso.');
		}
  };

  function seleccionarTodo(){    
		const tableReg = document.getElementById('registros');
		var rg=0;
		var ch;
		var chb;
		var check;
		var ireg=0;
		var bMostrar=false;
		var cadena="";

		for (var i=2; i < document.getElementById('registros').rows.length; i++){
		  rg=document.getElementById('registros').rows[i].cells[2].innerHTML;
		  chb=document.getElementById(rg);
		  chb.checked=true;
		}//ciclo for recorrer la tabla		
  };

  function quitarTodo(){    
		const tableReg = document.getElementById('registros');
		var rg=0;
		var ch;
		var chb;
		var check;
		var ireg=0;
		var bMostrar=false;
		var cadena="";

		for (var i=2; i < document.getElementById('registros').rows.length; i++){
		  rg=document.getElementById('registros').rows[i].cells[2].innerHTML;
		  chb=document.getElementById(rg);
		  chb.checked=false;		
		}//ciclo for recorrer la tabla		
  };

  function asignaIndServ(){    
		const tableReg = document.getElementById('registros');
		var rg=0;
		var ch;
		var chb;
		var check;
		var ireg=0;
		var bMostrar=false;
		var cadena="";

		for (var i=2; i < document.getElementById('registros').rows.length; i++){
		  rg=document.getElementById('registros').rows[i].cells[2].innerHTML;
		  chb=document.getElementById(rg).checked;
		  if (chb == true)
		  {
				ireg=ireg+1;
				cadena=cadena+"&"+"reg"+ireg+"="+rg;
				bMostrar=true;
		}                  
		}//ciclo for recorrer la tabla
		if (bMostrar)
		{
		  //window.open("avisopar.php?registros="+ireg+cadena, this.target, 'width=410 height=766, toolbar=no, location=no, status=no, menubar=no'); 
		  window.open("indiceserviciopar.php?registros="+ireg+cadena, this.target, 'width=500 height=496, toolbar=no, location=no, status=no, menubar=no');  
		}
		else
		{
		  alert('Debe seleccionar por lo menos 1 registro para poder asignar el índece de servicio.');
		}
  };

</script>
	   
	</body>
	<script src="jquery-1.12.4.min.js"></script>
  <script src="FileSaver.min.js"></script>
  <script src="Blob.min.js"></script>
  <script src="xls.core.min.js"></script>
  <script src="dist/js/tableexport.js"></script>
  <script>
	$("table").tableExport({
	  formats: ["xlsx"], //Tipo de archivos a exportar ("xlsx","txt", "csv", "xls")
	  position: 'top',  // Posicion que se muestran los botones puedes ser: (top, bottom)
	  bootstrap: true,//Usar lo estilos de css de bootstrap para los botones (true, false)
	  fileName: "ConsultaAvance",    //Nombre del archivo 
	});
  </script>

  <script>
  	function validarNumero(numero){
    if (!/^([0-9])*$/.test(numero))
    	alert("El valor " + numero + " no es un número de registro permitido, cambie el valor para poder continuar.");
  	}

  	function validarNumeroDecimal(valor) {
    var RE = /^\d*\.?\d*$/;
    /*if (RE.test(valor)) {
        //return true;
        //alert ("valor permitido");
    } else {
      alert("El valor introducido: " + numero + " no es permitido, cambie el valor para poder continuar.");
    }*/
    //if (!/^([0-9])*$/.test(numero))
    if (!RE.test(valor)) {
    	alert("El valor introducido: " + valor + " no es permitido, cambie el valor para poder continuar.");
    }
}
	</script>  	

</html>