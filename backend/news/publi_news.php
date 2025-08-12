<?php
require_once "../database/connect.php";
session_start();

$ds_conteudo = $_POST['ds_conteudo'];
$nm_titulo = $_POST['nm_titulo'];
$dt_publicacao = date("Y-m-d H:i:s");

$sql = "INSERT INTO tb_news (nm_titulo, ds_conteudo, dt_publicacao, cd_usuario) VALUES(:nm_titulo, :ds_conteudo, :dt_publicacao, :cd_usuario)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nm_titulo', $nm_titulo);
    $stmt->bindParam(':ds_conteudo', $ds_conteudo);
    $stmt->bindParam(':dt_publicacao', $dt_publicacao);
    $stmt->bindParam(':cd_usuario', $_SESSION['cd_usuario']);

try {
    $stmt->execute();
    header ("Location: news.php");
}   catch (\PDOException $e) {
        echo '<p>Erro ao cadastrar: ' . $e->getMessage() . '</p>';
}