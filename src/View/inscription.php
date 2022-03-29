<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

    <title>Immo+</title>
</head>
<body>

<div class="auth text-center">
    <form method="post">
        <img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Création du compte</h1>

        <div class="form-floating mb-3">
            <input type="text" name="formRegisterNom" id="formRegisterNom" class="form-control rounded-0" placeholder="Nom" required>
            <label for="formRegisterNom">Nom</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="formRegisterPrénom" class="form-control rounded-0" id="floatingInput" placeholder="Prénom" required>
            <label for="floatingInput">Prénom</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="formRegisterMail" class="form-control rounded-0" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Adresse email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="formRegisterPass" class="form-control rounded-0" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Mot de passe</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="formRegisterPhone" class="form-control rounded-0" id="floatingInput" placeholder="Téléphone" required>
            <label for="floatingInput">Téléphone</label>
        </div>

        <button name="formRegister" class="w-100 btn btn-lg btn-immo mb-2" type="submit">S'inscrire</button>
        <a href="/" class="text-reset">Retourner vers le site</a>
        <p class="mt-5 mb-3 text-muted">© ImmoPlus 2022. Tous droits réservés.</p>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
