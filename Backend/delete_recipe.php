<?php
// Conectar ao banco de dados
$dsn = 'sqlite:../database/nutrigenius.db';
try {
    $db = new PDO($dsn);
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
    exit;
}

// Receber ID da receita para deletar
$id = $_GET['id'];

// Deletar a receita
$query = "DELETE FROM recipes WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->execute([$id]);

// Retornar a resposta
echo json_encode(["message" => "Receita deletada com sucesso!"]);
?>
