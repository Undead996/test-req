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
    <input type="text" name="sort" placeholder="сортировка">
    <br>
    <input type="text" name="description" placeholder="описание">
    <br>
    <button>Создать бренд</button>
</form>