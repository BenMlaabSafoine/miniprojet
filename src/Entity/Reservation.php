<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
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
    private $datedebut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $datefin;

    /**
     * @ORM\ManyToMany(targetEntity=Livre::class, mappedBy="reservations")
     */
    private $livres;

    /**
     * @ORM\ManyToMany(targetEntity=Emprunt::class, mappedBy="reservations")
     */
    private $emprunts;

    /**
     * @ORM\ManyToMany(targetEntity=Adherant::class, mappedBy="reservation")
     */
    private $adherants;

    public function __construct()
    {
        $this->livres = new ArrayCollection();
        $this->emprunts = new ArrayCollection();
        $this->adherants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatedebut(): ?string
    {
        return $this->datedebut;
    }

    public function setDatedebut(string $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?string
    {
        return $this->datefin;
    }

    public function setDatefin(string $datefin): self
    {
        $this->datefin = $datefin;

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
            $livre->addReservation($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livres->removeElement($livre)) {
            $livre->removeReservation($this);
        }

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
            $emprunt->addReservation($this);
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): self
    {
        if ($this->emprunts->removeElement($emprunt)) {
            $emprunt->removeReservation($this);
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
            $adherant->addReservation($this);
        }

        return $this;
    }

    public function removeAdherant(Adherant $adherant): self
    {
        if ($this->adherants->removeElement($adherant)) {
            $adherant->removeReservation($this);
        }

        return $this;
    }
}
