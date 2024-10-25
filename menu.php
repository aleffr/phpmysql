<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    $userLog = $_SESSION;
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assests/css/styleMenu.css">
</head>

<body>
    <header>
        <div class="logo">
            <h1>Logo</h1>
        </div>
        <nav>
            <ul>
                <li><a href="tarefas.php">Tarefas</a></li>
                <li><a href="cadastroUsuario.php">Cadastrar Usuário</a></li>
                <li><a href="editarContatos.php">Editar Contatos</a></li>
            </ul>
            <h4>Bem-vindo <strong><?php echo $_SESSION["usuario"]; ?></strong></h4>
        </nav>
    </header>
</body>

</html>