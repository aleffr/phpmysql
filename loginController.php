<?php 
session_start();

include "config/banco.php";

$validarUsuario = "admin";
$validarSenha = "admin123";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $login = $_POST["usuario"];
    $senha = $_POST["senha"];
    
    $usuario = buscarUsuario($conexao,$login,$senha);

    if ($usuario){
        
        header("Location: menu.php");
        exit();
    }
    else{
        echo "Usuário ou senha incorretos!";
    }
    
}

function buscarUsuario ($conexao,$usuario,$senha){
    $sql = "SELECT * FROM USUARIOS WHERE login = '$usuario' and senha = '$senha'" ;
    $result = mysqli_query($conexao,$sql);
    $usuario = mysqli_fetch_assoc($result);
    return $usuario;
}

?>