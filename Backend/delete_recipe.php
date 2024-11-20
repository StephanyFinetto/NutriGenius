<?php
$db_path = __DIR__ . '/../database/nutrigenius.db';

try {
    
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

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null || !is_numeric($id)) {
    echo json_encode(["message" => "ID inválido ou não fornecido"]);
    exit;
}

$query = "DELETE FROM recipes WHERE id = ?";
$stmt = $db->prepare($query);

try {
    
    $stmt->execute([$id]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(["message" => "Receita deletada com sucesso!"]);
    } else {
        echo json_encode(["message" => "Nenhuma receita encontrada com o ID especificado."]);
    }
} catch (PDOException $e) {
    echo json_encode(["message" => "Erro ao tentar deletar a receita: " . $e->getMessage()]);
}
?>
