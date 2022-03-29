<?php include_once "adminhead.php"; ?>

<div class="container-fluid">
    <div class="row">

        <?php include_once "adminnav.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><?= $title ?></h1>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($contacts as $contact) { ?>
                <tr>
                    <th scope="row"><?= $contact['id'] ?></th>
                    <td><?= $contact['nom'] ?></td>
                    <td><?= $contact['prenom'] ?></td>
                    <td><?= $contact['email'] ?></td>
                    <td><?= $contact['telephone'] ?></td>
                    <td>
                        <a href="/admin/contact/<?= $contact['id'] ?>" class="text-success"><span class="material-icons">visibility</span></a>
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

