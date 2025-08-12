<?php
require_once '../connect.php';
session_start();

if (!isset($_SESSION['tp_classe']) || $_SESSION['tp_classe'] == 'aluno') {
    exit('Acesso negado');
}

// Captura os filtros enviados pelo AJAX
$instituicao = isset($_POST['cd_instituicao']) ? trim($_POST['cd_instituicao']) : '';
$curso = isset($_POST['cd_curso']) ? trim($_POST['cd_curso']) : '';
$classe = isset($_POST['tp_classe']) ? trim($_POST['tp_classe']) : '';
$rota = isset($_POST['cd_rota']) ? trim($_POST['cd_rota']) : '';
$cidade = isset($_POST['cd_cidade']) ? trim($_POST['cd_cidade']) : '';

// Monta o SQL dinâmico
$sql = "SELECT u.*, i.nm_instituicao, c.nm_curso, r.nm_rota, ct.nm_cidade 
        FROM tb_usuario u 
        LEFT JOIN tb_instituicao i ON u.cd_instituicao = i.cd_instituicao
        LEFT JOIN tb_curso c ON u.cd_curso = c.cd_curso
        LEFT JOIN tb_rota r ON u.cd_rota = r.cd_rota
        LEFT JOIN tb_cidade ct ON u.cd_cidade = ct.cd_cidade
        WHERE 1=1";
$params = [];

// Filtros
if (!empty($instituicao)) {
    $sql .= " AND u.cd_instituicao = :instituicao";
    $params[':instituicao'] = $instituicao;
}

if (!empty($curso) && $curso !== "curso") { // Verifica se o filtro de curso não é a string "curso"
    $sql .= " AND u.cd_curso = :curso";
    $params[':curso'] = $curso;
}

if (!empty($classe)) {
    $sql .= " AND u.tp_classe = :classe";
    $params[':classe'] = $classe;
}

if (!empty($rota)) {
    $sql .= " AND u.cd_rota = :rota";
    $params[':rota'] = $rota;
}

if (!empty($cidade) && $cidade !== "cidade") { // Verifica se o filtro de cidade não é a string "cidade"
    $sql .= " AND u.cd_cidade = :cidade";
    $params[':cidade'] = $cidade;
}

// Executa a consulta
$stmt = $pdo->prepare($sql);
$stmt->execute($params);

// Exibe os resultados

// Supondo que você já tenha uma variável $_SESSION['classe'] definida
if ($_SESSION['tp_classe'] === 'admin') {
    if ($stmt->rowCount() > 0) {
        echo '<div id="content">';
        echo '<table border="1" cellspacing="0" cellpadding="5">';
        echo '<thead>
                <tr>
                    <th>Nome</th>
                    <th>Matrícula</th>
                    <th>Classe</th>
                    <th>Promover</th>
                    <th>Excluir</th>
                </tr>
              </thead>';
        echo '<tbody>';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['nm_usuario']) . ' ' . htmlspecialchars($row['sn_usuario']) . '</td>';
            echo '<td>' . htmlspecialchars($row['cd_matricula_usuario']) . '</td>';
            echo '<td>' . htmlspecialchars($row['tp_classe']) . '</td>';

            // PROMOVER
            if ($row['tp_classe'] !== 'admin') {
                echo '<td><button type="button" id="promover" onclick="openModalEdit(\'' . $row['cd_usuario'] . '\', \'' . $row['tp_classe'] . '\')">Promover</button></td>';
            } else {
                echo '<td><button disabled style="cursor: not-allowed;" type="button">Promover</button></td>';
            }

            // EXCLUIR
            if ($row['tp_classe'] !== 'admin') {
                echo '<td><button type="button" id="excluir" onclick="openModalDel(\'' . $row['cd_usuario'] . '\')">Excluir</button></td>';
            } else {
                echo '<td><button disabled style="cursor: not-allowed;" type="button">Excluir</button></td>';
            }

            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo 'Nenhum usuário encontrado.';
    }
} else {
    echo 'Acesso restrito.';
}
?>