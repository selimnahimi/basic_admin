<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Request;

use Psr\Log\LoggerInterface;

class LoginCheckController extends AbstractController
{
    /**
      * @Route("/login_check", name="login_check")
      */

    public function login_check(Request $request)
    {
        if (!$request->isMethod('POST'))
        {
            # Redirect the user if this isn't a POST request
            return $this->redirect($this->generateUrl('login'), 301);
        }

        # This controller is only used to handle authentication, generate an empty html file.
        return $this->render('empty.html.twig');
    }
}

?>