<?php
require'conectar.php';
$mensaje="";


if(isset($_POST['registro'])){
    if (!empty($_POST['Identificacion']) && !empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Email']) && !empty($_POST['comboTipo']) && !empty($_POST['Usuario']) && !empty($_POST['Contraseña']) && !empty($_POST['miValor'])) {
       //$sql = "INSERT INTO datos_usuario(Nombre_Usuario, Contraseña, Usuario_Ingreso) VALUES ('".$_POST['Nombre']."','".$_POST['Contraseña']."','".$_POST['usuario']."')"; 
       //$sql2 = "SELECT Usuario_Ingreso FROM datos_usuario WHERE Usuario_Ingreso = '".$_POST['usuario']."' ";

       //$usuarioNuevo = mysqli_query($conex, $sql2);
       //$query = mysqli_num_rows($usuarioNuevo);
         
       if ($query > 0) {
          $mensaje2 = "este usuario ya esta registrado";
          }else{
              $query2 = mysqli_query($conex, $sql);

             if ($query2) {
                 //$mensaje = "Se ha registrado exitosamente.";
                 header("Status: 301 Moved Permanently");
                 header("Location: login_Ingreso.php");
                 exit();
                 } else{
                     $mensaje = "ha ocurrido un error, lo sentimos.";
                    }
                                   
                } 
                  //$conex->close();
        }else{
          $mensaje = "";
        }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<header>
  <center><h1>Registro de Usuario</h1></center>
</header>
<body>
  <center>
  <div id="contenedor">

    <?php if(!empty($mensaje)): ?>
           <p><font color="red"><?= $mensaje ?></font></p>
           <?php endif; ?>
    <section>
       <form id="formulario" name="formulario" action="FormularioRegistro.php" method="post">
            <input id="Identificacion" type="number" placeholder="Identificacion">
            <input id="Nombre" type="text" placeholder="Nombres">
            <input id="Apellido" type="text" placeholder="Apellidos" >
            <input id="Email" type="email" placeholder="Email">
            <input id="Usuario" type="text" placeholder="Nombre de Usuario">
            <input id="Contraseña" type="text" placeholder="Contraseña">

            <select name="comboTipo" id="comboTipo" onclick="mostrar(this);">
              <option id="0" value="0"> Cargo</option>
              <option id="1" value="1"> Profesor</option>
              <option id="2" value="2"> Administrativo</option>
            </select>

            <div class="contenidito">
            <div class="valor-desplegable" id="valorDesplegable1">
              <input type="hidden" name="miValor" id="miValor" value="" />
              <div id="miValorVisible" class="valorTexto">Dependencia</div>
              <ul id="seleccion">
                <li>Rectoría
                  <ul>
                    <li data-val="1.1">Oficina de asuntos jurídicos</li>
                    <li data-val="1.2">Oficina de control interno</li>
                    <li data-val="1.3">oficina de comunicaciones</li>
                  </ul>
                </li>
                <li>
                  Vicerrectoría de investigación
                  <ul>
                    <li data-val="2.1">Oficina de investigación</li>
                    <li data-val="2.2">Oficina de atención</li>
                    <li data-val="2.3">Oficina de extensión</li>
                  </ul>
                </li>
                <li>
                  Vicerrectoría Académica
                  <ul>
                    <li data-val="3.1">Oficina de postgrados</li>
                    <li data-val="3.2">Oficina de admisión</li>
                    <li data-val="3.3">Oficina de biblioteca</li>
                  </ul>
                </li>
                <li>Vicerrectoría administrativa
                  <ul>
                    <li data-val="4.1">Oficina de talento humano</li>
                    <li data-val="4.2">Oficina de contratación</li>
                    <li data-val="4.3">Oficina de bienestar</li>
                  </ul>
                </li>
              </ul>
            </div>

            <div class="valor-desplegable" id="valorDesplegable2">
              <input type="hidden" name="miValor2" id="miValor2" value="" />
              <div id="miValorVisible2" class="valorTexto">Programa</div>
              <ul>
                <li>Educación y ciencias
                  <ul>
                    <li data-val2="1.1">Ciencias Naturales</li>
                    <li data-val2="1.2">Ciencias Sociales</li>
                    <li data-val2="1.3">Español</li>
                  </ul>
                </li>
                <li>
                  Medicina veterinaria
                  <ul>
                    <li data-val2="2.1">Investigaciones biologicas</li>
                    <li data-val2="2.2">Ciencias pecuarias</li>
                    <li data-val2="2.3">Ciencias acuícolas</li>
                  </ul>
                </li>
                <li>
                  Ciencias básicas
                  <ul>
                    <li data-val2="3.1">Biología</li>
                    <li data-val2="3.2">Química</li>
                    <li data-val2="3.3">Matemáticas</li>
                  </ul>
                </li>
                <li>Ingeniería
                  <ul>
                    <li data-val2="4.1">Ingeniería ambiental</li>
                    <li data-val2="4.2">Ingeniería Mecánica</li>
                    <li data-val2="4.3">Ingeniería de sistemas</li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
            <button id="registro" value="registro" type="submit" name="registro"> Registrar</button>
       </form>
      <script src="Funciones.js"></script> 
    </section> 
    
  </div>
</center>
</body>
</html>