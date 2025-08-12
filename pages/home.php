<?php
require_once '../backend/database/connect.php';
session_start();


if (!isset($_SESSION['cd_usuario'])) {
    header ("Location: login.html");
    exit();
}

$sql = "SELECT tb_instituicao.nm_instituicao, COUNT(tb_usuario.cd_usuario) AS total_alunos FROM tb_instituicao
    LEFT JOIN tb_usuario ON tb_instituicao.cd_instituicao = tb_usuario.cd_instituicao where tb_usuario.tp_classe = 'aluno'
        GROUP BY tb_instituicao.cd_instituicao";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$nomes_instituicao = [];
$total_alunos = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $nomes_instituicao[] = $row['nm_instituicao'];
    $total_alunos[] = $row['total_alunos'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/js/graphic.js"></script> <!-- Arquivo com a função para realziar o gráfico!-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script><!-- Arquivo para realziar o gráfico!-->
    <link rel="stylesheet" href="../assets/css/style_home.css">
    <title>Campus Hope</title>
</head>

<body>
    
    <header  class="cabecalho">    <!-- Início Cabeçalho -->
        <a href="home.php">
            <img src="../assets/img/logo_campus.png" class="logo-campus" alt="Logo Campus Hope">
        </a>

        <section class="perfil">
            <p class="abrirPerfil"> Perfil </p>
            
            <ul class="perfil-opcao">
                <li><a href="news.php"> Notícias </a></li>
                <li><a href="profileUser.php"> Meus dados </a></li>
                
                <?php
                    if ($_SESSION['tp_classe'] == 'admin') {
                        echo '<li><a href="../backend/admin/pages/painelAdmin.php">Ver alunos</a></li>';
                        echo '<li><a href="../backend/admin/pages/relatorio.php">Gerar relatório</a></li>';
                    }
                ?>
                
                <li><a href="../backend/auth/logout.php"> Sair </a></li>
            </ul>
        </section>
    </header>   <!-- Fim Cabeçalho -->
    
    <div class="grafico-aluno">   <!-- Exibe o Gráfico -->
        <canvas id="graficoPizza"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   <script>
        // Chamando a função realizada em ../back/graphic.js com os dados do PHP para o gráfico
        const dadosInstituicoes = {
                nomes: <?php echo json_encode($nomes_instituicao); ?>,
                totais: <?php echo json_encode($total_alunos); ?>
            };
    </script>
    <script src="../assets/js/graphic.js"></script>
    <script src="../assets/js/cabecalho.js"></script>

</body>
</html>