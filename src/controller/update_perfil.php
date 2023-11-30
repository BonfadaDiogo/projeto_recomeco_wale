<?php
$a = explode("\\", __DIR__);
$dir = "/{$a[1]}/{$a[2]}/{$a[3]}";

//Importação do cabeçalho
include $dir."/src/controller/header.php";

//Importação dos arquivos que contém as classes User e Database
include MODEL . "/user.php";
include MODEL . "/database.php";

//Importando arquivo que verifica se a sessão está "desligada".
//Caso esteja, redireciona o usuário para a página de login
include CONTROLLER . "/session_off.php";

session_reset();

//Lançando dados da $_SESSION para uma variável
//simples, apenas para facilitar nossa vida
$u = $_SESSION["user"];
//var_dump( $u );

//Recebendo os dados do formulário
if( isset($_GET["photo"]) ) {
    $photo = $_GET["photo"];
} else {
    $photo = null;
}

if( isset($_GET["user"]) ) {
    $user = $_GET["user"];
} else {
    $user = null;
}

if( isset($_GET["numberCnh"]) ) {
    $numberCnh = $_GET["numberCnh"];
} else {
    $numberCnh = null;
}


if( isset($_GET["birth"]) ) {
    $birth = $_GET["birth"];
} else {
    $birth = null;
}

if( isset($_GET["first-name"]) ) {
    $firstName = $_GET["first-name"];
} else {
    $firstName = null;
}

if( isset($_GET["last-name"]) ) {
    $lastName = $_GET["last-name"];
} else {
    $lastName = null;
}

if( isset($_GET["desc"]) ) {
    $desc = $_GET["desc"];
} else {
    $desc = null;
}

if( isset($_GET["cep"]) ) {
    $cep = $_GET["cep"];
} else {
    $cep = null;
}

if( isset($_GET["address"]) ) {
    $address = $_GET["address"];
} else {
    $address = null;
}

if( isset($_GET["number"]) ) {
    $number = $_GET["number"];
} else {
    $number = null;
}

if( isset($_GET["complement"]) ) {
    $complement = $_GET["complement"];
} else {
    $complement = null;
}

if( isset($_GET["neighborhood"]) ) {
    $neighborhood = $_GET["neighborhood"];
} else {
    $neighborhood = null;
}

if( isset($_GET["city"]) ) {
    $city = $_GET["city"];
} else {
    $city = null;
}

if( isset($_GET["state"]) ) {
    $state = $_GET["state"];
} else {
    $state = null;
}

if( isset($_GET["sex"]) ) {
    $sex = $_GET["sex"];
} else {
    $sex = null;
}

if( isset($_GET["phone"]) ) {
    $phone = $_GET["phone"];
} else {
    $phone = null;
}

if( isset($_GET["email"]) ) {
    $email = $_GET["email"];
} else {
    $email = null;
}

if( isset($_GET["notify"]) ) {
    $notify = 1;
} else {
    $notify = 0;
}

if( isset($_GET["new-pass"]) ) {
    $newPass = $_GET["new-pass"];
} else {
    $newPass = null;
}
   
    //Pegando o cod do usuário
    $cod = $u->getCod();

    //Instanciando a classe Database
    $db = new Database();

    //Fazendo uso do método update da classe
    $db->update(
        "UPDATE users SET
        user_name           ='$user',
        user_photo          ='$photo',
        user_birth          ='$birth',
        user_first_name     ='$firstName',
        user_last_name      ='$lastName',
        user_desc           ='$desc',
        user_cep            ='$cep',
        user_address        ='$address',
        user_number         ='$number',
        user_complement     ='$complement',
        user_neighborhood   ='$neighborhood',
        user_city           ='$city',
        user_state          ='$state',
        user_sex            ='$sex',
        user_phone          ='$phone',
        user_email          ='$email',
        user_notify         = $notify,
        user_new_pass       ='$newPass'
        WHERE user_cod      = $cod"
    );

    echo "<p>Atualizando dados...</p>";

    //Atualizando dados na sessão
    $_SESSION["user"]->updateObject($cod);

    //Redirecionando para a página de perfil
   // header("Refresh: 2; url=".ROOT);

    //var_dump( $_SESSION["user"] );

//Importando o rodapé
include $dir."/src/controller/footer.php";