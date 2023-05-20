<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(options: ["default" => 2])]
    #[Assert\PositiveOrZero(message: "Le nombre d'invités ne peut pas être négatif.")]
    #[Assert\Range(
        min: 2,
        max: 8,
        notInRangeMessage: "Le nombre d'invités doit être compris entre 2 et 8!"
    )]
    private ?int $nbGuests = null;

    #[ORM\Column(type: "date")]
    #[Assert\GreaterThanOrEqual("today", message: "Vous tentez de réserver une date avant aujourd'hui ! ")]
    #[Assert\LessThanOrEqual("+90 days", message: "Vous ne pouvez pas réserver au delà de 90 jours.")]
    private $date = null;

    #[ORM\Column(type: "time")]
    private $time = null;

    #[ORM\ManyToMany(targetEntity: Allergy::class, inversedBy: 'reservations')]
    private Collection $allergy;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?OpenDay $openDay = null;

    public function __construct()
    {
        $this->allergy = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNbGuests(): ?int
    {
        return $this->nbGuests;
    }

    public function setNbGuests(int $nbGuests): self
    {
        $this->nbGuests = $nbGuests;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return Collection<int, Allergy>
     */
    public function getAllergy(): Collection
    {
        return $this->allergy;
    }

    public function addAllergy(Allergy $allergy): self
    {
        if (!$this->allergy->contains($allergy)) {
            $this->allergy->add($allergy);
        }

        return $this;
    }

    public function removeAllergy(Allergy $allergy): self
    {
        $this->allergy->removeElement($allergy);

        return $this;
    }

    public function getOpenDay(): ?OpenDay
    {
        return $this->openDay;
    }

    public function setOpenDay(?OpenDay $openDay): self
    {
        $this->openDay = $openDay;

        return $this;
    }
}
