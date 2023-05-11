<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Y Registro</title>
     <link rel="stylesheet" href="../assets/css/estilo.css">
   
</head>
<body>
    <main>

    <div class="contenedor__todo">

    <div class="caja__trasera">
        <div class="caja__trasera-login">
            <h3>¿Ya tienes una cuenta?</h3>
            <p>Inicia sesion para entrar en la página</p>
            <button id="btn__iniciar-sesion">Inicar Sesion</button>

        </div>
        <div class="caja__trasera-register">
            <h3>Minimarket Bonanza</h3>
            <p></p>
            
        </div>
       </div>
       
       <div class="contenedor__login-register">

       <form action="login_usuario_be.php" method="POST" class="formulario__login">

       <h2>Iniciar Sesion</h2>
       <input type="text" placeholder="Correo Electronico" name="correo">
       <input type="password" placeholder="Contraseña" name="clave">
        <button>Entrar</button>
       </form>


        <!--Registro-->
        <form action="registro.php" method="POST" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre Completo" name="nombres">
                    <input type="text" placeholder="Correo Electronico" name="correo">
                    <input type="text" placeholder="Usuario" name="user">
                    <input type="password" placeholder="Contraseña" name="clave">
                    <button>Registrarse</button>
                 </form>

       </div>


    </div>
</main>
<script src="../assets/js/script.js"></script>

</body>
</html>
                
          
   