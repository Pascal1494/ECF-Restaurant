<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OpenDayRepository;

#[ORM\Entity(repositoryClass: OpenDayRepository::class)]
class OpenDay
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $day = null;

    #[ORM\Column]
    private ?bool $isMorningOpen = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $morningOpen = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $morningClose = null;

    #[ORM\Column]
    private ?bool $isEveningOpen = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $eveningOpen = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $eveningClose = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function isIsMorningOpen(): ?bool
    {
        return $this->isMorningOpen;
    }

    public function setIsMorningOpen(bool $isMorningOpen): self
    {
        $this->isMorningOpen = $isMorningOpen;

        return $this;
    }

    public function getMorningOpen(): ?\DateTimeInterface
    {
        return $this->morningOpen;
    }

    public function setMorningOpen(\DateTimeInterface $morningOpen): self
    {
        $this->morningOpen = $morningOpen;

        return $this;
    }

    public function getMorningClose(): ?\DateTimeInterface
    {
        return $this->morningClose;
    }

    public function setMorningClose(\DateTimeInterface $morningClose): self
    {
        $this->morningClose = $morningClose;

        return $this;
    }

    public function isIsEveningOpen(): ?bool
    {
        return $this->isEveningOpen;
    }

    public function setIsEveningOpen(bool $isEveningOpen): self
    {
        $this->isEveningOpen = $isEveningOpen;

        return $this;
    }

    public function getEveningOpen(): ?\DateTimeInterface
    {
        return $this->eveningOpen;
    }

    public function setEveningOpen(\DateTimeInterface $eveningOpen): self
    {
        $this->eveningOpen = $eveningOpen;

        return $this;
    }

    public function getEveningClose(): ?\DateTimeInterface
    {
        return $this->eveningClose;
    }

    public function setEveningClose(\DateTimeInterface $eveningClose): self
    {
        $this->eveningClose = $eveningClose;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    
}