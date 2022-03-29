<?php

namespace App;


/**
 * Class Controller
 * @package App
 */
class Controller
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var Database
     */
    private $database;

    /**
     * @var array
     */
    private $user;

    /**
     * Controller constructor.
     * @param Request $request
     * @param Router $router
     */
    public function __construct(Request $request, Router $router)
    {
        $this->request = $request;
        $this->router = $router;
        $this->database = Database::getInstance($request);
        $this->user = [];

        if (isset($_SESSION['auth'])) {
            $query = $this->database->getPdo()->prepare("SELECT * FROM users WHERE id = :id");
            $query->execute(['id' => $_SESSION['auth']]);
            $this->user = $query->fetch();
        }
    }

    /**
     * @param string $routeName
     * @param array $args
     * @return RedirectResponse
     */
    protected function redirect($routeName, $args = [])
    {
        $route = $this->router->getRoute($routeName);
        $url = $route->generateUrl($args);
        return new RedirectResponse($url);
    }

    /**
     * @param string $filename
     * @param array $data
     * @return Response
     */
    protected function render($filename, $data = [])
    {
        // On charge notre vue
        //$view = $this->twig->load($filename);
        // On récupère le contenu de la vue en lui passant nos données pour que la vue puisse les exploiter
        //$content = $view->render($data);
        $data["user"] = $this->user;
        extract($data);
        ob_start();
        $content= include("../src/View/". $filename . ".php");
        // On renvoie un objet Response
        return new Response(ob_get_clean());
    }

    /**
     * @param mixed $data
     * @return JsonResponse
     */
    protected function json($data)
    {
        // On renvoie un objet JsonResponse
        return new JsonResponse($data);
    }

    /**
     * @return Database
     */
    protected function getDatabase()
    {
        return $this->database;
    }

    protected function getRequest()
    {
        return $this->request;
    }

    protected function getUser()
    {
        return $this->user;
    }

}