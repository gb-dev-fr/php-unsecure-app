<?php include_once "header.php"; ?>

<div class="page-head bg-danger bg-opacity-10 py-5 mb-5">
    <div class="container">
        <h1><?= $bien['titre']; ?></h1>
        <p>
            Vendeur responsable : <span class="text-immo"><?= $bien['prenom'] ?> <?= $bien['nom'] ?></span></small>
        </p>
    </div>
</div>

<div class="page-content mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php if ($bien['img']) { ?>
                    <div class="banner-img mb-5" style="background-image: url('<?= $bien['img']; ?>')"></div>
                    <?php } ?>
                    <?= $bien['description']; ?>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card border-danger">
                    <div class="card-body">
                        <h5 class="card-title">Votre vendeur</h5>
                        <p class="card-text"><?= $bien['nom']; ?> <?= $bien['prenom']; ?></p>
                        <p class="card-text">Email : <br /><?= $bien['email']; ?></p>
                        <p class="card-text">Téléphone : <br /><?= $bien['telephone']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php"; ?>
