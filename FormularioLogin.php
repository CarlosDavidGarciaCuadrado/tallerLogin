<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inicio</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<header>
  <center><h1>Inicio de Sesión</h1></center>
</header>
<body>
  <center>
  <div id="contenedor">

    <section>
       <form id="formulario" name="formulario" action="FormularioLogin.php" method="post">
            <input id="Usuario" type="text" placeholder="Nombre de Usuario">
            <input id="Contraseña" type="text" placeholder="Contraseña">
            <button id="registro" value="registro" type="submit" name="registro"><a href="Ventana.php">Iniciar Sesion</a> </button>
       </form>
    </section> 
    
  </div>
</center>
</body>
</html>