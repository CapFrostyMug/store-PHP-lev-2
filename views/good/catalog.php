<h2>Каталог</h2>

<?php foreach ($catalog as $item): ?>
    <div>
        <h3><a href="?c=good&a=card&id=<?= $item["id"] ?>"><?= $item["name"] ?></a></h3>
        <p>price: <?= $item["price"] ?></p>
        <button class="buy" data-id="<?= $item["id"] ?>">Купить</button>
    </div>
<?php endforeach; ?>

<a href="?c=good&a=catalog&page=<?= $page ?>">Еще</a>

<script>
    let buttons = document.querySelectorAll(".buy");
    buttons.forEach((item) => {
        item.addEventListener("click", () => {
            let id = item.getAttribute("data-id");
            //console.log(id);
            (
                async () => {
                    const response = await fetch("?c=cart&a=add&id=" + id);
                    const answer = await response.json();
                    document.getElementById("count").innerText = answer.count;
                }
            )();
        })
    });
</script>
