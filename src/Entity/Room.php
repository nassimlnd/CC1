<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Valid;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
class Room
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[
        ORM\Column(nullable: true),
        Assert\LessThanOrEqual(
            value: 30,
            message: 'Il ne peut pas y avoir plus de 30 PC dans une salle.'
        )
    ]
    private ?int $nbPC = null;

    #[ORM\Column]
    private ?bool $reserved = null;

    #[ORM\Column(length: 255)]
    private ?string $codeBatiment = null;

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

    public function getNbPC(): ?int
    {
        return $this->nbPC;
    }

    public function setNbPC(?int $nbPC): static
    {
        $this->nbPC = $nbPC;

        return $this;
    }

    public function isReserved(): ?bool
    {
        return $this->reserved;
    }

    public function setReserved(bool $reserved): static
    {
        $this->reserved = $reserved;

        return $this;
    }

    public function getCodeBatiment(): ?string
    {
        return $this->codeBatiment;
    }

    public function setCodeBatiment(string $codeBatiment): static
    {
        $this->codeBatiment = $codeBatiment;

        return $this;
    }
}
