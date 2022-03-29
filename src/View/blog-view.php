<?php include_once "header.php"; ?>

<div class="page-head bg-danger bg-opacity-10 py-5 mb-5">
    <div class="container">
        <span class="badge bg-<?= $post['color'] ?> mb-4"><?= $post['name'] ?></span>
        <h1><?= $post['title']; ?></h1>
        <p>
            <small>Publié le <?= date('d/m/Y', strtotime($post['datePublication'])) ?> - Par <span class="text-immo"><?= $post['prenom'] ?> <?= $post['nom'] ?></span></small>
        </p>
    </div>
</div>

<div class="page-content mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php if ($post['img']) { ?>
                    <div class="banner-img mb-5" style="background-image: url('<?= $post['img']; ?>')"></div>
                    <?php } ?>
                    <?= $post['content']; ?>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-3">
                            <div class="card-body">
                                <img src="/assets/img/icons/icon_3.png">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="card-body">
                                <h5 class="card-title">Infos</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="row">
                        <div class="col-3">
                            <div class="card-body">
                                <img src="/assets/img/icons/icon_3.png">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="card-body">
                                <h5 class="card-title">Catégories</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php"; ?>
