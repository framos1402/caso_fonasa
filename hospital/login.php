
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FONASA</title>

    <link href="css/bootstrap.css?v=<?=time()?>" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=<?=time()?>" rel="stylesheet">
    
    <style>
	/*
		html { 
		  background: url(img/05.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
	*/
	</style>

</head>

<body>

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div style="text-align: center;">
                <img src="img/Fonasa_logo.png" width="200" height="100"/>
            </div>
			<br />
            <p><b>Sistema de Atención</b></p>
			            <form class="m-t" role="form" method="post" action="comprueba.php">
                <div class="form-group">
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required>
                </div>
                <div class="form-group">
                    <input type="password" id="clave" name="clave" class="form-control" placeholder="Clave" required>
                </div>
                <button type="submit" class="btn btn-info block full-width m-b">Entrar</button>

            </form>
            
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
