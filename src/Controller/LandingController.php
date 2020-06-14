<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/* Forms */
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/* Session */
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use App\Entity\User;

class LandingController extends AbstractController
{
    /**
      * @Route("/", name="landing")
      */
    public function number(): Response
    {
        #$number = random_int(0, 100);

        return $this->render('landing.html.twig');
    }
}

?>