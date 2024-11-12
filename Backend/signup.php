<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Criptografa a senha

    // Verifica se o e-mail já existe
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        echo "Este e-mail já está em uso.";
    } else {
        // Insere novo usuário no banco
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $password]);
        echo "Usuário cadastrado com sucesso!";
    }
}
?>
