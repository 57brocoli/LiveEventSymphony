<?php

namespace App\Entity\NationSound;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Entity\Trait\CreatedAtTrait;
use App\Repository\NotificationRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationRepository::class)]
#[ApiResource(
    operations:[
        new Get(normalizationContext:['groups' => ['getforNotif']]),
        new GetCollection(normalizationContext:['groups' => ['getforNotif']]),
    ]
)]
class Notification
{
    use CreatedAtTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['getforNotif'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['getforNotif'])]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['getforNotif'])]
    private ?string $content = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    #[Groups(['getforNotif'])]
    private $image = null;

    #[ORM\Column]
    #[Groups(['getforNotif'])]
    private ?bool $actived = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): static
    {
        $this->image = $image;

        return $this;
    }

    public function isActived(): ?bool
    {
        return $this->actived;
    }

    public function setActived(bool $actived): static
    {
        $this->actived = $actived;

        return $this;
    }
}
