<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivreRepository::class)
 */
class Livre
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $auteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nbpages;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Bibliotheque::class, inversedBy="livres")
     * @ORM\JoinColumn(nullable=true)
     */
    private $bibliotheque;

    /**
     * @ORM\ManyToOne(targetEntity=Emprunt::class, inversedBy="livres")
     * @ORM\JoinColumn(nullable=true)
     */
    private $emprunt;

    /**
     * @ORM\ManyToOne(targetEntity=Adherant::class, inversedBy="livres")
     * @ORM\JoinColumn(nullable=true)
     */
    private $adherant;

    /**
     * @ORM\ManyToMany(targetEntity=Reservation::class, inversedBy="livres")
     */
    private $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
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

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getNbpages(): ?string
    {
        return $this->nbpages;
    }

    public function setNbpages(string $nbpages): self
    {
        $this->nbpages = $nbpages;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

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

    public function getEmprunt(): ?Emprunt
    {
        return $this->emprunt;
    }

    public function setEmprunt(?Emprunt $emprunt): self
    {
        $this->emprunt = $emprunt;

        return $this;
    }

    public function getAdherant(): ?Adherant
    {
        return $this->adherant;
    }

    public function setAdherant(?Adherant $adherant): self
    {
        $this->adherant = $adherant;

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
