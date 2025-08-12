<?php
require_once '../database/connect.php';

//recebendo os valores do formulário register.html
$nameUser = $_POST['nameUser'];
$lastNameUser = $_POST['lastNameUser'];
$phoneUser = $_POST['phoneUser'];
$cityUser = $_POST['cityUser'];
$cursoUser = $_POST['cursoUser'];
$matriculaUser = $_POST['matriculaUser'];
$instituicaoUser = $_POST['instituicaoUser'];
$rotaUser = $_POST['rotaUser'];
$periodoUser = $_POST['periodoUser'];
$emailUser = $_POST['emailUser'];
$senhaUser = password_hash($_POST['senhaUser'], PASSWORD_DEFAULT); //criptografando senha
$classeUser = 'aluno';

//verificando se o email digitado já existe
$sql = "SELECT cd_usuario from tb_usuario where nm_email_usuario = :emailUser";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':emailUser', $emailUser);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header ("Location:../../../pages/register.php");
    }

//adicionando as variáveis no banco de dados
$sql = "INSERT INTO tb_usuario (nm_usuario, sn_usuario, cd_telefone_usuario, cd_cidade, cd_curso, cd_matricula_usuario,
    cd_instituicao, cd_rota, dt_periodo_usuario, nm_email_usuario, nm_senha_usuario, tp_classe)
        VALUES(:nameUser, :lastNameUser, :phoneUser, :cityUser, :cursoUser, :matriculaUser,
    :instituicaoUser, :rotaUser, :periodoUser, :emailUser, :senhaUser, :classeUser)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nameUser', $nameUser);
    $stmt->bindParam(':lastNameUser', $lastNameUser);
    $stmt->bindParam(':phoneUser', $phoneUser);
    $stmt->bindParam(':cityUser', $cityUser);
    $stmt->bindParam(':cursoUser', $cursoUser);
    $stmt->bindParam(':matriculaUser', $matriculaUser);
    $stmt->bindParam(':instituicaoUser', $instituicaoUser);
    $stmt->bindParam(':rotaUser', $rotaUser);
    $stmt->bindParam(':periodoUser', $periodoUser);
    $stmt->bindParam(':emailUser', $emailUser);
    $stmt->bindParam(':senhaUser', $senhaUser);
    $stmt->bindParam(':classeUser', $classeUser);

try {
    $stmt->execute();
    session_start();
    $cd_usuario = $pdo->lastInsertId();
    $_SESSION['cd_usuario'] = $cd_usuario;
    $_SESSION['nm_email_usuario'] = $emailUser;
    $_SESSION['tp_classe'] = $classeUser;
        header ("Location:../../pages/home.php");
}   catch (\PDOException $e) {
        echo '<p>Erro ao cadastrar: '.$e->getMessage() . '</p>';
}


?>