<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[Assert\NotBlank (message: "ne doit pas être  vide ")]
    #[Assert\Length(min: 5,max: 40,minMessage: 'Le nom doit avoir au moins 5 caractères',maxMessage: 'Le nom doit avoir au max 40 caractères')]
    #[ORM\Column(length: 255)]
    #[Assert\Regex(pattern:"/^[a-zA-Z0-9\s]+$/",message:"The name must contain only letters and numbers.")]
    private ?string $titre = null;

    #[ORM\Column]
    #[Assert\NotBlank (message: "ne doit pas être  vide ")]
    #[Assert\Positive(message:"The remuneration value must be positive")]
    #[Assert\Type(type:"numeric", message:"The remuneration must be a numeric value")]
    private ?float $prix = null;


    #[ORM\Column(length: 2048)]
    #[Assert\NotBlank (message: "ne doit pas être  vide ")]
    /**
     * @Assert\Length(min=20, minMessage="Description must be at least 20 characters long.")
     */
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Category $category = null;

    #[ORM\Column(type:"string", length: 255)]
    private ?string $img = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): static
    {
        $this->img = $img;

        return $this;
    }

}
