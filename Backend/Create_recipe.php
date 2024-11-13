<?php
// Conectar ao banco de dados
$dsn = 'sqlite:../database/nutrigenius.db';
try {
    $db = new PDO($dsn);
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
    exit;
}

// Receber dados JSON
$data = json_decode(file_get_contents("php://input"), true);

// Inserir no banco de dados
$query = "INSERT INTO recipes (name, description, ingredients, instructions) VALUES (?, ?, ?, ?)";
$stmt = $db->prepare($query);
$stmt->execute([$data['name'], $data['description'], $data['ingredients'], $data['instructions']]);

// Retornar a resposta
echo json_encode(["message" => "Receita criada com sucesso!"]);
?>
