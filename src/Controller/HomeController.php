<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function coucou()
    {
        $abc = 10;
        return $this->render("pages/home.html.twig", [
            "abc" => $abc
        ]);
    } /* En deuxième paramètre de notre render, on peut passer à notre vue les variables
 qu'elle pourra utiliser */
}
