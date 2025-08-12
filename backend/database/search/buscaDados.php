<?php
require_once '../connect.php';
// função utilizada no arquivo painelAdmin.php
// função utilizada no arquivo register.php
// função utilizada no arquivo relatorio.php

if (isset($_POST["tipo"])) {
    $tipo = $_POST["tipo"];

    if ($tipo == "rotas" && isset($_POST["cd_cidade"])) {
        $cd_cidade = intval($_POST["cd_cidade"]);
        $query = "SELECT cd_rota, nm_rota FROM tb_rota WHERE cd_cidade = $cd_cidade";
        $result = $pdo->query($query);

        echo '<option value="">Selecione a rota</option>';
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$row['cd_rota']}'>{$row['nm_rota']}</option>";
        }

    } elseif ($tipo == "cursos" && isset($_POST["cd_instituicao"])) {
        $cd_instituicao = intval($_POST["cd_instituicao"]);
        $query = "SELECT cd_curso, nm_curso FROM tb_curso WHERE cd_instituicao = $cd_instituicao";
        $result = $pdo->query($query);

        echo '<option value="">Selecione o curso</option>';
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$row['cd_curso']}'>{$row['nm_curso']}</option>";
        }
    }
}
?>