<?php
// Inicia a sessão para verificar se o usuário está logado
session_start();

// Verifica se o usuário está logado
$is_logged_in = isset($_SESSION['user_id']);
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
        /* Seu CSS customizado aqui */
    </style>
</head>
<body>
    <nav>
        <a href="#" onclick="loadContent('index'); return false;">
            <img src="https://github.com/StephanyFinetto/NutriGenius/raw/main/docs/nutrigenius-vazado-preto.svg" width="40" alt="Logotipo da Nutrigenius">
        </a>
        <div class="navbar-collapse">
            <?php if ($is_logged_in): ?>
                <a class="nav-link" href="#" onclick="loadContent('my-recipes'); return false;">Minhas Receitas</a>
                <a class="nav-link" href="logout.php">Sair</a>
            <?php else: ?>
                <a class="nav-link" href="#" onclick="loadContent('login'); return false;">Login</a>
                <a class="nav-link" href="#" onclick="loadContent('signup'); return false;">Criar conta</a>
            <?php endif; ?>
            <a class="nav-link" href="#" onclick="loadContent('create-recipe'); return false;">Criar Receita</a>
        </div>
    </nav>

    <!-- Container para conteúdo dinâmico -->
    <div id="main-content" class="container-conteudo">
        <!-- O conteúdo das páginas será carregado aqui -->
    </div>

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
                case 'login':
                    content.innerHTML = `
                        <div class="form-container">
                            <h1 class="section-title">Login</h1>
                            <form action="login.php" method="POST">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" required>
                                <label for="password">Senha</label>
                                <input type="password" id="password" name="password" required>
                                <button type="submit">Entrar</button>
                            </form>
                        </div>
                    `;
                    break;
                case 'signup':
                    content.innerHTML = `
                        <div class="form-container">
                            <h1 class="section-title">Criar Conta</h1>
                            <form action="signup.php" method="POST">
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
                            <form action="create_recipe.php" method="POST">
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
                            <!-- Aqui pode ser exibido a lista de receitas -->
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
            }
        }

        // Carregar conteúdo da página inicial por padrão
        loadContent('index');
    </script>
</body>
</html>
