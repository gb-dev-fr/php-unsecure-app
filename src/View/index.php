<?php include_once "header.php"; ?>

<div class="page-head bg-danger bg-opacity-10 py-5 mb-5">
    <div class="container">
        <h1><?= $title; ?></h1>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <?php foreach ($biens as $bien) { ?>
            <div class="col-12">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= $bien['img'] ?>" class="img-fluid rounded-start" alt="...">
                            <?php if ($bien['exclu'] == 1) { ?>
                            <div class="card-img-overlay">
                                <span class="badge bg-warning">EXCLU</span>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-8 z-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= $bien['titre'] ?></h5>
                                <div class="mb-3">
                                    <span class="badge border border-secondary text-immo"><?= $bien['ref'] ?></span>
                                    <span class="badge border border-secondary text-immo"><?= $bien['prix'] ?> €</span>
                                    <span class="badge border border-secondary text-immo">Á <?= $bien['ville'] ?></span>
                                </div>
                                <div class="mb-3">
                                    <span class="text-secondary mb-3">Vendeur : <small>Grégory Boudringhin</small></span>
                                </div>
                                <p class="card-text"><?= $this->truncate($bien['description'], 400) ?></p>
                                <div class="row">
                                    <div class="col-6">
                                        <a href="/biens/<?= $bien['id'] ?>" class="w-100 btn btn-immo">En savoir plus</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="w-100 btn btn-outline-immo">Contacter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include_once "footer.php"; ?>
