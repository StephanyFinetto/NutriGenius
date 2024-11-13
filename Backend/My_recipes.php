<?php
// Conectar ao banco de dados
$dsn = 'sqlite:../database/nutrigenius.db';
try {
    $db = new PDO($dsn);
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
    exit;
}

// Buscar receitas no banco de dados
$query = "SELECT * FROM recipes";
$stmt = $db->query($query);
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retornar as receitas
echo json_encode($recipes);
?>

