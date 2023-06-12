<h1>Заказ пиццы</h1>
<form id="order-form">
    <label for="pizza">Выберите пиццу:</label>
    <select name="pizza" id="pizza">
        <option value="Пепперони">Пепперони</option>
        <option value="Деревенская">Деревенская</option>
        <option value="Гавайская">Гавайская</option>
        <option value="Грибная">Грибная</option>
    </select>
    <br>
    <label for="size">Выберите размер, см:</label>
    <select name="size" id="size">
        <option value="21">21</option>
        <option value="26">26</option>
        <option value="31">31</option>
        <option value="45">45</option>
    </select>
    <br>
    <label for="sauce">Выберите соус:</label>
    <select name="sauce" id="sauce">
        <option value="сырный">сырный</option>
        <option value="кисло-сладкий">кисло-сладкий</option>
        <option value="чесночный">чесночный</option>
        <option value="барбекю">барбекю</option>
    </select>
    <br>
    <input type="submit" value="Заказать">
</form>

<div id="order-summary"></div>