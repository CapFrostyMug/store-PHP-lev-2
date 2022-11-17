<h1 style="padding: 50px 0 10px">Админка</h1>
<h2 style="padding: 0 0 50px">список заказов</h2>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">№</th>
        <th scope="col">Имя клиента</th>
        <th scope="col">Номер телефона</th>
        <th scope="col">Детали заказа</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($orders as $item): ?>
        <tr>
            <td><?= $item["id"] ?></td>
            <td><?= $item["user_name"] ?></td>
            <td><?= $item["phone_num"] ?></td>
            <td><a href="user/orderdetails/?id=<?= $item["session_id"] ?>">Подробнее</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
