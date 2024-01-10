<?php

namespace App\Entity\NationSound;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\LinkRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LinkRepository::class)]
#[ApiResource(
    operations:[
        new Get(normalizationContext:['groups' => ['getforLink']]),
        new GetCollection(normalizationContext:['groups' => ['getforLink']]),
    ]
)]
class Link
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['getforDay'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['getforDay', 'getforLieu'])]
    private ?string $link = null;

    #[ORM\ManyToOne(inversedBy: 'links')]
    private ?Artiste $artiste = null;
    
    #[ORM\ManyToOne(inversedBy: 'links')]
    private ?Lieu $lieu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): static
    {
        $this->link = $link;

        return $this;
    }
    public function getArtiste(): ?Artiste
    {
        return $this->artiste;
    }

    public function setArtiste(?Artiste $artiste): static
    {
        $this->artiste = $artiste;

        return $this;
    }
    
    public function getLieu(): ?Lieu
    {
        return $this->lieu;
    }

    public function setLieu(?Lieu $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }
    
    public function __toString()
    {
        return $this->name;
    }
}
