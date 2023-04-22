<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:'integer')]
    private $id = null;

    #[ORM\Column(type: 'string', length: 100, nullable: false, options: ['collation' => 'utf8mb4_general_ci'])]
    private $titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: false, options: ['collation' => 'utf8mb4_general_ci'])]
    private $description = null;

    #[ORM\Column(type: 'string', length: 100, nullable: false, options: ['collation' => 'utf8mb4_general_ci'])]
    private $editeur = null;

    #[ORM\Column(type: 'float', nullable: false)]
    private $prix = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true, options: ['collation' => 'utf8mb4_general_ci'])]
    private $image = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_de_sortie = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_de_mise_en_ligne = null;

    #[ORM\ManyToMany(targetEntity: Commande::class, mappedBy: 'Produit')]
    private Collection $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
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

    public function getEditeur(): ?string
    {
        return $this->editeur;
    }

    public function setEditeur(string $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }

    public function getDateDeSortie(): ?\DateTimeInterface
    {
        return $this->date_de_sortie;
    }

    public function setDateDeSortie(\DateTimeInterface $date_de_sortie): self
    {
        $this->date_de_sortie = $date_de_sortie;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

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

    public function getDateDeMiseEnLigne(): ?\DateTimeInterface
    {
        return $this->date_de_mise_en_ligne;
    }

    public function setDateDeMiseEnLigne(\DateTimeInterface $date_de_mise_en_ligne): self
    {
        $this->date_de_mise_en_ligne = $date_de_mise_en_ligne;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->addProduit($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            $commande->removeProduit($this);
        }

        return $this;
    }
}
