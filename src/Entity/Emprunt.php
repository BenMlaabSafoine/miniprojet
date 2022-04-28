<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpruntRepository::class)
 */
class Emprunt
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
    private $numtel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity=Livre::class, mappedBy="emprunt")
     */
    private $livres;

    /**
     * @ORM\ManyToMany(targetEntity=Bibliotheque::class, mappedBy="emprunts")
     */
    private $bibliotheques;

    /**
     * @ORM\ManyToMany(targetEntity=Bibliothecaire::class, mappedBy="emprunts")
     */
    private $bibliothecaires;

    /**
     * @ORM\ManyToMany(targetEntity=Reservation::class, inversedBy="emprunts")
     */
    private $reservations;

    public function __construct()
    {
        $this->livres = new ArrayCollection();
        $this->bibliotheques = new ArrayCollection();
        $this->bibliothecaires = new ArrayCollection();
        $this->reservations = new ArrayCollection();
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

    public function getNumtel(): ?string
    {
        return $this->numtel;
    }

    public function setNumtel(string $numtel): self
    {
        $this->numtel = $numtel;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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
            $livre->setEmprunt($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livres->removeElement($livre)) {
            // set the owning side to null (unless already changed)
            if ($livre->getEmprunt() === $this) {
                $livre->setEmprunt(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Bibliotheque>
     */
    public function getBibliotheques(): Collection
    {
        return $this->bibliotheques;
    }

    public function addBibliotheque(Bibliotheque $bibliotheque): self
    {
        if (!$this->bibliotheques->contains($bibliotheque)) {
            $this->bibliotheques[] = $bibliotheque;
            $bibliotheque->addEmprunt($this);
        }

        return $this;
    }

    public function removeBibliotheque(Bibliotheque $bibliotheque): self
    {
        if ($this->bibliotheques->removeElement($bibliotheque)) {
            $bibliotheque->removeEmprunt($this);
        }

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
            $bibliothecaire->addEmprunt($this);
        }

        return $this;
    }

    public function removeBibliothecaire(Bibliothecaire $bibliothecaire): self
    {
        if ($this->bibliothecaires->removeElement($bibliothecaire)) {
            $bibliothecaire->removeEmprunt($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        $this->reservations->removeElement($reservation);

        return $this;
    }
}
