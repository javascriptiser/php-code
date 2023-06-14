export const initSelect = (url) => {
    $.ajax({
        url,
        method: 'GET',
        success: function (response) {
            const selectElements = {
                pizzas: $('#pizza').empty(),
                sizes: $('#sizes').empty(),
                sauces: $('#sauces').empty()
            };

            for (const [key, value] of Object.entries(response)) {
                    if (selectElements[key]) {
                    addOptionsToSelect(selectElements[key], value);
                }
            }
        }
    });

    $('#order-form').submit(function (event) {
        event.preventDefault();

        const formData = $(this).serialize();
        $.ajax({
            url: '/api/select/order/',
            type: 'POST',
            data: formData,
            success: function (response) {
                const {pizza, usd_rate} = response;
                let {total_price: usd_price, ingredients} = pizza;
                const byn_price = (usd_price * usd_rate).toFixed(2);


                let cardHtml = '<div class="card">';
                cardHtml += '<div class="card-body">';
                cardHtml += '<h5 class="card-title">' + pizza.name + '</h5>';
                cardHtml += '<div class="card-text">';
                cardHtml += '<p>ID: ' + pizza.id + '</p>';
                cardHtml += '<p>Название: ' + pizza.name + '</p>';


                ingredients.forEach(function (ingredient) {
                    const ingredientKey = Object.keys(ingredient)[0];
                    const ingredientData = ingredient[ingredientKey];
                    cardHtml += '<p>' + ingredientKey + ':</p>';
                    cardHtml += '<ul>';
                    ingredientData.forEach(item => {
                        cardHtml += '<li>Название: ' + item.name + '</li>';
                    });
                    cardHtml += '</ul>';
                });

                cardHtml += '<p>Общая стоимость в USD: ' + usd_price + '</p>';
                cardHtml += '<p>Общая стоимость в BYN: ' + byn_price + '</p>';
                cardHtml += '</div>';
                cardHtml += '</div>';
                cardHtml += '</div>';

                $('#order-summary').html(cardHtml);
            }
        });
    });
}

const addOptionsToSelect = (selectElement, data) => {
    data.forEach(item => {
        const option = '<option value="' + item.id + '">' + item.name + '</option>';
        selectElement.append(option);
    });
}