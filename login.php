<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assests/css/styles.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <div class="box">
        <h2>Login</h2> 
        <form method = "POST" action = "loginController.php">
            <div class="inputBox">
                <input type="text" name="usuario" required/>
                <label>Username :</label>
            </div>
            <div class="inputBox">
                <input type="password" name="senha" required/>
                <label>password :</label>
            </div>
            
            <a href="#" id="forgot-pass">Mot de passe oublié ?</a>

            <input type="submit" value="Acessar"/>
        </form>

        <div id="social-container">   
            <p>ou accès via les réseaux sociaux</p>
            <i class="fa fa-facebook"> </i>
            <i class="fa fa-linkedin"> </i>
        </div>

        <div id="registre-container">
            <p>Pas encore enregistré ?</p>
            <a href="#">Registrar-se</a>
        </div>

    </div>
</body>
</html>