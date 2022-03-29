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

<div class="topbar bg-dark">
    <div class="container">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="#">Facebook</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Twitter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">LinkedIn</a>
            </li>
        </ul>
    </div>
</div>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white shadow">
    <div class="container justify-content-between">
        <a class="navbar-brand" href="#">Immo+</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $_SERVER['REQUEST_URI'] == "" || $_SERVER['REQUEST_URI'] == "/" ? "active" : ""; ?>" aria-current="page" href="/"><span class="material-icons">home</span>Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_SERVER['REQUEST_URI'] == "/acheter" ? "active" : ""; ?>" href="/acheter"><span class="material-icons">key</span>Acheter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_SERVER['REQUEST_URI'] == "/louer" ? "active" : ""; ?>" href="/louer"><span class="material-icons">location_city</span>Louer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_SERVER['REQUEST_URI'] == "/vendre" ? "active" : ""; ?>" href="/vendre"><span class="material-icons">sell</span>Vendre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_SERVER['REQUEST_URI'] == "/notre-agence" ? "active" : ""; ?>" href="/notre-agence"><span class="material-icons">store</span>L'agence</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_SERVER['REQUEST_URI'] == "/blog" ? "active" : ""; ?>" href="/blog"><span class="material-icons">speaker_notes</span>Le mag</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (!isset($_SESSION['auth'])) {?>
                <li class="nav-item">
                    <a class="nav-link" href="/se-connecter">Se connecter</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link">|</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/inscription">S'inscrire</a>
                </li>
                <?php } ?>
                <?php if (isset($_SESSION['auth'])) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?= $user['prenom'] . " " . $user['nom'] ?></a>
                    </li>
                <?php } ?>
                <?php if (!empty($user) && $user['role'] == 1) {?>
                    <li class="nav-item">
                        <span class="nav-link">|</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-immo" href="/admin"><span class="material-icons">admin_panel_settings</span> Admin</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
