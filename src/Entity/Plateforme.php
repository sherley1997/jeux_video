<?php

namespace App\Entity;

use App\Repository\PlateformeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlateformeRepository::class)]
class Plateforme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id = null;

    #[ORM\Column(type: 'integer')]
    private $plateforme = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlateforme(): ?int
    {
        return $this->plateforme;
    }

    public function setPlateforme(int $plateforme): self
    {
        $this->plateforme = $plateforme;

        return $this;
    }
}
