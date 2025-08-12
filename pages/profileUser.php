<?php
require_once '../backend/database/connect.php';

session_start();

if (!isset($_SESSION['cd_usuario'])) {
    header("Location: login.html");
    exit();
}

$sql = "SELECT *  from tb_usuario WHEre cd_usuario = :cd_usuario";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':cd_usuario', $_SESSION['cd_usuario']);
$stmt->execute();

$selectUser = $stmt->fetch(PDO::FETCH_ASSOC);
$nm_usuario = $selectUser['nm_usuario'];
$sn_usuario = $selectUser['sn_usuario'];
$cd_telefone = $selectUser['cd_telefone_usuario'];
$cd_matricula = $selectUser['cd_matricula_usuario'];
$dt_periodo = $selectUser['dt_periodo_usuario'];
$nm_email = $selectUser['nm_email_usuario'];
$cd_cidade = $selectUser['cd_cidade'];
$cd_instituicao = $selectUser['cd_instituicao'];
$cd_curso = $selectUser['cd_curso'];
$cd_rota = $selectUser['cd_rota'];
$tp_classe = $selectUser['tp_classe'];

// função para facilitar a busca do nome da cidade, instituicao, curso e rota do usuário
function getNameCodig($pdo, $campoTabela, $campoNome, $campoCodig, $valorCodig)
{
    $sql = "SELECT $campoNome FROM $campoTabela WHERE $campoCodig = :codigo";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':codigo', $valorCodig);
    $stmt->execute();
    $resultBusca = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultBusca[$campoNome];
}

$nm_cidade = getNameCodig($pdo, 'tb_cidade', 'nm_cidade', 'cd_cidade', $cd_cidade);
$nm_instituicao = getNameCodig($pdo, 'tb_instituicao', 'nm_instituicao', 'cd_instituicao', $cd_instituicao);
$nm_curso = getNameCodig($pdo, 'tb_curso', 'nm_curso', 'cd_curso', $cd_curso);
$nm_rota = getNameCodig($pdo, 'tb_rota', 'nm_rota', 'cd_rota', $cd_rota);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style_profileUser.css">
</head>

