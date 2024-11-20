<?php
$db_path = __DIR__ . '/../database/nutrigenius.db';

try {
    // Verifica se o arquivo do banco de dados existe
    if (!file_exists($db_path)) {
        throw new Exception('Banco de dados não encontrado: ' . $db_path);
    }

    
    $dsn = 'sqlite:' . $db_path;
    $db = new PDO($dsn);

    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit;
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
    exit;
}

$query = "SELECT * FROM recipes";
$stmt = $db->query($query);

if ($stmt === false) {
    echo json_encode(['message' => 'Erro ao consultar as receitas']);
    exit;
}

$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($recipes);
?>
