<?php

namespace Controller;

use App\Controller;

class MainController extends Controller
{

    public function home()
    {
        $pdo = $this->getDatabase()->getPdo();
        $exclus = $pdo->query("SELECT * FROM biens WHERE exclu = 1 ORDER BY id DESC LIMIT 3");
        $biens = $pdo->query("SELECT * FROM biens WHERE exclu = 0 ORDER BY id DESC LIMIT 6");
        $posts = $pdo->query("SELECT articles.*, users.nom, users.prenom, tags.name, tags.color FROM articles LEFT JOIN users ON users.id = articles.idAuteur LEFT JOIN tags ON tags.id = articles.idTag ORDER BY articles.id DESC LIMIT 3");

        return $this->render("home", [
            "title" => "L'immobilier rien que pour vous.",
            "exclus" => $exclus,
            "biens" => $biens,
            "posts" => $posts
        ]);
    }

    public function location()
    {
        $pdo = $this->getDatabase()->getPdo();
        $biens = $pdo->query("SELECT * FROM biens WHERE type = 1 ORDER BY id DESC");

        return $this->render("index", [
            "title" => "Trouvez et louez votre prochain bien immobilier",
            "biens" => $biens

        ]);
    }

    public function sell()
    {
        $query = $this->getDatabase()->getPdo()->query("SELECT * FROM types WHERE id != 1");
        $types = $query->fetchAll();

        if (strtoupper($this->getRequest()->getServer()['REQUEST_METHOD']) === 'POST' && isset($this->getRequest()->getPost()['formSell'])) {
            $type = $this->getRequest()->getPost()['formSellType'];
            $num = $this->getRequest()->getPost()['formSellNum'];
            $rue = $this->getRequest()->getPost()['formSellRue'];
            $cp = $this->getRequest()->getPost()['formSellCode'];
            $ville = $this->getRequest()->getPost()['formSellVille'];
            $surface = $this->getRequest()->getPost()['formSellSurface'];
            $chambres = $this->getRequest()->getPost()['formSellChambres'];
            $description = $this->getRequest()->getPost()['formSellDescription'];
            $idUser = isset($_SESSION['auth']) ?: null;
            $nom = $this->getRequest()->getPost()['formSellNom'];
            $prénom = $this->getRequest()->getPost()['formSellPrenom'];
            $email = $this->getRequest()->getPost()['formSellEmail'];
            $phone = $this->getRequest()->getPost()['formSellTel'];

            $pdo = $this->getDatabase()->getPdo();
            $query = $pdo->prepare("INSERT INTO sellContact (idType, numero, rue, codePostale, ville, surface, chambres, description, idUser, nom, prenom, telephone, email) VALUES(:idType, :numero, :rue, :codePostale, :ville, :surface, :chambres, :description, :idUser, :nom, :prenom, :telephone, :email)");
            $query->execute([
                'idType' => $type,
                'numero' => $num,
                'rue' => $rue,
                'codePostale' => $cp,
                'ville' => $ville,
                'surface' => $surface,
                'chambres' => $chambres,
                'description' => $description,
                'idUser' => $idUser,
                'nom' => $nom,
                'prenom' => $prénom,
                'telephone' => $phone,
                'email' => $email
            ]);
            // Simulation envois de mail

            return $this->redirect("sell");
        }

        return $this->render("sell", [
            "title" => "Vendez votre bien immobilier",
            "types" => $types
        ]);
    }

    public function buy()
    {
        $pdo = $this->getDatabase()->getPdo();
        $biens = $pdo->query("SELECT * FROM biens WHERE type != 1 ORDER BY id DESC");

        return $this->render("index", [
            "title" => "Concrétisez l'achat de votre bien immobilier",
            "biens" => $biens
        ]);
    }

