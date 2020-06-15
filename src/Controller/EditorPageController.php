<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EditorPageController extends AbstractController
{
    /**
     * @Route("/editor", name="editorpage")
    */
    public function display(): Response
    {
        return $this->render('editorpage.html.twig');
    }
}

?>