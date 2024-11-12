<?php
// Incluindo a conexão com o banco de dados
include_once('includes/db.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Nutrigenius</title>
    <link rel="icon" type="image/x-icon" href="https://github.com/StephanyFinetto/NutriGenius/raw/main/docs/nutrigenius-colorido.svg">
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Seu CSS aqui */
    </style>
</head>
<body>
    <?php include_once('includes/header.php'); // Inclui a barra de navegação ?>

    <!-- Container para conteúdo dinâmico -->
    <div id="main-content" class="container-conteudo">
        <!-- O conteúdo será carregado aqui -->
    </div>

    <!-- Colocando o código JavaScript no final do arquivo -->
    <script>
        // Função para carregar o conteúdo dinâmico
        function loadContent(page) {
            const content = document.getElementById("main-content");
            switch (page) {
                case 'index':
                    content.innerHTML = `
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="section-title">Bem-vindo ao Nutrigenius!</h1>
                                <p class="banner-text">Nutrigenius é o aplicativo inovador que transforma sua experiência culinária em uma jornada de saúde e bem-estar...</p>
                                <div class="text-center">
                                    <a class="cta-button" href="#" onclick="loadContent('signup'); return false;">Quero conhecer</a>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <img class="main-image" src="https://github.com/StephanyFinetto/NutriGenius/raw/main/docs/banner.jpg" alt="Imagem de Banner">
                            </div>
                        </div>
                    `;
                    break;
                case 'signup':
                    content.innerHTML = `
                        <div class="form-container">
                            <h1 class="section-title">Criar Conta</h1>
                            <form id="signup-form">
                                <label for="name">Nome</label>
                                <input type="text" id="name" name="name" required>
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                                <label for="password">Senha</label>
                                <input type="password" id="password" name="password" required>
                                <button type="submit">Cadastrar</button>
                            </form>
                        </div>
                    `;
                    break;
                case 'create-recipe':
                    content.innerHTML = `
                        <div class="form-container">
                            <h1 class="section-title">Criar Receita</h1>
                            <form id="recipe-form">
                                <label for="recipe-name">Nome da Receita</label>
                                <input type="text" id="recipe-name" name="recipe-name" required>
                                <label for="ingredients">Ingredientes</label>
                                <input type="text" id="ingredients" name="ingredients" required>
                                <button type="submit">Criar Receita</button>
                            </form>
                        </div>
                    `;
                    break;
                case 'my-recipes':
                    content.innerHTML = `
                        <div class="container-conteudo">
                            <h1>Minhas Receitas</h1>
                            <div class="card">
                                <h5 class="card-header">Receitas Cadastradas</h5>
                                <div class="card-body">
                                    <ul>
                                        <li><a class="recipe-link" href="#">Salada Energética com Salsinha</a></li>
                                        <li><a class="recipe-link" href="#">Pão Integral de Aveia</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    `;
                    break;
                case 'login':
                    content.innerHTML = `
                        <div class="form-container">
                            <h1 class="section-title">Login</h1>
                            <form id="login-form">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" required>
                                <label for="password">Senha</label>
                                <input type="password" id="password" name="password" required>
                                <button type="submit">Entrar</button>
                            </form>
                        </div>
                    `;
                    break;
            }
        }

        // Envio do formulário de login via AJAX
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('login-form');
            if (loginForm) {
                loginForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    
                    fetch('login.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        alert(data); // Exibe a resposta do PHP (ex: "Login realizado com sucesso")
                        loadContent('index'); // Redireciona para a página inicial após o login
                    })
                    .catch(error => console.error('Erro:', error));
                });
            }

            // Envio do formulário de cadastro via AJAX
            const signupForm = document.getElementById('signup-form');
            if (signupForm) {
                signupForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    
                    fetch('signup.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        alert(data); // Exibe a resposta do PHP (ex: "Cadastro realizado com sucesso")
                        loadContent('login'); // Redireciona para a página de login após o cadastro
                    })
                    .catch(error => console.error('Erro:', error));
                });
            }

            // Envio do formulário de criação de receita via AJAX
            const recipeForm = document.getElementById('recipe-form');
            if (recipeForm) {
                recipeForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    
                    fetch('create_recipe.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        alert(data); // Exibe a resposta do PHP (ex: "Receita cadastrada com sucesso")
                        loadContent('my-recipes'); // Redireciona para a página de receitas após criação
                    })
                    .catch(error => console.error('Erro:', error));
                });
            }
        });

        // Carregar conteúdo da página inicial por padrão
        loadContent('index');
    </script>
</body>
</html>