    public function agency()
    {
        // Formulaire fictif

        return $this->render("page", [
            "title" => "Votre agence immobilière de l'Arrageois et du Ternois",
            "content" => "Immo+ est une agence immobilière spacialisé dans la vente, la location et l'achat de biens. Principalement situé dans le secteur Arrageois et le Ternois, nous mettons
            à votre entière disposition une équipe compétente. Nos conseillers vous accompagnerons dans votre projet immobilier tel que la vente et l'estimation immobilière, la location, mais également de tous vos projets d'accession à la propriété ou d'investissement immobilier locatif et de financement. 
            Découvrez également notre catalogue avec plusieurs centaines d'annonces immobilières : maisons, appartements, immeubles, terrains situés dans de nombreux secteurs. Nous nous focalisons sur les critères de nos clients pour trouver le bien qui leur conviendra. Maisons individuelles, de ville, de plain-pieds, ou encore maison atypique, bourgeoise ou atypique nous trouverons pour vous le bien de vos rêves.
            Notre mission : mettre notre passion à votre service pour concrétiser votre projet immobilier.
            ",
            "agency" => true
        ]);
    }

    public function legal()
    {
        return $this->render("page", [
            "title" => "Mentions Légales",
            "content" => "À vous de jouer :D",
            "agency" => false
        ]);
    }

    public function privacy()
    {
        return $this->render("page", [
            "title" => "Vie Privée",
            "content" => "À vous de jouer :D",
            "agency" => false
        ]);
    }

    public function blog()
    {
        $pdo = $this->getDatabase()->getPdo();
        $posts = $pdo->query("SELECT articles.*, users.nom, users.prenom, tags.name, tags.color FROM articles LEFT JOIN users ON users.id = articles.idAuteur LEFT JOIN tags ON tags.id = articles.idTag ORDER BY articles.id");

        return $this->render("blog", [
            "title" => "Toute l'actualité de votre agence à Arras",
            "posts" => $posts
        ]);
    }

    public function bienView($id)
    {
        $pdo = $this->getDatabase()->getPdo();
        $bien = $pdo->query("SELECT biens.*, users.nom, users.prenom, users.email, users.telephone, types.libelle FROM biens INNER JOIN users ON users.id = biens.idVendeur LEFT JOIN types ON types.id = biens.type WHERE biens.id = $id");

        return $this->render("bien-view", [
            "bien" => $bien->fetch()
        ]);
    }

    public function blogView($id)
    {
        $pdo = $this->getDatabase()->getPdo();
        $post = $pdo->query("SELECT articles.*, users.nom, users.prenom, tags.name, tags.color FROM articles LEFT JOIN users ON users.id = articles.idAuteur LEFT JOIN tags ON tags.id = articles.idTag WHERE articles.id = $id");

        return $this->render("blog-view", [
            "post" => $post->fetch()
        ]);
    }

    public function register()
    {

        if (isset($_SESSION['auth'])) return $this->redirect("home");

        if (strtoupper($this->getRequest()->getServer()['REQUEST_METHOD']) === 'POST' && isset($this->getRequest()->getPost()['formRegister'])) {
            $nom = $this->getRequest()->getPost()['formRegisterNom'];
            $prénom = $this->getRequest()->getPost()['formRegisterPrénom'];
            $email = $this->getRequest()->getPost()['formRegisterMail'];
            $pass = md5($this->getRequest()->getPost()['formRegisterPass']);
            $phone = $this->getRequest()->getPost()['formRegisterPhone'];

            $pdo = $this->getDatabase()->getPdo();
            $pdo->query("INSERT INTO users (nom, prenom, email, password, role, dateInscription, telephone, photo) VALUES('$nom', '$prénom', '$email','$pass', '0', NOW(), '$phone', '')");

            return $this->redirect("connexion");
        }

        return $this->render("inscription", []);
    }

