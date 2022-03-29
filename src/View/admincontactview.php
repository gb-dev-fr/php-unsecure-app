<?php include_once "adminhead.php"; ?>

<div class="container-fluid">
    <div class="row">

        <?php include_once "adminnav.php"; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Contact de vente</h1>
            </div>

            <div class="page-content mb-5">
                <div class="container">
                    <div class="p-5 bg-immo bg-opacity-10">
                        <h2><?= $contact['prenom']; ?> <?= $contact['nom']; ?></h2>
                        <p>Email : <?= $contact['email']; ?></p>
                        <p>Téléphone : <?= $contact['telephone']; ?></p>
                    </div>
                    <hr />
                    <?= $contact['description']; ?>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>