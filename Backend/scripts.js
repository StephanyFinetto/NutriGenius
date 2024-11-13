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
                case 'create-recipe':
                    content.innerHTML = `
                        <div class="form-container">
                            <h1 class="section-title">Criar Receita</h1>
                            <form>
                                <label for="recipe-name">Nome da Receita</label>
                                <input type="text" id="recipe-name" name="recipe-name">
                                <label for="ingredients">Ingredientes</label>
                                <input type="text" id="ingredients" name="ingredients">
                                <button type="submit">Criar Receita</button>
                            </form>
                        </div>
                    `;
                    break;
                case 'login':
                    content.innerHTML = `
                        <div class="form-container">
                            <h1 class="section-title">Login</h1>
                            <form>
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email">
                                <label for="password">Senha</label>
                                <input type="password" id="password" name="password">
                                <button type="submit">Entrar</button>
                            </form>
                        </div>
                    `;
                    break;
                case 'signup':
                    content.innerHTML = `
                        <div class="form-container">
                            <h1 class="section-title">Criar Conta</h1>
                            <form>
                                <label for="name">Nome</label>
                                <input type="text" id="name" name="name">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email">
                                <label for="password">Senha</label>
                                <input type="password" id="password" name="password">
                                <button type="submit">Cadastrar</button>
                            </form>
                        </div>
                    `;
                    break;
            }
        }

        loadContent('index');
    </script>
