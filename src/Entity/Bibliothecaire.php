<?php

namespace App\Entity;

use App\Repository\BibliothecaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BibliothecaireRepository::class)
 */
class Bibliothecaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numtel;

    /**
     * @ORM\ManyToOne(targetEntity=Bibliotheque::class, inversedBy="bibliothecaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bibliotheque;

    /**
     * @ORM\ManyToMany(targetEntity=Emprunt::class, inversedBy="bibliothecaires")
     */
    private $emprunts;

    /**
     * @ORM\ManyToMany(targetEntity=Adherant::class, inversedBy="bibliothecaires")
     */
    private $adherant;

    public function __construct()
    {
        $this->emprunts = new ArrayCollection();
        $this->adherant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumtel(): ?string
    {
        return $this->numtel;
    }

    public function setNumtel(string $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getBibliotheque(): ?Bibliotheque
    {
        return $this->bibliotheque;
    }

    public function setBibliotheque(?Bibliotheque $bibliotheque): self
    {
        $this->bibliotheque = $bibliotheque;

        return $this;
    }

    /**
     * @return Collection<int, Emprunt>
     */
    public function getEmprunts(): Collection
    {
        return $this->emprunts;
    }

    public function addEmprunt(Emprunt $emprunt): self
    {
        if (!$this->emprunts->contains($emprunt)) {
            $this->emprunts[] = $emprunt;
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): self
    {
        $this->emprunts->removeElement($emprunt);

        return $this;
    }

    /**
     * @return Collection<int, Adherant>
     */
    public function getAdherant(): Collection
    {
        return $this->adherant;
    }

    public function addAdherant(Adherant $adherant): self
    {
        if (!$this->adherant->contains($adherant)) {
            $this->adherant[] = $adherant;
        }

        return $this;
    }

    public function removeAdherant(Adherant $adherant): self
    {
        $this->adherant->removeElement($adherant);

        return $this;
    }
}
