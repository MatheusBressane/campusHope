<?php
require_once '../connect.php';
session_start();

$cd_usuario = intval($_POST['cd_usuario']);
$tp_classe = $_POST['tp_classe'];
$new_tp_classe = 'admin';

$sql = "UPDATE tb_usuario SET tp_classe = :new_tp_classe WHERE cd_usuario = :cd_usuario";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':new_tp_classe', $new_tp_classe);
$stmt->bindParam(':cd_usuario', $cd_usuario);

$stmt->execute();
header("Location: ../../admin/pages/painelAdmin.php");
?>  