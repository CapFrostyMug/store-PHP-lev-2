<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
    <li><a href="/" class="nav-link px-2 text-white">Главная</a></li>
    <li><a href="/good/catalog" class="nav-link px-2 text-white">Каталог</a></li>
    <li><a href="/cart" class="nav-link px-2 text-white position-relative">Корзина
            <span id="count"
                  class="position-absolute top-10 start-100 translate-middle badge rounded-pill bg-danger"><?= $count ?>
            </span>
        </a>
    </li>
    <?php if ($isAuth): ?>
        <li><a href="/user" class="nav-link px-2 text-white" style="margin-left: 10px">Личный кабинет (<?= $userName ?>)</a></li>
    <?php endif; ?>
</ul>

<!--<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
</form>-->

<div class="text-end">
    <?php if ($isAuth): ?>
        <a href="/auth/logout" class="btn btn-outline-light me-2">Выход</a>
    <?php else: ?>
        <form action="/auth/login" method="post" style="display: flex; flex-direction: row">
            <input class="form-control form-control-dark" type="text" name="login" placeholder="Логин" value="admin"
                   style="margin-right: 10px">
            <input class="form-control form-control-dark" type="text" name="pass" placeholder="Пароль" value="123"
                   style="margin-right: 10px">
            <button type="submit" name="submit" class="btn btn-outline-light me-2">Войти</button>
        </form>
    <?php endif; ?>
</div>