    public function login()
    {
        if (isset($_SESSION['auth'])) return $this->redirect("home");
        $errors = [];

        if (strtoupper($this->getRequest()->getServer()['REQUEST_METHOD']) === 'POST' && isset($this->getRequest()->getPost()['loginForm'])) {

            $email = $this->getRequest()->getPost()['loginFormEmail'];
            $pass = $this->getRequest()->getPost()['loginFormPass'];

            if (!empty($email) && !empty($pass)) {
                $pdo = $this->getDatabase()->getPdo();
                $query = $pdo->query("SELECT * FROM users WHERE email='$email'");
                $result = $query->fetch();

                if  ($result === false) {
                    $errors[] = "L'utilisateur est inexistant";
                } else {

                    if ($result['password'] == md5($pass)) {
                        $_SESSION['auth'] = $result['id'];
                        return $this->redirect("home");
                    } else {
                        $errors[] = "Le mot de passe est incorrect";
                    }
                }
            }
        }

        return $this->render("login", [
            'errors' => $errors
        ]);
    }

    public function admin()
    {
        if (!isset($_SESSION['auth'])) return $this->redirect("home");

        return $this->render("admin", [
            "title" => "Dashboard",
        ]);
    }

    public function adminusers()
    {
        if (!isset($_SESSION['auth'])) return $this->redirect("home");

        return $this->render("adminusers", [
            "title" => "Utilisateurs",
        ]);
    }

    public function adminusersdelete($id)
    {
        if (!isset($_SESSION['auth'])) return $this->redirect("home");

        $pdo = $this->getDatabase()->getPdo();
        $query = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $query->execute([ "id" => $id ]);

        return $this->redirect("adminUsers");
    }

    public function adminbiens()
    {
        if (!isset($_SESSION['auth'])) return $this->redirect("home");

        return $this->render("adminbiens", [
            "title" => "Biens immobiliers",
        ]);
    }

    public function adminbiensadd()
    {
        if (!isset($_SESSION['auth'])) return $this->redirect("home");

        if (strtoupper($this->getRequest()->getServer()['REQUEST_METHOD']) === 'POST' && isset($this->getRequest()->getPost()['formAddBien'])) {
            $titre = $this->getRequest()->getPost()['formAddBienTitre'];
            $description = $this->getRequest()->getPost()['formAddBienDescription'];
            $prix = $this->getRequest()->getPost()['formAddBienPrix'];
            $ref = $this->getRequest()->getPost()['formAddBienRef'];
            $adresse = $this->getRequest()->getPost()['formAddBienAdresse'];
            $ville = $this->getRequest()->getPost()['formAddBienVille'];
            $codePostale = $this->getRequest()->getPost()['formAddBienCode'];
            $numero = $this->getRequest()->getPost()['formAddBienNum'];
            $type = $this->getRequest()->getPost()['formAddBienType'];
            $exclu = $this->getRequest()->getPost()['formAddBienExclu'] ?: 0;
            $idVendeur = $this->getUser()['id'];

            $filename = $_FILES["formAddBienImg"]["name"];
            $tempname = $_FILES["formAddBienImg"]["tmp_name"];
            $folder = SITE_ROOT . "/assets/img/download/" . $filename;
            $url = "/assets/img/download/" . $filename;

            $pdo = $this->getDatabase()->getPdo();
            $query = $pdo->prepare("INSERT INTO biens (titre, description, prix, ref, adresse, ville, codePostale, numero, type, exclu, idVendeur, img) VALUES(:titre, :description, :prix, :ref, :adresse, :ville, :codePostale, :numero, :type, :exclu, :idVendeur, :img)");
            $query->execute([
                'titre' => $titre,
                'description' => $description,
                'prix' => $prix,
                'ref' => $ref,
                'adresse' => $adresse,
                'ville' => $ville,
                'codePostale' => $codePostale,
                'numero' => $numero,
                'type' => $type,
                'exclu' => $exclu,
                'idVendeur' => $idVendeur,
                'img' => $url
            ]);

            move_uploaded_file($tempname, $folder);

            return $this->redirect("adminBiens");
        }

        return $this->render("adminbiensadd", [
            "title" => "Ajouter un bien immobilier",
        ]);
    }

