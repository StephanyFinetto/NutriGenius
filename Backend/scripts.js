// Função para salvar uma nova receita
function salvarReceita() {
    const name = document.getElementById('recipeName').value;
    const description = document.getElementById('recipeDescription').value;
    const ingredients = document.getElementById('recipeIngredients').value;
    const instructions = document.getElementById('recipeInstructions').value;

    const receita = {
        name: name,
        description: description,
        ingredients: ingredients,
        instructions: instructions
    };

    fetch('create_recipe.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(receita)
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
    })
    .catch(error => console.error('Erro ao salvar receita:', error));
}
