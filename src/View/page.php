<?php include_once "header.php"; ?>

<div class="page-head bg-danger bg-opacity-10 py-5 mb-5">
    <div class="container">
        <h1><?= $title; ?></h1>
    </div>
</div>

<div class="page-content mb-5">
    <div class="container">
        <?php if ($agency) { ?>
        <div class="banner-img mb-5" style="background-image: url('/assets/img/arras.jpg')"></div>
        <?php } ?>

        <?= $content; ?>

        <?php if ($agency) { ?>
        <div class="my-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <iframe class="h-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10198.107206942452!2d2.7766698!3d50.2820935!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x33931a8d4d844af!2sEPSI%20Arras!5e0!3m2!1sfr!2sfr!4v1648475323669!5m2!1sfr!2sfr" width="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-12 col-md-6">
                    <h5 class="text-immo">Nous contacter :</h5>
                    <div class="mb-3">
                        <label for="formSellNom" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="formSellNom" id="formSellNom" placeholder="Votre nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="formSellPrenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" name="formSellPrenom" id="formSellPrenom" placeholder="Votre prénom" required>
                    </div>
                    <div class="mb-3">
                        <label for="formSellTel" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" name="formSellTel" id="formSellTel" placeholder="Votre numéro de téléphone" required>
                    </div>
                    <div class="mb-3">
                        <label for="formSellEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" name="formSellEmail" id="formSellEmail" placeholder="Votre email" required>
                    </div>
                    <div class="mb-3">
                        <label for="formSellDescription" class="form-label">Message</label>
                        <textarea class="form-control" name="formSellDescription" id="formSellDescription" rows="5" placeholder="Description complémentaire de votre bien ..." required></textarea>
                    </div>
                    <div class="text-center d-block">
                        <button type="submit" name="formSell" id="formSell" class="btn btn-lg btn-immo w-100">Valider</button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include_once "footer.php"; ?>
