<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $name = $_POST['recipe-name'];
    $ingredients = $_POST['ingredients'];

    // Insere a receita no banco
    $stmt = $pdo->prepare("INSERT INTO recipes (user_id, name, ingredients) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $name, $ingredients]);

    echo "Receita cadastrada com sucesso!";
}
?>
