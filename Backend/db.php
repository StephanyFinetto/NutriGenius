<?php
$host = 'localhost';
$dbname = 'nutrigenius';
$username = 'root'; // usuário de banco de dados
$password = ''; // senha 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar: ' . $e->getMessage();
}
?>
