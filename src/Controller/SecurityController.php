<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Http\Requests;

/* Forms */
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Gregwar\CaptchaBundle\Type\CaptchaType;

class SecurityController extends AbstractController
{
    /**
      * @Route("/login", name="login")
      */

    public function login(AuthenticationUtils $authenticationUtils)
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

        $defaultData = [];
        $form = $this->createFormBuilder($defaultData)
            ->add('username', TextType::class)
            ->add('password', PasswordType::class)
            ->add('send', SubmitType::class)
            ->add('captcha', CaptchaType::class)
            ->getForm();

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'form'          => $form->createView(),
            'tries'         => $tries,
        ));
    }
}

?>