<?php
session_start();
require_once '../database/connect.php';

if (!isset($_SESSION['cd_usuario']) || empty($_POST['cd_news']) || empty($_POST['tp_react'])) {
    exit('Dados inválidos.');
}

$cd_usuario = $_SESSION['cd_usuario'];
$cd_news = $_POST['cd_news'];
$tp_react = $_POST['tp_react'];

$sqlCheck = $pdo->prepare("SELECT * FROM tb_react WHERE cd_usuario = ? AND cd_news = ?");
$sqlCheck->execute([$cd_usuario, $cd_news]);

if ($sqlCheck->rowCount() > 0) {
    $sql = $pdo->prepare("UPDATE tb_react SET tp_react = ?, dt_react = NOW() WHERE cd_usuario = ? AND cd_news = ?");
    $sql->execute([$tp_react, $cd_usuario, $cd_news]);
} else {
    $sql = $pdo->prepare("INSERT INTO tb_react (cd_usuario, cd_news, tp_react) VALUES (?, ?, ?)");
    $sql->execute([$cd_usuario, $cd_news, $tp_react]);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
