<?php

namespace App\Entity;

use App\Repository\ReponseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseRepository::class)]
class Reponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateRep = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToOne(mappedBy: 'idR', targetEntity: self::class, cascade: ['persist', 'remove'])]
    private ?self $reponse = null;

    #[ORM\OneToOne(inversedBy: 'reponse', cascade: ['persist', 'remove'])]
    private ?Reclamation $idR = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRep(): ?\DateTimeInterface
    {
        return $this->dateRep;
    }

    public function setDateRep(?\DateTimeInterface $dateRep): static
    {
        $this->dateRep = $dateRep;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getReponse(): ?self
    {
        return $this->reponse;
    }

    public function setReponse(?self $reponse): static
    {
        // unset the owning side of the relation if necessary
        if ($reponse === null && $this->reponse !== null) {
            $this->reponse->setIdR(null);
        }

        // set the owning side of the relation if necessary
        if ($reponse !== null && $reponse->getIdR() !== $this) {
            $reponse->setIdR($this);
        }

        $this->reponse = $reponse;

        return $this;
    }

    public function getIdR(): ?Reclamation
    {
        return $this->idR;
    }

    public function setIdR(?Reclamation $idR): static
    {
        $this->idR = $idR;

        return $this;
    }
}
