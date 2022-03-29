<?php include_once "adminhead.php"; ?>

<div class="container-fluid">
    <div class="row">

        <?php include_once "adminnav.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><?= $title ?></h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="me-2">
                        <a class="btn btn-sm btn-success" href="/admin/biens/add">Ajouter</a>
                    </div>
                </div>
            </div>

            <?php
                $pdo = $this->getDatabase()->getPdo();
                $query = $pdo->query("SELECT biens.*, types.libelle, users.prenom, users.nom FROM biens LEFT JOIN types ON biens.type = types.id LEFT JOIN users ON users.id = biens.idVendeur");
                $biens = $query->fetchAll();
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Référence</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Type</th>
                    <th scope="col">Vendeur</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($biens as $bien) { ?>
                <tr>
                    <th scope="row"><?= $bien['id'] ?></th>
                    <td><?= $bien['titre'] ?></td>
                    <td><?= $bien['prix'] ?></td>
                    <td><?= $bien['ref'] ?></td>
                    <td><?= $bien['numero'] ?> <?= $bien['adresse'] ?> <?= $bien['codePostale'] ?>, <?= $bien['ville'] ?></td>
                    <td><?= $bien['libelle'] ?></td>
                    <td><?= $bien['prenom'] . " " . $bien['nom']?></td>
                    <td>
                        <a href="/admin/biens/delete/<?= $bien['id'] ?>" class="text-immo"><span class="material-icons">delete</span></a>
                        <a href="/admin/biens/edit/<?= $bien['id'] ?>" class="text-success"><span class="material-icons">edit</span></a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php if (empty($biens)) echo "<p class='text-center'>Aucun résultats</p>" ?>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

