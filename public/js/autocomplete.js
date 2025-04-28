document.addEventListener('DOMContentLoaded', () => {
    const ingredientInput = document.getElementById('ingrediente-input');
    const ingredientList = document.getElementById('lista-ingredientes');
    const ingredientIds = document.getElementById('ingredientes-ids');
    const selectedIds = [];

    ingredientInput.addEventListener('input', async (e) => {
        const search = e.target.value;
        ingredientList.innerHTML = ''; // Clear previous suggestions

        if (search.length > 1) { // Start searching after 2 characters
            const response = await fetch(`/search-ingredients?term=${search}`);
            const ingredients = await response.json();

            ingredients.forEach(ingredient => {
                const li = document.createElement('li');
                li.textContent = ingredient.nombre;
                li.dataset.id = ingredient.id_ingrediente;

                li.addEventListener('click', () => {
                    selectedIds.push(ingredient.id_ingrediente); // Track selected IDs
                    ingredientIds.value = selectedIds.join(','); // Update hidden input
                    ingredientList.innerHTML = ''; // Clear suggestions
                    ingredientInput.value = ''; // Clear input
                });

                ingredientList.appendChild(li);
            });
        }
    });
});