<?php
session_start();
include('db.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Recupera as receitas do usuário
    $stmt = $pdo->prepare("SELECT * FROM recipes WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($recipes) {
        echo "<h1>Minhas Receitas</h1>";
        echo "<ul>";
        foreach ($recipes as $recipe) {
            echo "<li><a href='#'>{$recipe['name']}</a></li>";
        }
        echo "</ul>";
    } else {
        echo "Você ainda não tem receitas cadastradas.";
    }
}
?>
