<?php
require_once '../../database/connect.php';
session_start();

if (!isset($_SESSION['tp_classe']) || $_SESSION['tp_classe'] == 'aluno') {
    exit('Acesso negado');
}

$sql = "SELECT * FROM tb_usuario";
$stmt = $pdo->prepare($sql);
$stmt->execute();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.3/html2pdf.bundle.min.js"
    integrity="sha512-yu5WG6ewBNKx8svICzUA01vozhmiQCVfzjzW40eCHJdsDRaOifh9hPlWBDex5b32gWCzawTp1F3FJz60ps6TnQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../../../assets/css/style_relatorio.css">


</head>
<body>


    <header  class="cabecalho"> <!-- Início Cabeçalho -->
        <a href="../../../pages/home.php"><img src="../../../assets/img/logo_campus.png" class="logo-campus" alt="Logo Campus Hope"></a>

        <section class="perfil">
            <p class="abrirPerfil"> Perfil </p>
            
            <ul class="perfil-opcao">
                <li><a href="../../../pages/home.php"> Home </a></li>
                <li><a href="../../../pages/profileUser.php"> Meus Dados </a></li>
                <li><a href="../../../pages/news.php"> Notícias </a></li>
                
                <?php
                    if ($_SESSION['tp_classe'] == 'admin') {
                        echo '<li><a href="../../../backend/admin/pages/painelAdmin.php"> Ver alunos </a></li>';
                    }
                ?>
                
                <li><a href="../../../backend/auth/logout.php"> Sair </a></li>
            </ul>
        </section>
    </header> <!-- Fim Cabeçalho -->

    <main>    
    <section id="filtroContainer" class="filtro">
        
        <h1>Filtrar usuários</h1>            
        <p id="mostrarForm"> Filtros </p>
            
        <form id="formFiltros">
            
            <label id="space-top"> Cidade </label>
    
            <select id="cidade" name="cd_cidade">
                <option value="">Todas as cidades</option>
    
                <?php
                    $result = $pdo->query("SELECT cd_cidade, nm_cidade FROM tb_cidade");
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['cd_cidade']}'>{$row['nm_cidade']}</option>";
                    }
                ?>
    
            </select>
    
            <label> Rota </label>
            
            <select id="rota" name="cd_rota">
                <option value=""> Todas as rotas </option>
            </select>
    
            <label> Instituição </label>            
            <select id="instituicao" name="cd_instituicao">
                <option value=""> Todas as instituições </option>
                
                <?php
                $result = $pdo->query("SELECT cd_instituicao, nm_instituicao FROM tb_instituicao");
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$row['cd_instituicao']}'>{$row['nm_instituicao']}</option>";
                }
                ?>
            </select>
            
            <label> Curso </label>
            <select id="curso" name="cd_curso">
                <option value="curso"> Todos os cursos </option>
            </select>
    
            <label for="classe"> Classe </label>
            <select id="classe" name="tp_classe">
                <option value=""> Todas as classes </option>
                <option value="aluno"> Aluno </option>
                <option value="admin"> Administrador </option>
            </select>

            <button class="btn-fechar" id="space-top" type="submit"> Filtrar </button>
            <button class="btn-fechar" id="generate-pdf"> Gerar relatório </button>
            <button class="btn-fechar" id="fecharForm"> Fechar </button>
        </form>
    </section>

    <div id="listaUsuarios">
        
        <!-- Lista de usuários aparece aqui -->
        
    </div>
    </main>
        
    <script src="../../../assets/js/filtroRelatorioAdmin.js"></script>
    <script src="../../../assets/js/relatorioAdmin.js"></script>
    <script src="../../../assets/js/cabecalho.js"></script>

</body>
</html>

