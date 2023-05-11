<!DOCTYPE html>
<html lang="es">
	<head>
        <style>
* {box-sizing: border-box}
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: #C0C0C0;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: black;
  text-decoration: none;
  font-size: 17px;
  width: 12%; /* Four links of equal widths */
  text-align: center;
}

.navbar a:hover {
  background-color: #75c7ff;
}

.navbar a.active {
  background-color: #4fa8fb;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
<body>


<div class="navbar">
 <a href="index.php?c=Inicio">INICIO</a> 
  <a href="index.php?c=Usuario">USUARIOS</a> 
  <a href="index.php?c=Persona">CLIENTE</a> 
  <a href="index.php?c=Categoria">CATEGORIA</a> 
  <a href="index.php?c=producto">PRODUCTO</a>
  <a href="index.php?c=Factura">FACTURA</a>
  <a href="index.php?c=DetalleFac">DETALE FACTURA</a>
  <a href="index.php?c=Comprobante">COMPROBANTE CREDITO</a>
  <a href="index.php?c=DetalleCre">DETALLE CREDITO FISCAL</a>
  <a href="Login/cerrar_sesion.php">CERRAR SESION</a>

</div>

		<title>Proyecto Super</title>
        
        
        <meta charset="utf-8" />
        
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	</head>
    <body>
    
   <!-- &nbsp;
<nav class="navbar navbar-expand-sm bg-light justify-content-center" style="background-color: #e3f2fd;">
<ul class="nav justify-content-center">
    <a href=""> 
        Inicio
    </a>
&nbsp;
    <a href="">
        Cliente
    </a>
    &nbsp;
    <a href="">
        Categoria
        </a>
        &nbsp;
    <a href="">
       Producto
        </a>
        &nbsp;
    <a href="">
        Factura
        </a>
        &nbsp;
    <a href="">
    Detalle Factura
        </a>

   <a href="">
    Comprobante Credito Fiscal
  </a>

 <a href="">
         Detalle Credito Fiscal
        </a>
</nav>-->

<div class="container">
        
    <div class="container">
        