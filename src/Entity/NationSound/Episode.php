<?php

namespace App\Entity\NationSound;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\EpisodeRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpisodeRepository::class)]
#[ApiResource(
    operations:[
        new Get(normalizationContext:['groups' => ['getforEpisode']]),
        new GetCollection(normalizationContext:['groups' => ['getforEpisode']]),
    ]
)]
class Episode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['getforEpisode','getforDay','getforProg', 'getforArtiste', 'getforLieu'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['getforEpisode','getforDay','getforProg', 'getforArtiste', 'getforLieu'])]
    private ?string $name = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Groups(['getforEpisode','getforDay','getforProg', 'getforArtiste', 'getforLieu'])]
    private ?\DateTimeInterface $hour = null;

    #[ORM\ManyToOne(inversedBy: 'episodes')]
    // #[ORM\JoinColumn(nullable: false)]
    #[Groups(['getforEpisode','getforDay','getforProg', 'getforLieu'])]
    private ?Artiste $artiste = null;

    #[ORM\ManyToOne(inversedBy: 'episode')]
    #[Groups(['getforEpisode', 'getforArtiste', 'getforLieu'])]
    private ?Day $day = null;

    #[ORM\ManyToOne(inversedBy: 'episodes')]
    #[Groups(['getforEpisode','getforDay','getforProg', 'getforArtiste'])]
    private ?Lieu $lieu = null;

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

    public function getHour(): ?\DateTimeInterface
    {
        return $this->hour;
    }

    public function setHour(\DateTimeInterface $hour): static
    {
        $this->hour = $hour;

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

    public function getDay(): ?Day
    {
        return $this->day;
    }

    public function setDay(?Day $day): static
    {
        $this->day = $day;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
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

}
