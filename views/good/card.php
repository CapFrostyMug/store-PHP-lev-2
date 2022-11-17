<div class="row mb-2" style="margin-top: 50px">
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col-auto d-none d-lg-block">
                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img"
                     aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>
                        Placeholder</title>
                    <rect width="100%" height="100%" fill="#55595c"></rect>
                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">image</text>
                </svg>
            </div>
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2"><?= $good->description ?></strong>
                <h3 class="mb-3"><?= $good->name ?></h3>
                <strong class="d-inline-block mb-2"><?= $good->price ?> &#8381;</strong>
                <p class="card-text mb-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum facilis
                    impedit maiores optio sit vel!</p>
                <button type="button" class="btn btn-success buy" data-id="<?= $good->id ?>" style="margin-top: 10px">
                    Купить
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let buttons = document.querySelector(".buy");
    buttons.addEventListener("click", () => {
        let id = buttons.getAttribute("data-id");
        (
            async () => {
                const response = await fetch("/cart/add/?id=" + id);
                const answer = await response.json();
                document.getElementById("count").innerText = answer.count;
            }
        )();
    })
</script>
