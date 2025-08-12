<?php
require_once '../connect.php';
session_start();

$cd_usuario = intval($_POST['id']);

$stmt = $pdo->prepare("DELETE FROM tb_usuario WHERE cd_usuario = :cd_usuario");
$stmt->bindParam(':cd_usuario', $cd_usuario);
$stmt->execute();
header("Location: ../../admin/pages/painelAdmin.php");
?>