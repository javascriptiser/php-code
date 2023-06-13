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
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });

    $('#order-form').submit(function(event) {
        // Отмена стандартного поведения формы
        event.preventDefault();

        // Получение данных из формы
        const formData = $(this).serialize();

        // Отправка данных на обработчик PHP с использованием Ajax
        $.ajax({
            url: '/api/select/order/', // Путь к обработчику PHP
            type: 'POST', // Метод отправки данных
            data: formData, // Данные формы
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Обработка ошибок при отправке запроса
                console.log(error); // Вывод ошибки в консоль
            }
        });
    });
}

const addOptionsToSelect = (selectElement, data) => {
    data.forEach(item => {
        const option = '<option value="' + item.key + '">' + item.value + '</option>';
        selectElement.append(option);
    });
}