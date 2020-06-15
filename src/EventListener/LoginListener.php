<?php

namespace App\EventListener;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\User;

class LoginListener
{
    private $entityManager;
    private $session;

    public function __construct(EntityManagerInterface $em, SessionInterface $session)
    {
        $this->entityManager = $em;
        $this->session = $session;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        # Get the user
        $user = $event->getAuthenticationToken()->getUser();

        # Set the last login
        $user->setLastLogin(new \DateTime());

        # Update the DB
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        # Reset tries
        $this->session->set('tries', 0);
    }
}

?>