<?php

namespace App\Entity;

use App\Repository\OffreDEmploiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreDEmploiRepository::class)]
class OffreDEmploi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $offre_emploi_id;

    #[ORM\Column(type: 'string', length: 20)]
    private $titre;

    #[ORM\Column(type: 'string', length: 10)]
    private $lieu;

    #[ORM\Column(type: 'string', length: 200)]
    private $date_de_publication;

    #[ORM\Column(type: 'integer')]
    private $salaire;

    #[ORM\Column(type: 'string', length: 250)]
    private $description;

    #[ORM\ManyToOne(targetEntity: Candidat::class, inversedBy: 'offre_emploi_id')]
    #[ORM\JoinColumn(nullable: false)]
    private $candidat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffreEmploiId(): ?int
    {
        return $this->offre_emploi_id;
    }

    public function setOffreEmploiId(int $offre_emploi_id): self
    {
        $this->offre_emploi_id = $offre_emploi_id;

        return $this;
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

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDateDePublication(): ?string
    {
        return $this->date_de_publication;
    }

    public function setDateDePublication(string $date_de_publication): self
    {
        $this->date_de_publication = $date_de_publication;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->salaire;
    }

    public function setSalaire(int $salaire): self
    {
        $this->salaire = $salaire;

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

    public function getCandidat(): ?Candidat
    {
        return $this->candidat;
    }

    public function setCandidat(?Candidat $candidat): self
    {
        $this->candidat = $candidat;

        return $this;
    }
}
