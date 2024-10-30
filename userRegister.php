<?php 
session_start();

include "config/banco.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST["novonome"];
    $login = $_POST["novologin"];
    $senha = $_POST["novosenha"];
    
    $usuario = buscarUsuario($conexao,$login,$senha);

    if ($usuario){
        $_SESSION["mensagem"] = "Login usuário já existe!";
        header("Location: cadastroUsuario.php");
        exit();
    }
    else{
        $cadastrar = salvarUsuario($conexao,$login,$senha,$nome);
        if($cadastrar){
            $_SESSION["mensagem"] = "Usuario cadastro com sucesso!";
        }
        else{
            $_SESSION["mensagem"] = "Erro o cadastrar usuário!";
        }
        header("Location: cadastroUsuario.php");
        exit();
    }
    
}

function buscarUsuario ($conexao,$usuario,$senha){
    $sql = "SELECT * FROM USUARIOS WHERE login = '$usuario' and senha = '$senha'" ;
    $result = mysqli_query($conexao,$sql);
    $usuario = mysqli_fetch_assoc($result);
    return $usuario;
}

function salvarUsuario ($conexao,$login,$senha, $nome){
    //tabela foi configurada para incrementar valor coluna ID automaticamente
    $sql = "INSERT INTO USUARIOS ( login, senha, nome, status) VALUES ('$login','$senha','$nome',1)" ;
    $result = mysqli_query($conexao,$sql);
    return $result;
}

?>