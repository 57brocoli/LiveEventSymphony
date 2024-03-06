<?php

namespace App\Entity\NationSound;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Entity\Trait\CreatedAtTrait;
use App\Repository\MobileUserRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\GetByEmailAction;

#[ORM\Entity(repositoryClass: MobileUserRepository::class)]
#[ApiResource(
    operations:[
        new Get(normalizationContext:['groups' => ['getforMobileUser']]),
        new Post()
    ]
)]

class MobileUser
{
    use CreatedAtTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['getforMobileUser'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['getforMobileUser'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['getforMobileUser'])]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(nullable: true)]
    private ?int $phone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): static
    {
        $this->phone = $phone;

        return $this;
    }
    
    public function __toString()
    {
        return $this->name;
    }
}