<body>

    <header  class="cabecalho"> <!-- Início Cabeçalho -->
        <a href="home.php"><img src="../assets/img/logo_campus.png" class="logo-campus" alt="Logo Campus Hope"></a>

        <section class="perfil">
            <p class="abrirPerfil"> Perfil </p>
            
            <ul class="perfil-opcao">
                <li><a href="home.php"> Home </a></li>
                
                <li><a href="news.php"> Notícias </a></li>
                <?php
                    if ($_SESSION['tp_classe'] == 'admin') {
                        echo '<li><a href="../backend/admin/pages/painelAdmin.php">Ver alunos</a></li>';
                        echo '<li><a href="../backend/admin/pages/relatorio.php">Gerar relatório</a></li>';
                    }
                ?>
                <li><a href="../backend/auth/logout.php"> Sair </a></li>
            </ul>
        </section>
    </header> <!-- Fim Cabeçalho -->

    <main>

        <!-- Início Menu Lateral -->
        <article id="menuLateral">
            <?php
                echo '<h1> Olá ' . $nm_usuario . ' ' . $sn_usuario . ' </h1>'
            ?>

            <p class="AlterarDados" onclick="document.getElementById('editModal').style.display='block'">Alterar dados</p>

            <p><a class="AlterarDados" href="home.php"> Voltar </a></p>
        </article>

        <!-- Fim Menu Lateral -->

        <!-- Início Dados do Usuário -->
        <section id="dadosUsuario">
            <h2>Suas Informações Pessoais:</h2>

            <?php
            echo '<h3>' . 'Nome: ' . '</h3>' . '<p>' . $nm_usuario . ' ' . '<span>' . $sn_usuario . '</span>' . '</p>' ;
            echo '<h3>' . 'Telefone: ' . '</h3>' . '<p>'. $cd_telefone . '</p>';
            echo '<h3>' . 'Instituição: ' . '</h3>' . '<p>'. $nm_instituicao . '</p>';
            echo '<h3>' . 'Curso: ' . '</h3>' . '<p>'. $nm_curso . '</p>';
            echo '<h3>' . 'Matrícula: ' . '</h3>' . '<p>'. $cd_matricula . '</p>';
            echo '<h3>' . 'Período: ' . '</h3>' . '<p>'. $dt_periodo . '</p>';
            echo '<h3>' . 'Email: ' . '</h3>' . '<p>'. $nm_email . '</p>';
            echo '<h3>' . 'Cidade: ' . '</h3>' . '<p>'. $nm_cidade . '</p>';
            echo '<h3>' . 'Rota: ' . '</h3> ' . '<p>'. $nm_rota . '</p>';
            if ($tp_classe == 'admin') {
                echo '<h3>' . 'Classe: ' . '</h3>' . '<p>' . ' Administrador ' . '</p>' . ' ';
            }
            ?>
        </section>
    </main>

    

    <!-- Modal -->
    <div id="editModal">
        <div id="container-modal">
            
            <span style="position:absolute; top:10px; right:15px; cursor:pointer;"
                onclick="document.getElementById('editModal').style.display='none'"> &times;
            </span>
            
            <h3>Alterar Dados</h3>

            <form action="../backend/database/update/updateUser.php" method="POST">
                <label>Primeiro nome:</label>
                <input type="text" name="nm_usuario" value="<?= $nm_usuario ?>">

                <label>Sobrenome:</label>
                <input type="text" name="sn_usuario" value="<?= $sn_usuario ?>">

                <label>Telefone:</label>
                <input type="text" name="cd_telefone" value="<?= $cd_telefone ?>">

                <label>Email:</label>
                <input type="email" name="nm_email" value="<?= $nm_email ?>">

                <label>Cidade</label>

                <select id="cidade" name="cd_cidade">
                    
                    <option value="">Selecione a cidade</option>

                    <?php
                    $result = $pdo->query("SELECT cd_cidade, nm_cidade FROM tb_cidade");
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['cd_cidade']}'>{$row['nm_cidade']}</option>";
                    }
                    ?>

                </select>

                <label>Rota</label>
                
                <select id="rota" name="cd_rota">
                    <option value="">Selecione a rota</option>
                </select>


                <label>Instituição</label>
                <select id="instituicao" name="cd_instituicao">
                    <option value="">Selecione a instituição</option>
                    <?php
                    $result = $pdo->query("SELECT cd_instituicao, nm_instituicao FROM tb_instituicao");
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['cd_instituicao']}'>{$row['nm_instituicao']}</option>";
                    }
                    ?>
                </select>

                <label>Curso</label>
                <select id="curso" name="cd_curso">
                    <option value="curso">Selecione o curso</option>
                </select>

                <label>Matrícula:</label>
                <input type="number" name="cd_matricula" value="<?= $cd_matricula ?>">

                <label>Período:</label>
                <input type="text" name="dt_periodo" value="<?= $dt_periodo ?>">

                <input id="btn-salvar" type="submit" value="Salvar">
            </form>
        </div>
    </div>


    <script>
        $("#cidade").change(function () {
            var cidadeID = $(this).val();
            $.ajax({
                url: "../backend/database/search/buscaDados.php",
                method: "POST",
                data: {
                    tipo: "rotas",
                    cd_cidade: cidadeID
                },
                success: function (data) {
                    $("#rota").html(data);
                }
            });
        });

        $("#instituicao").change(function () {
            var instID = $(this).val();
            $.ajax({
                url: "../backend/database/search/buscaDados.php",
                method: "POST",
                data: {
                    tipo: "cursos",
                    cd_instituicao: instID
                },
                success: function (data) {
                    $("#curso").html(data);
                }
            });
        });

    document.querySelector("form").addEventListener("submit", function(event) {
        // Verifica se qualquer select tem a opção padrão "Selecione..."
        let cidade = document.getElementById("cidade").value;
        let rota = document.getElementById("rota").value;
        let instituicao = document.getElementById("instituicao").value;
        let curso = document.getElementById("curso").value;

        if (!cidade || !rota || !instituicao || !curso) {
            alert("Por favor, selecione todas as opções.");
            event.preventDefault();  // Impede o envio do formulário
        }
    });
    </script>
    <script src="../assets/js/cabecalho.js"></script>
</body>

</html>