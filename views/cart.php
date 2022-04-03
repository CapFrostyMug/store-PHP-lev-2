<h2>Корзина</h2>

<?php foreach ($cart as $item): ?>
    <div id="<?= $item["carts_id"] ?>">
        <h3><?= $item["name"] ?></h3>
        <p>price: <?= $item["price"] ?></p>
        <button class="del" data-id="<?= $item["carts_id"] ?>">Удалить</button>
    </div>
<?php endforeach; ?>

<script>

    let buttons = document.querySelectorAll(".del");

    buttons.forEach((item) => {
        item.addEventListener("click", () => {
            let id = item.getAttribute("data-id");
            (
                async () => {
                    const response = await fetch("/cart/delete/?id=" + id);
                    const answer = await response.json();
                    document.getElementById("count").innerText = answer.count;
                    document.getElementById(id).remove();
                }
            )();
        });
    });

</script>
