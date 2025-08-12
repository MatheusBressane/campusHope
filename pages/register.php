<?php
require_once '../backend/database/connect.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style_register.css">
</head>

<body>
    <main>
        <div class="container">

            <img src="../assets/img/logo_campus.png" width="25%">
            <h1>Fazer Cadastro</h1>

            <form id="formCadastro" action="../backend/auth/register.php" method="post">

                <article class="separandoForm"> <!-- Separando form -->
                    <label for="nameUser">Nome:</label>
                    <input type="text" name="nameUser" id="nameUser" placeholder="Digite seu nome" required>

                    <label for="lastNameUser">Sobrenome:</label>
                    <input type="text" name="lastNameUser" id="lastNameUser" placeholder="Digite seu sobrenome" required>

                    <label for="phoneUser">Telefone:</label>
                    <input type="tel" name="phoneUser" id="phoneUser" placeholder="(99) 99999-9999" required>

                    <label for="cityUser">Cidade:</label>
                    <select id="cidade" name="cityUser">
                        <option value="">Selecione a cidade</option>
                        <?php
                        $result = $pdo->query("SELECT cd_cidade, nm_cidade FROM tb_cidade");
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$row['cd_cidade']}'>{$row['nm_cidade']}</option>";
                        }
                        ?>
                    </select>

                    <label for="rotaUser">Rota:</label>
                    <select id="rota" name="rotaUser">
                        <option value="">Selecione a rota</option>
                    </select>

                    <label for="instituicaoUser">Instituição:</label>
                    <select id="instituicao" name="instituicaoUser">
                        <option value="">Selecione a instituição</option>
                        <?php
                        $result = $pdo->query("SELECT cd_instituicao, nm_instituicao FROM tb_instituicao");
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$row['cd_instituicao']}'>{$row['nm_instituicao']}</option>";
                        }
                        ?>
                    </select>

                </article>

                <article class="separandoForm" id="green">

                    <label for="cursoUser">Curso:</label>
                    <select id="curso" name="cursoUser">
                        <option value="curso">Selecione o curso</option>
                    </select>


                    <label for="matriculaUser">Matrícula:</label>
                    <input type="number" name="matriculaUser" id="matriculaUser" placeholder="Digite sua matrícula" required>

                    <label for="periodoUser">Período:</label>
                    <input type="text" name="periodoUser" id="periodoUser" placeholder="0/00" required>

                    <label for="emailUser">Email:</label>
                    <input type="email" name="emailUser" id="emailUser" placeholder="Digite seu email" required>

                    <label for="senhaUser">Senha:</label>
                    <input type="password" name="senhaUser" id="senhaUser" placeholder="Digite sua senha" required>

                    <label for="confirmSenhaUser">Confirmar Senha:</label>
                    <input type="password" name="confirmSenhaUser" id="confirmSenhaUser" placeholder="Confirme sua senha" required>
                </article>

            <button type="submit">Cadastrar</button>
            </form>
            <!-- 1662 -->

            <p id="linkfim"><a href="login.html">Já possui uma conta? Fazer <span> Login </span></a></p>

        </div>
    </main>
    
    <footer></footer> 

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
            </script>
<script src="../assets/js/eventos.js"></script>
</body>
</html>