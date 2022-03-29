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
                    <label for="formAddPostTitre" class="form-label">Titre</label>
                    <input type="text" class="form-control" name="formAddPostTitre" id="formAddPostTitre" <?= !empty($post) ? 'value="' . $post['title'] . '"': "" ?> placeholder="Titre de l'article">
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="formAddPostTag" class="form-label">Catégorie :</label>
                        <select class="form-select" name="formAddPostTag" id="formAddPostTag">
                            <option value="" selected>Choisir un type</option>
                            <?php foreach ($categories as $categorie) { ?>
                            <option value="<?= $categorie["id"] ?>" <?= !empty($post) && $post['idTag'] == $categorie['id'] ? "selected" : ""?>><?= $categorie["name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="formAddPostImg">Image de l'article :</label>
                    <input type="file" class="form-control-file" id="formAddPostImg" name="formAddPostImg">
                </div>

                <div class="mb-3">
                    <label for="formAddPostContent" class="form-label">Contenu</label>
                    <textarea class="form-control" name="formAddPostContent" id="formAddPostContent" rows="8"><?= !empty($post) ? $post['content'] : "" ?></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" name="formAddPost" id="formAddPost" class="btn btn-lg btn-immo">Valider</button>
                </div>

            </form>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

