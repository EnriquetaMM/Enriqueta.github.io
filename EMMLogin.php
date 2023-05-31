<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv="X-UA-compatible"> 
        <title>DPW1_U2_A3_ENMM_Login</title>
        <link rel="stylesheet" href="EMMEstilos.CSS" href = EMMLíneadeVentas.html>
    </head> 
    <body> 
    <?php
//conectar();
include_once 'EMMInterfazAdministrador.html';
include_once 'EMMInterfazdeOperador.html';

$IdUsuario = $_POST['IdUsuario'];
$Contrasena = $_POST['Contrasena'];
//$NombreUsuario = $_POST['NombreUsuario'];
echo "IdUsuario: ".$IdUsuario."<br>";
echo "Contrasena: ".$Contrasena."<br>";
//echo "NombreUsuario: ".$NombreUsuario."<br>";
//exit;
$conn = mysqli_connect('localhost', 'root', '', 'DPW1_U2_ENMM_Boutique');
$consulta = "Select * from Usuario Where IdUsuario='$IdUsuario' and Contrasena = '$Contrasena'";
$resultado = mysqli_query($conn, $consulta);
$filas = mysqli_fetch_array($resultado);
if($IdUsuario==false){   
    //("EMMErrorUsuario.html");
    //window.open = 'EMMLíneadeVentas.html'</script>";
    header("Location:EMMError.html");
    //echo'<h1><script>alert("El usuario no existe"); </script></h1>';
} else
    if($Contrasena==false){
    //include("EMMErrorContraseña.html");
    //window.open = 'EMMLíneadeVentas.html'</script>";
    header("Location:EMMErrorContraseña.html");
    //echo'<h1><script>alert("El usuario no existe"); </script></h1>';
    //echo("Error en la Contraseña: ".$Contrasena."<br>");
    }
 if($filas['IdRol']==1){
    //echo("<h4>Bienvenido: " .$NombreUsuario."</h4>");
    //window.open = 'EMMInterfazAdministrador.html'</script>";
    header("Location:EMMInterfazAdministrador.html");
} 
else if($filas['IdRol']==2){
    //echo("Bienvenido: " .$NombreUsuario."<br>");
    //window.open = 'EMMInterfazdeOperador.html'</script>";
    header("Location:EMMInterfazdeOperador.html");

}
    
 else{
        //include("EMMErrorRol.html");
         //window.open = 'EMMLíneadeVentas.html'</script>";
         header("Location:EMMErrorUsuario.html");
         //echo'<h1><script>alert("Rol Inexistente"); </script></h1>';
    
    } 


mysqli_free_result($resultado);
mysqli_close($conn);
//cerrar();
?>  
    </body>
</html>