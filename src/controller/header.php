<?php
$a = explode("\\", __DIR__);
$dir = "/{$a[1]}/{$a[2]}/{$a[3]}";

//Importando as constantes
include $dir."/const.php";

//Inicializando sessão
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= DESCRIPTION ?>">
    <meta name="keywords" content="<?= KEYWORDS ?>">
    <meta name="author" content="<?= AUTHOR ?>">
    <link rel="shortcut icon" href="<?= ASSETS ?>/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= ASSETS ?>/css/style.css">
    <title><?= TITLE ?></title>
</head>
<body>