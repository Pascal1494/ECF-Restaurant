<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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
