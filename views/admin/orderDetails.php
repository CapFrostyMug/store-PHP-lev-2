<h1 style="padding: 50px 0 10px">Админка</h1>
<h2 style="padding: 0 0 50px">детали заказа</h2>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Наименование товара</th>
        <th scope="col">Тип товара</th>
        <th scope="col">Стоимость, &#8381;</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cart as $item): ?>
        <tr>
            <td><?= $item["name"] ?></td>
            <td><?= $item["description"] ?></td>
            <td><?= $item["price"] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
