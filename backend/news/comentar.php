<?php
session_start();
require_once '../database/connect.php';

if (!isset($_SESSION['cd_usuario']) || empty($_POST['cd_news']) || empty($_POST['ds_comment'])) {
    exit('Dados inválidos.');
}

$cd_usuario = $_SESSION['cd_usuario'];
$cd_news = $_POST['cd_news'];
$comentario = trim($_POST['ds_comment']);

$sql = $pdo->prepare("INSERT INTO tb_comment (cd_usuario, cd_news, ds_comment) VALUES (?, ?, ?)");
$sql->execute([$cd_usuario, $cd_news, $comentario]);

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
