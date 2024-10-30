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
    <title>Cadastar Novo Usuário</title>
    <link rel="stylesheet" href="assests\css\stylesCadastro.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1><a href="menu.php">Logo</a></h1>
        </div>
        <nav>
            <ul>
                <li><a href="tarefas.php">Tarefas</a></li>
                <li><a href="cadastroUsuario.php">Cadastrar Usuário</a></li>
                <li><a href="editarContatos.php">Editar Contatos</a></li>
            </ul>
        </nav>
        <h4>Bem-vindo <strong><?php echo $_SESSION["usuario"]; ?></strong></h4>
    </header>
    <section>
        <h2>Cadastro de Novos Usuários</h2>
        <form action="userRegister.php" method="post">
            
            <label for="idNovoNome">Informe o nome do usuário*</label>
            <input type="text" name="novonome" id="idNovoNome">
            
            <label for="idNovoLogin">Informe login para acesso*</label>
            <input type="text" name="novologin" id="idNovoLogin">
            
            <label for="idNovoSenha">Informe uma senha*</label>
            <input type="password" name="novosenha" id="idNovoSenha">

            <input type="submit" value="Criar">
        </form>
    </section>
</body>
</html>