<?php
//Importação de arquivos
include "./const.php";
include "./src/model/user.php";
include MODEL."/database.php";

session_start();

if( isset($_POST["user"]) &&
    isset($_POST["pass"]) ) {
        //Criar um novo objeto da classe User
        $user = new User(
            $_POST["user"],
            $_POST["pass"]
        );
        //Fazendo uso do método de verificação de login
        if( $user->login() ) {
            if($user->getProfile()==1){
                echo "<script> alert('ADM NA ÁREA! ✅') </script>"; 
                $_SESSION["adm"] = $user->getObject();
                header("Refresh: 0; URL = ".VIEW."/adm.php");
            }else{
                if($user->getStatus()!=1) {
                    //é apresentado um alert javascript
                    echo "<script> alert('AUTENTICADO! ✅') </script>";
                    //é criada uma sessão com os dados do objeto retornado
                    $_SESSION["user"] = $user->getObject();
                    //e então somos redirecionados para a pagina de perfil
                    //var_dump($_SESSION["user"]);
                    header("Refresh: 0; URL = ".VIEW."/perfil.php");
                } else {
                    echo "<script> alert('BANIDO! ❌') </script>";
                }
            }
        } else {
            echo "<script> alert('ACESSO NEGADO! ❌') </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= DESCRIPTION ?>">
    <meta name="keywords" content="<?= KEYWORDS ?>">
    <meta name="author" content="<?= AUTHOR?>">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title><?= TITLE ?></title>
</head>
<body>
    <div id="login">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
        body{
            background-color: #828282;
            font-family: Arial, Helvetica, sans-serif;
        }
        div{
            background-color: #ac9d4b;
            position: absolute;
            width: 450px;
            padding: 20px;
            text-align: center;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;

}
input{
    padding: 5px;
    border: none;
    outline: none;
    font-size: 20px;
    background-color:black;
    color: #ac9d4b;
    border-radius: 10px;

}

button, input[type="submit"]{
    background-color:black;
    border: none;
    padding: 15px;
    width: 60%;
    border-radius: 10px;
    color:#ac9d4b;
    font-size: 15px;
}
button:hover{
    background-color: #FFFFFF;
    cursor: pointer;

    

}
        
    </style>
</head>
<body>
    <div>
        
        <h1><img src="./assets/img/Wale_logo-2.png" alt="Imagem" width="400"></h1>
        <br><br>
        <form action="#" method="post">
            <input type="text" name="user" placeholder="Usuário">
            <br><br>
            <input type="password" name="pass" placeholder="Senha">
            <br><br>
            
            <input type="submit" value="Entrar">
            <br><br> 
        </form>
            
            <button onclick="window.location.href='<?= VIEW ?>/registro.php'">Não possui login? Cadastre-se. </button>
    </div>
     <script src="./assets/js/script.js"></script>
</body>
</html>
<?php
//Importação do rodapé
include "/xampp/htdocs/projeto_recomeco_wale/src/controller/footer.php";