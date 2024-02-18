<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column]
    private ?int $tel = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Troc::class)]
    private Collection $trocs;


    public function __construct()
    {
        $this->trocs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return Collection<int, Troc>
     */
    public function getTrocs(): Collection
    {
        return $this->trocs;
    }

    public function addTroc(Troc $troc): static
    {
        if (!$this->trocs->contains($troc)) {
            $this->trocs->add($troc);
            $troc->setUser($this);
        }

        return $this;
    }

    public function removeTroc(Troc $troc): static
    {
        if ($this->trocs->removeElement($troc)) {
            // set the owning side to null (unless already changed)
            if ($troc->getUser() === $this) {
                $troc->setUser(null);
            }
        }

        return $this;
    }
}
