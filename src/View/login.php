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
        <h1 class="h3 mb-3 fw-normal">Se connecter</h1>

        <?php
            if (!empty($errors)) {
                echo '<div class="alert alert-danger">';
                echo '<p>Plusieurs champs ne sont pas correctes :</p>';
                echo "<ul>";
                foreach ($errors as $error) {
                    echo "<li>" . $error . "</li>";
                }
                echo "</ul>";
                echo '</div>';
            }
        ?>

        <div class="form-floating mb-3">
            <input type="email" name="loginFormEmail" class="form-control rounded-0" id="loginFormEmail" placeholder="name@example.com" required>
            <label for="loginFormEmail">Adresse email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="loginFormPass" class="form-control rounded-0" id="loginFormPass" placeholder="Password" required>
            <label for="loginFormPass">Mot de passe</label>
        </div>

        <button class="w-100 btn btn-lg btn-immo mb-2" name="loginForm" type="submit">Connexion</button>
        <a href="/" class="text-reset">Retourner vers le site</a>
        <p class="mt-5 mb-3 text-muted">© ImmoPlus 2022. Tous droits réservés.</p>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
