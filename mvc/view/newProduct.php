<?php

if (!empty($params['errors'])) {
    echo "<h1>Есть ошибки</h1>";
    echo '<pre>';
    print_r($params['errors']);
    echo '</pre>';
}
?>

<form method="post">
    <input type="text" name="name" placeholder="Название">
    <br>
    <input type="text" name="about" placeholder="описание">
    <br>
    <input type="text" name="price" placeholder="цена">
    <br>
    <input type="text" name="sort" placeholder="сортировка">
    <br>
    <input type="text" name="quantity" placeholder="кол-во">
    <br>
    <input type="text" name="image" placeholder="картинка">
    <br>
    <input type="text" name="brandId" placeholder="id бренда">
    <br>
    <button>Создать продукт</button>
</form>