<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Entity\Trait\CreatedAtTrait;
use App\Repository\MobileUserRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MobileUserRepository::class)]
#[ApiResource(
    operations:[
        new Get(normalizationContext:['groups' => ['getforMobileUser']]),
        new GetCollection(normalizationContext:['groups' => ['getforDay']]),
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
    
    // #[ORM\OneToMany(mappedBy: 'authorMobile', targetEntity: Comment::class, orphanRemoval: true)]
    // private Collection $comments;

    // public function __construct()
    // {
    //     $this->comments = new ArrayCollection();
    // }
    
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
    
    // /**
    //  * @return Collection<int, Comment>
    //  */
    // public function getComments(): Collection
    // {
    //     return $this->comments;
    // }

    // public function addComment(Comment $comment): static
    // {
    //     if (!$this->comments->contains($comment)) {
    //         $this->comments->add($comment);
    //         $comment->setAuthorMobile($this);
    //     }

    //     return $this;
    // }

    // public function removeComment(Comment $comment): static
    // {
    //     if ($this->comments->removeElement($comment)) {
    //         // set the owning side to null (unless already changed)
    //         if ($comment->getAuthorMobile() === $this) {
    //             $comment->setAuthorMobile(null);
    //         }
    //     }

    //     return $this;
    // }
}
