<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Request;

/* Forms */
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Gregwar\CaptchaBundle\Type\CaptchaType;

use Psr\Log\LoggerInterface;

class SecurityController extends AbstractController
{
    /**
      * @Route("/login", name="login")
      */

    public function login(AuthenticationUtils $authenticationUtils, Request $request, LoggerInterface $logger)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        if ($error)
        {
            $tries = $this->get('session')->get('tries');
            $this->get('session')->set('tries', $tries+1);
        }

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $tries = $this->get('session')->get('tries');

        #$defaultData = [];
        $form = $this->createFormBuilder([])
            ->add('username', TextType::class)
            ->add('password', PasswordType::class)
            #->add('send', SubmitType::class)
            #->add('captcha', CaptchaType::class)
            ->getForm();
        
        # Add captcha if user failed 3 or more times
        if ($tries >= 3)
        {
            $form->add('captcha', CaptchaType::class);
        }
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            # Redirect to user validation with code 307 (keep POST method)
            return $this->redirect($this->generateUrl('login_check'), 307);
        }

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'form'          => $form->createView(),
            'tries'         => $tries,
        ));
    }
}

?>