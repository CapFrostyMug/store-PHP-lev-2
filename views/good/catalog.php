<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($catalog as $item): ?>
                <div class="col">
                    <div class="card shadow-sm">

                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                             xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                             preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect>
                            <text x="50%" y="50%" fill="#eceeef" dy=".3em"><?= $item["name"] ?></text>
                        </svg>

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/good/card/?id=<?= $item["id"] ?>"
                                       class="btn btn-sm btn-outline-secondary">Подробнее</a>
                                    <button type="button" class="btn btn-sm btn-outline-secondary buy"
                                            data-id="<?= $item["id"] ?>">Купить
                                    </button>
                                </div>
                                <middle class="text-muted">Цена: <?= $item["price"] ?> &#8381;</middle>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div style="display: flex; justify-content: center">
            <a href="/good/catalog/?page=<?= $page ?>" class="btn btn-sm btn-outline-secondary"
               style="width: 185px; margin: 50px 0 0 9px;">Еще</a>
        </div>
    </div>
</div>

<script>
    let buttons = document.querySelectorAll(".buy");
    buttons.forEach((item) => {
        item.addEventListener("click", () => {
            let id = item.getAttribute("data-id");
            (
                async () => {
                    const response = await fetch("/cart/add/?id=" + id);
                    const answer = await response.json();
                    document.getElementById("count").innerText = answer.count;
                }
            )();
        })
    });
</script>
