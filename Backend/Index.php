<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

$host = '127.0.0.1';
$dbname = 'nutrigenius';

try {
    // Conexão com o banco de dados
    $pdo = new PDO("sqlite:database/nutrigenius.db"); 

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
    exit;
}

header('Content-Type: application/json');

$request_method = $_SERVER['REQUEST_METHOD'];

// Roteamento de requisições
switch ($request_method) {
    case 'GET':
        if (isset($_GET['id'])) {
            include_once 'php/get_recipes.php';
        } else {
            include_once 'php/get_recipes.php';
        }
        break;
    case 'POST':
        include_once 'php/create_recipe.php';
        break;
    case 'PUT':
        include_once 'php/update_recipe.php';
        break;
    case 'DELETE':
        include_once 'php/delete_recipe.php';
        break;
    default:
        echo json_encode(['message' => 'Método não suportado']);
        break;
}

