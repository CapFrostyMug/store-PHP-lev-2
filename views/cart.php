<h1 style="padding: 50px">Корзина</h1>
<?php
if (!empty($cart)): ?>
    <div class="row">

        <div class="col-sm-4 order-md-last">
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between">
                    <span>Итого:</span>
                    <strong><?= $sum[0]["total_price"] ?>&nbsp;&#8381;</strong>
                </li>
            </ul>
            <form class="card p-2" action="/order/add" method="post" data-id="form">
                <div class="input-group" style="margin-bottom: 15px">
                    <input type="text" name="user-name" class="form-control" placeholder="Ваше имя" value="Эмметт Браун"
                           required">
                </div>
                <div class="input-group" style="margin-bottom: 15px">
                    <input type="text" name="phone-num" class="form-control"
                           placeholder="Номер телефона в формате +7хххххххххх" value="+7" required
                           pattern="[+][0-9]{11}">
                </div>
                <button class="w-100 btn btn-primary btn-lg" type="submit">Заказать</button>
            </form>
        </div>

        <div class="col-sm-8" style="display: flex; flex-direction: column; align-items: center">
            <?php foreach ($cart as $item): ?>
                <form action="/cart/delete" method="post" class="col-sm-8">
                    <input type="text" hidden name="id" value="<?= $item["carts_id"] ?>">
                    <div id="<?= $item["carts_id"] ?>">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2"><?= $good->description ?></strong>
                                <h5 class="mb-3"><?= $item["name"] ?></h5>
                                <p class="card-text mb-auto"><?= $item["price"] ?>&nbsp;&#8381;</p>
                                <div style="display: flex; justify-content: flex-end">
                                    <button type="submit" class="btn btn-danger del" data-id="<?= $item["carts_id"] ?>"
                                            style="width: 90px">Удалить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>

    </div>
<?php else: ?>
    <h2 style="padding: 10px 50px">Как-то тут пустовато :(</h2>
<?php endif; ?>
