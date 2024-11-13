<?php
// Ativar exibição de erros (remova em produção)
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Configurações banco de dados do projeto
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

// Qual requisição foi feita
$request_method = $_SERVER['REQUEST_METHOD'];

// Roteamento de requisições
switch ($request_method) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Chama o método para obter uma receita específica
            include_once 'php/get_recipes.php';
        } else {
            // Chama o método para obter todas as receitas
            include_once 'php/get_recipes.php';
        }
        break;
    case 'POST':
        // Chama o método para criar uma nova receita
        include_once 'php/create_recipe.php';
        break;
    case 'PUT':
        // Chama o método para atualizar uma receita existente
        include_once 'php/update_recipe.php';
        break;
    case 'DELETE':
        // Chama o método para deletar uma receita
        include_once 'php/delete_recipe.php';
        break;
    default:
        echo json_encode(['message' => 'Método não suportado']);
        break;
}