    public function adminbiensdelete($id)
    {
        if (!isset($_SESSION['auth'])) return $this->redirect("home");

        $pdo = $this->getDatabase()->getPdo();
        $query = $pdo->prepare("DELETE FROM biens WHERE id = :id");
        $query->execute([ "id" => $id ]);

        return $this->redirect("adminBiens");
    }

    public function adminbiensedit($id)
    {
        if (!isset($_SESSION['auth'])) return $this->redirect("home");

        $query1 = $this->getDatabase()->getPdo()->query("SELECT * FROM types");
        $types = $query1->fetchAll();

        $pdo = $this->getDatabase()->getPdo();
        $query = $pdo->prepare("SELECT * FROM biens WHERE id = :id");
        $query->execute([ "id" => $id ]);
        $result = $query->fetch();

        if (strtoupper($this->getRequest()->getServer()['REQUEST_METHOD']) === 'POST' && isset($this->getRequest()->getPost()['formAddBien'])) {
            $titre = $this->getRequest()->getPost()['formAddBienTitre'];
            $description = $this->getRequest()->getPost()['formAddBienDescription'];
            $prix = $this->getRequest()->getPost()['formAddBienPrix'];
            $ref = $this->getRequest()->getPost()['formAddBienRef'];
            $adresse = $this->getRequest()->getPost()['formAddBienAdresse'];
            $ville = $this->getRequest()->getPost()['formAddBienVille'];
            $codePostale = $this->getRequest()->getPost()['formAddBienCode'];
            $numero = $this->getRequest()->getPost()['formAddBienNum'];
            $type = $this->getRequest()->getPost()['formAddBienType'];
            $exclu = $this->getRequest()->getPost()['formAddBienExclu'] ?: 0;

            $filename = $_FILES["formAddBienImg"]["name"];
            $tempname = $_FILES["formAddBienImg"]["tmp_name"];
            $folder = SITE_ROOT . "/assets/img/download/" . $filename;
            $url = "/assets/img/download/" . $filename;

            $pdo = $this->getDatabase()->getPdo();
            $query = $pdo->prepare("UPDATE biens SET titre = :titre, description = :description, prix = :prix, ref = :ref, adresse = :adresse, ville = :ville, codePostale = :codePostale, numero = :numero, type = :type, exclu = :exclu, img = :img WHERE id = :id");
            $query->execute([
                'id' => $result['id'],
                'titre' => $titre,
                'description' => $description,
                'prix' => $prix,
                'ref' => $ref,
                'adresse' => $adresse,
                'ville' => $ville,
                'codePostale' => $codePostale,
                'numero' => $numero,
                'type' => $type,
                'exclu' => $exclu,
                'img' => $url
            ]);

            move_uploaded_file($tempname, $folder);

            return $this->redirect("adminBiens");
        }

        return $this->render("adminbiensadd", [
            "title" => "Modification du bien : " . $result['titre'] . " - Référence : " . $result['ref'],
            "bien" => $result,
            "types" => $types,
        ]);
    }

    public function adminpost()
    {
        if (!isset($_SESSION['auth'])) return $this->redirect("home");

        $pdo = $this->getDatabase()->getPdo();
        $query = $pdo->query("SELECT articles.*, users.prenom, users.nom, tags.name FROM articles INNER JOIN users ON articles.idAuteur = users.id LEFT JOIN tags ON articles.idTag = tags.id");
        $posts = $query->fetchAll();

        return $this->render("adminpost", [
            "title" => "Articles",
            "posts" => $posts
        ]);
    }

