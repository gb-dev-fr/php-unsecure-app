<?php include_once "header.php"; ?>

<div class="home-cover mb-5" style="background-image: url('/assets/img/banner_1.jpg')">
    <div class="container h-100">
        <div class="row h-100 d-flex align-items-center justify-content-center">
            <div class="card w-50 bg-dark bg-opacity-75 text-white border-0 rounded-0">
                <div class="card-body text-center">
                    <h1 class="card-title"><?= $title; ?></h1>
                    <p class="card-text">
                        Avec Immo+, nous construirons avec vous votre projet immobilier. Vente, Location ou Achat
                        nos experts s'engagent à répondre à vos besoins.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="home-action mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3">
                <a href="/acheter" class="box text-decoration-none text-reset">
                    <div class="card">
                        <div class="row">
                            <div class="col-3">
                                <div class="card-body">
                                    <img src="/assets/img/icons/icon_2.png">
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="card-body">
                                    <h5 class="card-title">Je veux acheter</h5>
                                    <p class="card-text">Devenez propriétaire d'un nouveau bien immobilier avec Immo+</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="/louer" class="box text-decoration-none text-reset">
                    <div class="card">
                        <div class="row">
                            <div class="col-3">
                                <div class="card-body">
                                    <img src="/assets/img/icons/icon_3.png">
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="card-body">
                                    <h5 class="card-title">Je veux louer</h5>
                                    <p class="card-text">Trouvez la location qui vous convient grâce à Immo+</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="/vendre" class="box text-decoration-none text-reset">
                    <div class="card">
                        <div class="row">
                            <div class="col-3">
                                <div class="card-body">
                                    <img src="/assets/img/icons/icon_1.png">
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="card-body">
                                    <h5 class="card-title">Je veux vendre</h5>
                                    <p class="card-text">Confiez la vente de votre bien immobilier grâce aux services Immo+</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="/notre-agence" class="box text-decoration-none text-reset">
                    <div class="card">
                        <div class="row">
                            <div class="col-3">
                                <div class="card-body">
                                    <img src="/assets/img/icons/icon_1.png">
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="card-body">
                                    <h5 class="card-title">Être contacté</h5>
                                    <p class="card-text">Prenez contact aves les experts de notre agence Immo+</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="home-last bg-light py-5 mb-5">
    <div class="container">
        <h2 class="text-center mb-5">Nos exclus du moment</h2>

        <div class="row">
            <?php foreach ($exclus as $exclu) { ?>
            <div class="col-12 col-md-4">
                <div class="card">
                    <img src="<?= $exclu['img'] ?>" class="card-img-top" alt="...">
                    <div class="card-img-overlay">
                        <span class="badge bg-warning">EXCLU</span>
                    </div>
                    <div class="card-body z-top">
                        <h5 class="card-title"><?= $exclu['titre'] ?> - <small>Référence <?= $exclu['ref'] ?></small></h5>
                        <span class="badge border border-secondary text-immo mb-3"><?= $exclu['prix'] ?> €</span>
                        <span class="badge border border-secondary text-immo mb-3"><?= $exclu['ville'] ?></span>
                        <p class="card-text"><?= $this->truncate($exclu['description']) ?></p>
                    </div>
                    <div class="card-footer z-top">
                        <div class="row">
                            <div class="col-6">
                                <a href="/biens/<?= $exclu['id'] ?>" class="w-100 btn btn-immo">En savoir plus</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="w-100 btn btn-outline-immo">Contacter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="home-exclu py-5 mb-5">
    <div class="container">
        <h2 class="text-center mb-5">Les derniers biens publiés</h2>

        <div class="row">
            <?php foreach ($biens as $bien) { ?>
            <div class="col-12 col-md-4">
                <div class="card">
                    <img src="<?= $bien['img'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $bien['titre'] ?> - <small>Référence <?= $bien['ref'] ?></small></h5>
                        <span class="badge border border-secondary text-immo mb-3"><?= $bien['prix'] ?> €</span>
                        <span class="badge border border-secondary text-immo mb-3"><?= $bien['ville'] ?></span>
                        <p class="card-text"><?= $this->truncate($bien['description']) ?></p>
                    </div>
                    <div class="card-footer">
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
            <?php } ?>
        </div>
    </div>
</div>

<div class="home-rating mb-5">
    <div class="container">
        <div class="bg-immo bg-opacity-10 rounded-3 p-5 text-center">
            <h2 class="mb-5 text-immo">Ce que pense nos clients</h2>
            <p>
                94% de nos clients sont satisfait
            </p>
            <p>
                Plus de 500 000 personnes logées
            </p>
            <p>
                Grande maîtrise du secteur Arrageois
            </p>
        </div>
    </div>
</div>

<div class="home-posts bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5">Nos derniers articles</h2>

        <div class="row">
            <?php foreach ($posts as $post) { ?>
            <div class="col-12 col-md-4">
                <div class="card shadow border-0">
                    <img src="<?= $post['img'] ?>" class="card-img-top" alt="...">
                    <div class="card-img-overlay">
                        <span class="badge bg-<?= $post['color'] ?>"><?= $post['name'] ?></span>
                    </div>
                    <div class="card-body z-top">
                        <h5 class="card-title"><?= $post['title'] ?></h5>
                        <div class="mb-3">
                            <small>Publié le <?= date('d/m/Y', strtotime($post['datePublication'])) ?> - Par <?= $post['prenom'] ?> <?= $post['nom'] ?></small>
                        </div>
                        <p class="card-text"><?= $this->truncate($post['content']) ?></p>
                        <a href="/blog/<?= $post['id'] ?>" class="text-immo">Lire la suite</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include_once "footer.php"; ?>
