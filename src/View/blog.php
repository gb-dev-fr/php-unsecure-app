<?php include_once "header.php"; ?>

<div class="page-head bg-danger bg-opacity-10 py-5 mb-5">
    <div class="container">
        <h1><?= $title; ?></h1>
    </div>
</div>

<div class="page-content mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php foreach ($posts as $post) { ?>
                    <div class="col">
                        <div class="card">
                            <img src="<?= $post['img'] ?>" class="card-img-top">
                            <div class="card-img-overlay">
                                <span class="badge bg-<?= $post['color'] ?>"><?= $post['name'] ?></span>
                            </div>
                            <div class="card-body z-top">
                                <h5 class="card-title"><?= $post['title'] ?></h5>
                                <div class="mb-3">
                                    <small>Publié le <?= date('d/m/Y', strtotime($post['datePublication'])) ?> - Par <span class="text-immo"><?= $post['prenom'] ?> <?= $post['nom'] ?></span></small>
                                </div>
                                <p class="card-text mb-5"><?= $this->truncate($post['content'], 200) ?></p>
                                <div>
                                    <a href="/blog/<?= $post['id'] ?>" class="btn btn-immo">Lire la suite</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="row">
                        <div class="col-3">
                            <div class="card-body">
                                <img src="/assets/img/icons/icon_3.png">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="card-body">
                                <h5 class="card-title">Blog</h5>
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
