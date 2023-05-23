<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FONASA</title>

    <link href="css/bootstrap.min.css?v=<?=time()?>" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=<?=time()?>" rel="stylesheet">
	
	<!-- Mainly scripts -->
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<!-- Custom and plugin javascript -->
	<script src="js/inspinia.js"></script>
	<script src="js/plugins/pace/pace.min.js"></script>

    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
 
	

</head>

<body style="background-color: #003989;">

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
							
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<img src="img/Fonasa_logo.png" width="180" height="100" />
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=$_SESSION['user']?> <b class="caret"></b></strong>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="logout.php">Cerrar Sesión</a></li>
                            </ul>
                    </div>
                    <div class="logo-element">
                        AR+
                    </div>
                </li>
                <li <?=(isset($_GET['cat']) && in_array($_GET['cat'], array("1")) ? "class='active'" : "")?>>
                    <a href="index.php?cat=1"><i class="fa fa-calendar"></i> <span class="nav-label">Listas Atención</span> </a>
                </li>
                <li <?=(isset($_GET['cat']) && in_array($_GET['cat'], array("2")) ? "class='active'" : "")?>>
                    <a href="index.php?cat=2"><i class="fa fa-dashboard"></i> <span class="nav-label">Consultas</span></a>
                </li>
         
		
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i> Cerrar Sesión
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
