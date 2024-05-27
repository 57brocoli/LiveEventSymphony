<?php

namespace App\Entity\NationSound;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\DayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DayRepository::class)]
#[ApiResource(
    operations:[
        new Get(normalizationContext:['groups' => ['getforDay']]),
        new GetCollection(normalizationContext:['groups' => ['getforDay']]),
    ]
)]
class Day
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['getforDay','getforProg','getforEpisode'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['getforDay', 'getforLieu','getforProg','getforEpisode','getforLieu'])]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'day', targetEntity: Episode::class)]
    #[Groups(['getforDay','getforProg'])]
    private Collection $episode;

    #[ORM\Column]
    #[Groups(['getforDay','getforProg','getforEpisode'])]
    private ?\DateTimeImmutable $date = null;

    #[ORM\ManyToOne(inversedBy: 'day')]
    #[Groups(['getforDay'])]
    private ?Programme $programme = null;

    public function __construct()
    {
        $this->episode = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Episode>
     */
    public function getEpisode(): Collection
    {
        return $this->episode;
    }

    public function addEpisode(Episode $episode): static
    {
        if (!$this->episode->contains($episode)) {
            $this->episode->add($episode);
            $episode->setDay($this);
        }

        return $this;
    }

    public function removeEpisode(Episode $episode): static
    {
        if ($this->episode->removeElement($episode)) {
            // set the owning side to null (unless already changed)
            if ($episode->getDay() === $this) {
                $episode->setDay(null);
            }
        }

        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getProgramme(): ?Programme
    {
        return $this->programme;
    }

    public function setProgramme(?Programme $programme): static
    {
        $this->programme = $programme;

        return $this;
    }

    public function __toString()
    {
        return $this -> name;
    }
}
