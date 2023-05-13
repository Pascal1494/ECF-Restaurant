<?php

namespace App\Entity\Trait;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;

trait SlugTrait
{
  #[ORM\Column(length: 255)]
  private ?string $slug = null;

  public function getSlug(): ?string
  {

    $slugify = new Slugify();
    $this->slug = $slugify->slugify($this->name);
    return $this->slug;
  }

  public function setSlug(string $slug): self
  {
    $this->slug = $slug;

    return $this;
  }
}