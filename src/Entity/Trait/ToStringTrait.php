<?php

namespace App\Entity\Trait;

trait ToStringTrait
{
  public function __toString()
  {
    return $this->name;
  }
}
