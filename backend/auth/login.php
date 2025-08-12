<?php
require_once '../database/connect.php';

//recebendo os valores do formulário ../front/register.html
$emailUser = $_POST['emailUser'];
$senhaUser = $_POST['senhaUser'];

// verificando se o email digitado já foi registrado na tb_aluno
$sql = "SELECT * FROM tb_usuario WHERE nm_email_usuario = :emailUser";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':emailUser', $emailUser);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $selectUser = $stmt->fetch(PDO::FETCH_ASSOC);
        $nm_senha_usuario = $selectUser['nm_senha_usuario'];

    // verifica se a senha digitado é a mesma do banco de dados
    if (password_verify($senhaUser, $nm_senha_usuario)) {
        // inicia login
        session_start();
        $_SESSION['cd_usuario'] = $selectUser['cd_usuario'];
        $_SESSION['nm_email_usuario'] = $selectUser['nm_email_usuario'];
        $_SESSION['tp_classe'] = $selectUser['tp_classe'];

        header("Location: ../../pages/home.php");
        exit();
    } else {
        echo 'Senha incorreta';
    } } else {
        echo 'Email incorreto';
    }

?>