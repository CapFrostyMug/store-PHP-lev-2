<h2>Каталог</h2>

<?php foreach ($catalog as $item): ?>
    <div>
        <h3><a href="?c=good&a=card&id=<?= $item['id'] ?>"><?= $item['name'] ?></a></h3>
        <p>price: <?= $item['price'] ?></p>
        <button>Купить</button>
    </div>
<?php endforeach; ?>

<a href="?c=good&a=catalog&page=<?= $page ?>">Еще</a>
