<?php
$a = explode("\\", __DIR__);
$dir = "/{$a[1]}/{$a[2]}/{$a[3]}";

//Importação do cabeçalho
include "/xampp/htdocs/projeto_recomeco_wale/src/controller/header.php";

include MODEL . "/user.php";
include MODEL . "/database.php";

if(!isset($_SESSION["adm"])) {
 header("location:".ROOT);
}

?>

<button type="button" onclick="window.location.href='<?= ROOT ?>/src/controller/logout.php'"> Sair 🚪</button>

<h1>Lista De Usuários</h1>
<form action="<?= ROOT?>/src/controller/status_change.php" method="get" onsubmit="return  confirm('Deseja atualizar está página?')">
<table>
    <thead>
        <tr>
            <th>Inativo</th>
            <th>Código</th>
            <th>Usuário</th>
            <th>Email</th>
            <th>Telefone</th>




        </tr>

    </thead>
    <tbody>
        <?php
         $db = new Database();
         $list = $db->select(
            "SELECT * FROM users"
         );

         //var_dump($list);

         foreach

        ?>
    </tbody>
</table>
</form>
<?php
//Importação do rodapé
include "/xampp/htdocs/projeto_recomeco_wale/src/controller/footer.php";
