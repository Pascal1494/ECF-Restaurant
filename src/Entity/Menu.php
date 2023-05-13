<?php

namespace App\Entity;

use App\Entity\Trait\SlugTrait;
use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    use SlugTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;


    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?string $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: Dishe::class)]
    private Collection $dishe;

    public function __construct()
    {
        $this->dishe = new ArrayCollection();
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
    
    public function __toString()
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Dishe>
     */
    public function getDishe(): Collection
    {
        return $this->dishe;
    }

    public function addDishe(Dishe $dishe): self
    {
        if (!$this->dishe->contains($dishe)) {
            $this->dishe->add($dishe);
            $dishe->setMenu($this);
        }

        return $this;
    }

    public function removeDishe(Dishe $dishe): self
    {
        if ($this->dishe->removeElement($dishe)) {
            // set the owning side to null (unless already changed)
            if ($dishe->getMenu() === $this) {
                $dishe->setMenu(null);
            }
        }

        return $this;
    }
}