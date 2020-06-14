<?php

namespace App\EventListener;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use App\Entity\User;

class LoginListener
{
    private $entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
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
    }
}

?>