    <?php
    // $host = "localhost:3306";
    // $db_user = "root";
    // $db_password = "";
    // $database = "db_campus_hope";

    // try {
    //     $pdo = new PDO("mysql:host=$host;dbname=$database", $db_user, $db_password);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // }   catch (PDOException $e) { //mostrando o erro
    //     die("Erro na conexão " . $e->getMessage());
    // }

// Abaixo soluciona o problema que eu estava tendo em alterar os dados mas atrapalha muito em News, amanhã arrumar essa unica parada ai.

// <?php
$host = "localhost:3306";
$db_user = "root";
$db_password = "";
$database = "db_campus_hope";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $db_user, $db_password, [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    ]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão " . $e->getMessage());
}

?>
