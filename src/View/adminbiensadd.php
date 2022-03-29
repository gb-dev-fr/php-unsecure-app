<?php include_once "adminhead.php"; ?>

<div class="container-fluid">
    <div class="row">

        <?php include_once "adminnav.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><?= $title ?></h1>
            </div>

            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="formAddBienTitre" class="form-label">Titre</label>
                    <input type="text" class="form-control" name="formAddBienTitre" id="formAddBienTitre" placeholder="Titre du bien" <?= !empty($bien) ? 'value="' . $bien['titre'] . '"': "" ?>>
                </div>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="mb-3">
                            <label for="formAddBienPrix" class="form-label">Prix</label>
                            <input type="text" class="form-control" name="formAddBienPrix" id="formAddBienPrix" placeholder="100000€" <?= !empty($bien) ? 'value="' . $bien['prix'] . '"': "" ?>>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mb-3">
                            <label for="formAddBienType" class="form-label">Type de bien :</label>
                            <select class="form-select" name="formAddBienType" id="formAddBienType">
                                <option value="" selected>Choisir un type</option>
                                <?php foreach ($types as $type) { ?>
                                    <option value="<?= $type["id"] ?>" <?= $bien['type'] == $type['id'] ? "selected" : ""?>><?= $type["libelle"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mb-3">
                            <label for="formAddBienRef" class="form-label">Référence</label>
                            <input type="text" class="form-control" name="formAddBienRef" id="formAddBienRef" placeholder="AP0034" <?= !empty($bien) ? 'value="' . $bien['ref'] . '"': "" ?>>
                        </div>
                    </div>
                </div>

                <hr />

                <h6>Adresse du bien : </h6>
                <div class="p-3">
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <div class="mb-3">
                                <label for="formAddBienNum" class="form-label">Numéro</label>
                                <input type="text" class="form-control" name="formAddBienNum" id="formAddBienNum" placeholder="Numéro de rue" <?= !empty($bien) ? 'value="' . $bien['numero'] . '"': "" ?>>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="formAddBienAdresse" class="form-label">Rue</label>
                                <input type="text" class="form-control" name="formAddBienAdresse" id="formAddBienAdresse" placeholder="Nom de la rue" <?= !empty($bien) ? 'value="' . $bien['adresse'] . '"': "" ?>>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="mb-3">
                                <label for="formAddBienCode" class="form-label">Code postale</label>
                                <input type="text" class="form-control" name="formAddBienCode" id="formAddBienCode" placeholder="62000" <?= !empty($bien) ? 'value="' . $bien['codePostale'] . '"': "" ?>>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="mb-3">
                                <label for="formAddBienVille" class="form-label">Ville</label>
                                <input type="text" class="form-control" name="formAddBienVille" id="formAddBienVille" placeholder="Ville" <?= !empty($bien) ? 'value="' . $bien['ville'] . '"': "" ?>>
                            </div>
                        </div>
                    </div>
                </div>

                <hr />

                <div class="mb-3">
                    <label for="formAddBienImg">Image de l'article :</label>
                    <input type="file" class="form-control-file" id="formAddBienImg" name="formAddBienImg">
                </div>

                <div class="mb-3">
                    <label for="formAddBienDescription" class="form-label">Description</label>
                    <textarea class="form-control" name="formAddBienDescription" id="formAddBienDescription" rows="8"><?= !empty($bien) ? $bien['description'] : "" ?></textarea>
                </div>

                <div class="form-check mb-5">
                    <input class="form-check-input" type="checkbox" value="1" id="formAddBienExclu" name="formAddBienExclu" <?= !empty($bien) && $bien['exclu'] == 1 ? "checked" : "" ?>>
                    <label class="form-check-label" for="formAddBienExclu">
                        Bien en exclusivité
                    </label>
                </div>

                <div class="text-center">
                    <button type="submit" name="formAddBien" id="formAddBien" class="btn btn-lg btn-immo">Valider</button>
                </div>

            </form>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

