<?php 
//************************
//***** Variables*********
//************************

$Identificación=$_POST['Identificación'];;
$Nombres=$_POST['Nombres'];
$Apellidos=$_POST['Apellidos'];
$Email=$_POST['Email'];
$Tipo=$_POST['Tipo'];
$Username=$_POST['Username'];
$Password=$_POST['Password'];
$DepPro=$_POST['DepPro'];

$Pass_crypt=password_hash($Password, PASSWORD_BCRYPT) //---> eNCRYPTADO


//************************
//***** Validacion *******
//************************


if(isset($_POST['registro'])){
    if(empty($Identificación)){
        echo "<p class='¡error'>* Agrega tu identificación </p>";
    }else{
        if(strlen($Identificación) > 20){
            echo "<p class='¡error'>* La identificacion es muy larga </p>";
        }
        if(!is_numeric($Identificación)){
            echo "<p class='¡error'>* La identificacion debe ser un numero </p>"; 
        }
    }
    if(empty($Nombres)){
        echo "<p class='¡error'>* Agrega tu nombre </p>";
    }else{
        if(strlen($Nombres) > 100){
            echo "<p class='¡error'>* El nombre es muy largo </p>";
        }
        if(!ctype_alpha($Nombres)){
            echo "<p class='¡error'>* su nombre contiene numeros </p>";
        }
    }
    if(empty($Apellidos)){
        echo "<p class='¡error'>* Agrega tu apellido </p>";
    }else{
        if(strlen($Apellidos) > 100){
            echo "<p class='¡error'>* El apellido es muy largo </p>";
        }
        if(!ctype_alpha($Apellidos)){
            echo "<p class='¡error'>* su apellido contiene numeros </p>";
        }
    }
    if(empty($Email)){
        echo "<p class='¡error'>* Agrega tu correo electronico </p>";
    }else{
        if(strlen($Email) > 150){
            echo "<p class='¡error'>* El correo electronico es muy largo </p>";
        }
        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            echo "<p class='¡error'>* Su correo electronico es invalido </p>";
        }            
    }
    if(empty($Tipo)){
        echo "<p class='¡error'>* Selecciona si eres administrativo o profesor </p>";
    }else{
        if(!filter_var($Tipo, FILTER_VALIDATE_INT)){
            echo "<p class='¡error'>* Selecciona si eres administrativo o profesor </p>";
        }
    }
    if(empty($Username)){
        echo "<p class='¡error'>* Agrega tu nombre de usuario </p>";
    }else{
        if(strlen($Username) > 20){
            echo "<p class='¡error'>* El nombre de usuario es muy largo </p>";
        }
        if(!ctype_alnum($Username)){
            echo "<p class='¡error'>* Su nombre de usuario contiene elementos no validos </p>";
        }
    }
    if(empty($Password)){
        echo "<p class='¡error'>* Agrega tu clave </p>";
    }else{
        if(strlen($Password) > 20){
            echo "<p class='¡error'>* La clave es muy larga </p>";
        }
        if(strlen($Password) < 5){
            echo "<p class='¡error'>* La clave es muy larga </p>";
        }
        if(!ctype_alnum($Password)){
            echo "<p class='¡error'>* Su clave contiene elementos no validos </p>";
        }
    }
    if(empty($DepPro)){
        echo "<p class='¡error'>* escoje tu dependencia/programa </p>";
    }else{
        if(!filter_var($DepPro, FILTER_VALIDATE_INT)){
            echo "<p class='¡error'>* Selecciona una dependencia o un programa </p>";
        }
    }
}



//************************
//***** Conectando *******
//************************
try {
    $mbd = new PDO('mysql:host=localhost;dbname=db_desarrollo', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

$sql = "INSERT INTO dato_personal (Identificación, Nombres, Apellidos, Email, Tipo, Username, Password, DepPro)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$sth = $conexion->prepare($sql);

$sth->bindParam(1, $Identificación, PDO::PARAM_INT);
$sth->bindParam(2, $Nombres, PDO::PARAM_STR);
$sth->bindParam(3, $Apellidos, PDO::PARAM_STR);
$sth->bindParam(4, $Email, PDO::PARAM_STR);
$sth->bindParam(5, $Tipo, PDO::PARAM_INT);
$sth->bindParam(6, $Username, PDO::PARAM_STR);
$sth->bindParam(7, $Pass_crypt, PDO::PARAM_STR);
$sth->bindParam(8, $DepPro, PDO::PARAM_INT);

if(!$sth->execute()){
    echo "Error al ejecutar la consulta";
    exit;
}else{
    echo "Exito";
    exit;
}
?>