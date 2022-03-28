<?php
if ($isAuth): ?>
    Добро пожаловать <?= $userName ?> <a href="?c=auth&a=logout">[Выход]</a>
<?php else: ?>
    <form action="?c=auth&a=login" method="post">
        <input type="text" name="login" placeholder="Логин" value="admin">
        <input type="text" name="pass" placeholder="Пароль" value="123">
        <input type="submit" name="submit" value="Войти">
    </form>
<?php endif; ?><br>

<a href="?">Главная</a>
<a href="?c=good&a=catalog">Каталог</a>
<a href="?c=cart">Корзина(<span id="count"><?= $count ?></span>)</a><br>
