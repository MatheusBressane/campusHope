<?php
session_start();
require_once '../backend/database/connect.php';

// Buscar todas as notícias
$sqlNews = $pdo->prepare("SELECT tb_news.*, tb_usuario.nm_usuario AS autor
    FROM tb_news
    JOIN tb_usuario ON tb_news.cd_usuario = tb_usuario.cd_usuario
    ORDER BY tb_news.dt_publicacao DESC");
$sqlNews->execute();
$news = $sqlNews->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias</title> 
    <link rel="stylesheet" href="../assets/css/style_news.css">
    
</head>
<body>

    <header  class="cabecalho"> <!-- Início Cabeçalho -->
        <a href="home.php"><img src="../assets/img/logo_campus.png" class="logo-campus" alt="Logo Campus Hope"></a>

        <section class="perfil">
            <p class="abrirPerfil"> Perfil </p>
            
            <ul class="perfil-opcao">


                <li><a href="home.php"> Home </a></li>
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
    </header> <!-- Fim Cabeçalho -->
                    
    
    <?php // Publicação ADMIN lateral
        if ($_SESSION['tp_classe'] == 'admin') {
            echo '
            <section id="publicar-noticias"> 
                <h2> Publique sua notícia já! </h2>
                    <form action="../backend/news/publi_news.php" method="post">
                        
                        <textarea id="titulo" name="nm_titulo" placeholder="Digite o título..." required></textarea>
                        
                        <textarea id="conteudo" name="ds_conteudo" placeholder="Conte a novidade..." required></textarea>

                        <button type="submit"> Publicar </button>
                    </form>  
            </section>';
        }
    ?>
    
    <main>        

        <h1>Notícias publicadas:</h1> 

    <?php foreach ($news as $n): ?>
        <section class="container-publicacoes"> <!-- Container da publicação -->
            
            <section id="topo-publicacao"> <!-- Topo da publicação -->
                
                <h2> <?= htmlspecialchars($n['nm_titulo']) ?> </h2> <!-- Título do Texto -->

                <p id="small"> <!--Data da publicação -->
                    <?php
                        date_default_timezone_set('America/Sao_Paulo');
                        $dataPublicacao = new DateTime($n['dt_publicacao']);
                        
                        $agora 
                        = new DateTime();
                        $diferencaHoras = $agora->diff($dataPublicacao)->h + ($agora->diff($dataPublicacao)->days * 24);
                        $meses = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];

                        if ($dataPublicacao->format('Y-m-d') == $agora->format('Y-m-d') && $diferencaHoras < 24) {
                            echo $dataPublicacao->format('H') . 'h';
                        } elseif ($dataPublicacao->format('Y') == $agora->format('Y')) {
                            $mesAbreviado = $meses[(int)$dataPublicacao->format('m') - 1];
                            echo strtolower($mesAbreviado) . ' ' . $dataPublicacao->format('d');
                        } else {
                            echo $dataPublicacao->format('d/m/Y');
                        }
                    ?>
                </p> 

            </section>
            
            <p> <?= nl2br(htmlspecialchars($n['ds_conteudo'])) ?> </p>

            <p id="nickPost">Publicado por: <?= htmlspecialchars($n['autor']) ?> </p> <!-- Nome do autor -->
            
            <section id="interacoes">
    
                <!-- Reações -->
                <form id="reaction" action="../backend/news/reagir.php" method="post">
                    <input type="hidden" name="cd_news" value="<?= $n['cd_news'] ?>">
    
                    <?php
                    // Pega a contagem de reações
                    $sqlReacoes = $pdo->prepare("SELECT tp_react, COUNT(*) AS total FROM tb_react WHERE cd_news = ? GROUP BY tp_react");
                    $sqlReacoes->execute([$n['cd_news']]);
                    $reacoes = [];
                    foreach ($sqlReacoes->fetchAll(PDO::FETCH_ASSOC) as $r) {
                        $reacoes[$r['tp_react']] = $r['total'];
                    }
    
                    // Array de emojis fixos
                    $emojis = [
                        // 'curtir' => '<img src="../assets/img/thumbs-up.svg" alt="Like">',
                        // 'amei'   => '<img src="../assets/img/heart.svg" alt="heart">',
                        // 'triste' => '<img src="../assets/img/face-sad-tear.svg" alt="heart">',
                        // 'raiva'  => '<img src="../assets/img/face-angry.svg" alt="heart">',

                        'curtir' => '👍',
                        'amei'   => '❤️',
                        'triste' => '😢',
                        'raiva'  => '😡',
                    ];
    
                    // Botões com contagem
                    foreach ($emojis as $tipo => $emoji) {
                        $count = $reacoes[$tipo] ?? 0;
                        echo "<button type='submit' name='tp_react' value='$tipo'>$emoji ($count)</button> ";
                    }
                    ?>
                </form>
    
                <!-- Botão para mostrar/ocultar comentários -->

                <img src="../assets/img/comment-dots.svg" onclick="toggleComentarios(<?= $n['cd_news'] ?>)" alt="Comentar">
                <!-- <button id="btn-coment" >Ver Comentários</button> -->
    
            </section>

                <!-- Área de comentários oculta inicialmente -->
            <div class="container-comentarios" id="comentarios-<?= $n['cd_news'] ?>">
                

                <!-- Lista de comentários -->
                <?php
                $sqlComentarios = $pdo->prepare("
                    SELECT tb_comment.*, tb_usuario.nm_usuario 
                    FROM tb_comment 
                    JOIN tb_usuario ON tb_comment.cd_usuario = tb_usuario.cd_usuario 
                    WHERE cd_news = ? ORDER BY dt_comment DESC
                ");
                $sqlComentarios->execute([$n['cd_news']]);
                $comentarios = $sqlComentarios->fetchAll(PDO::FETCH_ASSOC);

                echo "<div id='lista-comentarios'> <h3> Comentários: </h3> <ul>";
                foreach ($comentarios as $c) {
                    echo "<li>". "<h6>" . htmlspecialchars($c['nm_usuario']) . ": " . "</h6>" . "<p>" . nl2br(htmlspecialchars($c['ds_comment'])) . "</p>" . "</li>";
                }
                echo "</ul></div>";
                ?>

                <!-- Formulário de comentário -->
                <form id="form-comentario" action="../backend/news/comentar.php" method="post">
                    <input type="hidden" name="cd_news" value="<?= $n['cd_news'] ?>">
                    <textarea name="ds_comment" placeholder="Comentar... " required></textarea>
                    <button type="submit">Comentar</button>
                </form>
                
            </div>
        </section>
    <?php endforeach; ?>

    </main>
    
    <script>
        function toggleComentarios(id) {
            const div = document.getElementById('comentarios-' + id);
            div.style.display = div.style.display === 'none' ? 'block' : 'none';
        }

        // Usado para limitar e ajustar a altura do conteúdo

        document.addEventListener('input', function (e) {
        if (e.target.tagName.toLowerCase() === 'textarea') {
            e.target.style.height = 'auto'; // reseta altura
            e.target.style.height = (e.target.scrollHeight) + 'px'; // aqui ajusta pela altura do conteúdo
        }
        });
    </script>

    <script src="../assets/js/cabecalho.js"></script>
</body>
</html>
