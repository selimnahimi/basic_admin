<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserPageController extends AbstractController
{
    /**
     * @Route("/user", name="userpage")
    */
    public function display(): Response
    {
        return $this->render('userpage.html.twig');
    }
}

?>