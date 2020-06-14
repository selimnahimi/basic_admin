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
    public function number(): Response
    {
        $user = $this->security->getUser();
        $userRoles = implode(",", $user->getRoles());
        #$user->setUsername("test");
        #$entityManager = $this->getDoctrine()->getManager();
        #$entityManager->flush();
        
        return $this->render('landing.html.twig', [
            'roles' => $userRoles,
        ]);
    }

    public function setUsername(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}

?>