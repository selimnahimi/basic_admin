<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminPageController extends AbstractController
{
    /**
     * @Route("/admin", name="adminpage")
    */
    public function display(): Response
    {
        return $this->render('adminpage.html.twig');
    }
}

?>