    public function adminpostadd()
    {
        if (!isset($_SESSION['auth'])) return $this->redirect("home");

        $query = $this->getDatabase()->getPdo()->query("SELECT * FROM tags");
        $tags = $query->fetchAll();

        if (strtoupper($this->getRequest()->getServer()['REQUEST_METHOD']) === 'POST' && isset($this->getRequest()->getPost()['formAddPost'])) {
            $titre = $this->getRequest()->getPost()['formAddPostTitre'];
            $content = $this->getRequest()->getPost()['formAddPostContent'];
            $idTag = $this->getRequest()->getPost()['formAddPostTag'] ?: null;
            $idAuteur = $this->getUser()['id'];

            $filename = $_FILES["formAddPostImg"]["name"];
            $tempname = $_FILES["formAddPostImg"]["tmp_name"];
            $folder = SITE_ROOT . "/assets/img/download/" . $filename;
            $url = "/assets/img/download/" . $filename;

            $pdo = $this->getDatabase()->getPdo();
            $query = $pdo->prepare("INSERT INTO articles (title, content, datePublication, idAuteur, idTag, img) VALUES(:titre, :content, NOW(), :idAuteur, :idTag, :img)");

            $query->execute([
                'titre' => $titre,
                'content' => $content,
                'idAuteur' => $idAuteur,
                'idTag' => $idTag,
                'img' => $url
            ]);

            move_uploaded_file($tempname, $folder);

            return $this->redirect("adminPosts");
        }

        return $this->render("adminpostadd", [
            "title" => "Ajouter un article",
            "categories" => $tags
        ]);
    }

    public function adminpostsdelete($id)
    {
        if (!isset($_SESSION['auth'])) return $this->redirect("home");

        $pdo = $this->getDatabase()->getPdo();
        $query = $pdo->prepare("DELETE FROM articles WHERE id = :id");
        $query->execute([ "id" => $id ]);

        return $this->redirect("adminPosts");
    }

    public function adminpostsedit($id)
    {
        if (!isset($_SESSION['auth'])) return $this->redirect("home");

        $query1 = $this->getDatabase()->getPdo()->query("SELECT * FROM tags");
        $tags = $query1->fetchAll();

        $pdo = $this->getDatabase()->getPdo();
        $query = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
        $query->execute([ "id" => $id ]);
        $result = $query->fetch();

        if (strtoupper($this->getRequest()->getServer()['REQUEST_METHOD']) === 'POST' && isset($this->getRequest()->getPost()['formAddPost'])) {
            $titre = $this->getRequest()->getPost()['formAddPostTitre'];
            $content = $this->getRequest()->getPost()['formAddPostContent'];
            $idTag = $this->getRequest()->getPost()['formAddPostTag'] ?: null;

            $filename = $_FILES["formAddPostImg"]["name"];
            $tempname = $_FILES["formAddPostImg"]["tmp_name"];
            $folder = SITE_ROOT . "/assets/img/download/" . $filename;
            $url = "/assets/img/download/" . $filename;

            $pdo = $this->getDatabase()->getPdo();
            $query = $pdo->prepare("UPDATE articles SET title = :titre, content = :content, idTag = :idTag, img = :img WHERE id = :id");

            $query->execute([
                'id' => $result['id'],
                'titre' => $titre,
                'content' => $content,
                'idTag' => $idTag,
                'img' => $url
            ]);

            move_uploaded_file($tempname, $folder);

            return $this->redirect("adminPosts");
        }

        return $this->render("adminpostadd", [
            "title" => "Modification de l'article : " . $result['title'],
            "post" => $result,
            "categories" => $tags
        ]);
    }

    public function logout()
    {
        if (!isset($_SESSION['auth'])) return $this->redirect("home");

        unset($_SESSION['auth']);
        unset($_SESSION);
        $_SESSION = [];

        return $this->redirect("home");
    }

    public function truncate(string $text, int $nbr = 100) {
        if (strlen($text) <= $nbr) {
            return $text;
        }
        $text = $text." ";
        $text = substr($text,0,$nbr);
        $text = substr($text,0,strrpos($text,' '));
        $text = $text."...";
        return $text;
    }
}