<?php

namespace App\Entity;

use App\Repository\BibliothequeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BibliothequeRepository::class)
 */
class Bibliotheque
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
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Bibliothecaire::class, mappedBy="bibliotheque")
     */
    private $bibliothecaires;

    /**
     * @ORM\OneToMany(targetEntity=Livre::class, mappedBy="bibliotheque")
     */
    private $livres;

    /**
     * @ORM\ManyToMany(targetEntity=Adherant::class, inversedBy="bibliotheques")
     */
    private $adherants;

    /**
     * @ORM\ManyToMany(targetEntity=Emprunt::class, inversedBy="bibliotheques")
     */
    private $emprunts;

    public function __construct()
    {
        $this->bibliothecaires = new ArrayCollection();
        $this->livres = new ArrayCollection();
        $this->adherants = new ArrayCollection();
        $this->emprunts = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Bibliothecaire>
     */
    public function getBibliothecaires(): Collection
    {
        return $this->bibliothecaires;
    }

    public function addBibliothecaire(Bibliothecaire $bibliothecaire): self
    {
        if (!$this->bibliothecaires->contains($bibliothecaire)) {
            $this->bibliothecaires[] = $bibliothecaire;
            $bibliothecaire->setBibliotheque($this);
        }

        return $this;
    }

    public function removeBibliothecaire(Bibliothecaire $bibliothecaire): self
    {
        if ($this->bibliothecaires->removeElement($bibliothecaire)) {
            // set the owning side to null (unless already changed)
            if ($bibliothecaire->getBibliotheque() === $this) {
                $bibliothecaire->setBibliotheque(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Livre>
     */
    public function getLivres(): Collection
    {
        return $this->livres;
    }

    public function addLivre(Livre $livre): self
    {
        if (!$this->livres->contains($livre)) {
            $this->livres[] = $livre;
            $livre->setBibliotheque($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livres->removeElement($livre)) {
            // set the owning side to null (unless already changed)
            if ($livre->getBibliotheque() === $this) {
                $livre->setBibliotheque(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Adherant>
     */
    public function getAdherants(): Collection
    {
        return $this->adherants;
    }

    public function addAdherant(Adherant $adherant): self
    {
        if (!$this->adherants->contains($adherant)) {
            $this->adherants[] = $adherant;
        }

        return $this;
    }

    public function removeAdherant(Adherant $adherant): self
    {
        $this->adherants->removeElement($adherant);

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
}
