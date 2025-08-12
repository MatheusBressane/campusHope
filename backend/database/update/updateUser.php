<?php
require_once '../connect.php';
session_start();
$cd_usuario = $_SESSION['cd_usuario'];

// recebendo os novos valores do formulário
$new_nm_usuario = $_POST['nm_usuario'];
$new_sn_usuario = $_POST['sn_usuario'];
$new_cd_telefone = $_POST['cd_telefone'];
$new_nm_email = $_POST['nm_email'];
$new_dt_periodo = $_POST['dt_periodo'];
$new_cd_matricula = $_POST['cd_matricula'];
$new_cd_cidade = $_POST['cd_cidade'];
$new_cd_rota = $_POST['cd_rota'];
$new_cd_curso = $_POST['cd_curso'];
$new_cd_instituicao = $_POST['cd_instituicao'];



$sql = "UPDATE tb_usuario
        SET nm_usuario = :new_nm_usuario,
            sn_usuario = :new_sn_usuario,
            cd_telefone_usuario = :new_cd_telefone,
            nm_email_usuario = :new_nm_email,
            cd_matricula_usuario = :new_cd_matricula,
            dt_periodo_usuario = :new_dt_periodo,
            cd_cidade = :new_cd_cidade,
            cd_rota = :new_cd_rota,
            cd_instituicao = :new_cd_instituicao,
            cd_curso = :new_cd_curso
        WHERE cd_usuario = :cd_usuario";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':cd_usuario', $cd_usuario);
$stmt->bindParam(':new_nm_usuario', $new_nm_usuario);
$stmt->bindParam(':new_sn_usuario', $new_sn_usuario);
$stmt->bindParam(':new_cd_telefone', $new_cd_telefone);
$stmt->bindParam(':new_nm_email', $new_nm_email);
$stmt->bindParam(':new_cd_matricula', $new_cd_matricula);
$stmt->bindParam(':new_dt_periodo', $new_dt_periodo);
$stmt->bindParam(':new_cd_cidade', $new_cd_cidade);
$stmt->bindParam(':new_cd_rota', $new_cd_rota);
$stmt->bindParam(':new_cd_instituicao', $new_cd_instituicao);
$stmt->bindParam(':new_cd_curso', $new_cd_curso);

if ($stmt->execute()) {
    header("Location: ../../../pages/profileUser.php");
} else {
    echo "Erro ao atualizar os dados.";
}

?>
