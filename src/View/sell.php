<?php include_once "header.php"; ?>

<div class="page-head bg-danger bg-opacity-10 py-5 mb-5">
    <div class="container">
        <h1><?= $title; ?></h1>
    </div>
</div>

<div class="page-content mb-5">
    <div class="container">
        <form action="" method="post">

            <h5 class="text-immo">Votre bien à vendre : </h5>

            <div class="bg-light p-3 mb-5">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="formSellType" class="form-label">Type de bien :</label>
                            <select class="form-select" name="formSellType" id="formSellType" required>
                                <option value="" selected>Choisir un type</option>
                                <?php foreach ($types as $type) { ?>
                                    <option value="<?= $type["id"] ?>"><?= $type["libelle"] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <hr />

                        <div class="row">
                            <div class="col-12 col-md-2">
                                <div class="mb-3">
                                    <label for="formSellNum" class="form-label">Numéro</label>
                                    <input type="text" class="form-control" name="formSellNum" id="formSellNum" placeholder="Numéro de rue" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-10">
                                <div class="mb-3">
                                    <label for="formSellRue" class="form-label">Rue</label>
                                    <input type="text" class="form-control" name="formSellRue" id="formSellRue" placeholder="Nom de la rue" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="formSellCode" class="form-label">Code postale</label>
                                    <input type="text" class="form-control" name="formSellCode" id="formSellCode" placeholder="Code postale" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="formSellVille" class="form-label">Ville</label>
                                    <input type="text" class="form-control" name="formSellVille" id="formSellVille" placeholder="Ville" required>
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="mb-3">
                            <label for="formSellSurface" class="form-label">Surface habitable</label>
                            <input type="text" class="form-control" name="formSellSurface" id="formSellSurface" placeholder="Quelle est la surface habitable ?" required>
                        </div>

                        <div class="mb-3">
                            <label for="formSellChambres" class="form-label">Nombre de chambres</label>
                            <input type="text" class="form-control" name="formSellChambres" id="formSellChambres" placeholder="Combien avez-vous de chambres ?" required>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="mb-3 h-100">
                            <label for="formSellDescription" class="form-label">Description (Facultatif)</label>
                            <textarea class="form-control" name="formSellDescription" id="formSellDescription" rows="18" placeholder="Description complémentaire de votre bien ..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="text-immo">Vos coordonnées : </h5>
            <div class="border p-3 border-danger mb-5">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="formSellNom" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="formSellNom" id="formSellNom" placeholder="Votre nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="formSellPrenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="formSellPrenom" id="formSellPrenom" placeholder="Votre prénom" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="formSellTel" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" name="formSellTel" id="formSellTel" placeholder="Votre numéro de téléphone" required>
                        </div>
                        <div class="mb-3">
                            <label for="formSellEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" name="formSellEmail" id="formSellEmail" placeholder="Votre email" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center d-block">
                <button type="submit" name="formSell" id="formSell" class="btn btn-lg btn-immo w-100">Valider</button>
            </div>

        </form>
    </div>
</div>

<?php include_once "footer.php"; ?>
