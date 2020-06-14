<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hash;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->name;
    }

    public function setUsername(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->hash;
    }

    public function setPassword(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getRoles()
    {
        #$roles = $this->get('security.role_hierarchy');
        return array('ROLE_ADMIN');
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    #public function getRoles(): array
    #{
    #    $roles = $this->type->toArray();
    #    foreach($roles as $k => $v) {
    #        $roles[$k] = $v->getRole();
    #    }
    #    return $roles;
    #}

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {

    }
}
