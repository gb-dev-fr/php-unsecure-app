<?php include_once "adminhead.php"; ?>

<div class="container-fluid">
    <div class="row">

        <?php include_once "adminnav.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><?= $title ?></h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="me-2">
                        <a class="btn btn-sm btn-success" href="/admin/posts/add">Ajouter</a>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Publication</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post) { ?>
                <tr>
                    <th scope="row"><?= $post['id'] ?></th>
                    <td><?= $post['title'] ?></td>
                    <td><?= $post['datePublication'] ?></td>
                    <td><?= $post['prenom'] . " " . $post['nom'] ?></td>
                    <td><?= $post['name'] ?></td>
                    <td>
                        <a href="/admin/posts/delete/<?= $post['id'] ?>" class="text-immo"><span class="material-icons">delete</span></a>
                        <a href="/admin/posts/edit/<?= $post['id'] ?>" class="text-success"><span class="material-icons">edit</span></a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>

            <?php if (empty($posts)) echo "<p class='text-center'>Aucun résultats</p>" ?>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

