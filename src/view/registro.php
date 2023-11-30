<?php
//Importação do cabeçalho
include "/xampp/htdocs/projeto_recomeco_wale/src/controller/header.php";

include MODEL . "/user.php";
include MODEL . "/database.php";


//Variável para validar se os dados
//foram enviados
$count = 0;

//Recebimento dos dados do formulário
if( isset($_POST["user"]) ) {
    $user = $_POST["user"];
    $count++;
} else {
    $user = null;
}

if( isset($_POST["email"]) ) {
    $email = $_POST["email"];
} else {
    $email = null;
}

if( isset($_POST["pass"]) ) {
    $pass = $_POST["pass"];
    $count++;
} else {
    $pass = null;
}

var_dump($email);

if($count == 2) {
   //instanciar classe Database
   $db = new Database();

   //criptografando senha
   $passCripto = sha1($pass);

   //salvando no BD
   $db->insert(
    "INSERT INTO users(user_name, user_pass, user_email)
    VALUES('$user' , '$passCripto', '$email')"
   );

    //Mensagem de sucesso
    echo "<script> alert('Cadastro realizado! ✅') </script>";

    //Redirecionamento para index
    header("Refresh: 0; url = ".ROOT);
}

?>


    <div id="login">
        <h1>Registro</h1>
        <form action="#" method="post" onsubmit="return checkPass()">
            <div id="login-fields">
                <input type="text" name="user" id="user" class="login" placeholder="Nome de usuario *" required>
                <br><br>
                <input type="email" name="email" id="email" class="login" placeholder="Email">
                <br><br>
                <input type="password" onmouseover="showPass(this)" onmouseleave="hidePass(this)" name="pass" id="pass" class="login" placeholder="Senha *" required>
                <br><br>
                <input type="password" onmouseover="showPass(this)" onmouseleave="hidePass(this)" name="pass-confirm" id="pass-confirm" class="login" placeholder="Confirmação de senha *" required>
                <br><br>
                <span>* Campos obrigatórios</span>
            </div>
            <br><br>
            <input type="submit" value="Registrar ✅">
            <br><br>
        </form>
        <a href="<?= ROOT ?>"><button>Voltar para o login</button> </a>
    </div>

<?php
//Importação do rodapé
include "/xampp/htdocs/projeto_recomeco_wale/src/controller/footer.php";