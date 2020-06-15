<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

/* Session */
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use App\Entity\User;

/* Security */
use Symfony\Component\Security\Core\Security;

class LandingController extends AbstractController
{
    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @Route("/", name="landing")
    */
    public function display(): Response
    {
        $user = $this->security->getUser();
        
        $userName = $user->getUsername();
        $userRoles = implode(",", $user->getRoles());
        $userLastLogin = $user->getLastLogin();

        #$entityManager = $this->getDoctrine()->getManager();
        #$repository = $entityManager->getRepository('App:User');
        #$users = $repository->findAll();

        #$user->setUsername("test");
        #$entityManager = $this->getDoctrine()->getManager();
        #$entityManager->flush();
        
        return $this->render('landing.html.twig', [
            'username' => $userName,
            'roles' => $userRoles,
            'lastlogin' => $userLastLogin,
        ]);
    }

    public function setUsername(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}

?>