<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatRepository::class)]
class Candidat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $candidat_id;

    #[ORM\OneToMany(mappedBy: 'candidat', targetEntity: User::class)]
    private $user_id;

    #[ORM\OneToMany(mappedBy: 'candidat', targetEntity: OffreDEmploi::class)]
    private $offre_emploi_id;

    #[ORM\Column(type: 'date')]
    private $date;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
        $this->offre_emploi_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCandidatId(): ?int
    {
        return $this->candidat_id;
    }

    public function setCandidatId(int $candidat_id): self
    {
        $this->candidat_id = $candidat_id;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(User $userId): self
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id[] = $userId;
            $userId->setCandidat($this);
        }

        return $this;
    }

    public function removeUserId(User $userId): self
    {
        if ($this->user_id->removeElement($userId)) {
            // set the owning side to null (unless already changed)
            if ($userId->getCandidat() === $this) {
                $userId->setCandidat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, OffreDEmploi>
     */
    public function getOffreEmploiId(): Collection
    {
        return $this->offre_emploi_id;
    }

    public function addOffreEmploiId(OffreDEmploi $offreEmploiId): self
    {
        if (!$this->offre_emploi_id->contains($offreEmploiId)) {
            $this->offre_emploi_id[] = $offreEmploiId;
            $offreEmploiId->setCandidat($this);
        }

        return $this;
    }

    public function removeOffreEmploiId(OffreDEmploi $offreEmploiId): self
    {
        if ($this->offre_emploi_id->removeElement($offreEmploiId)) {
            // set the owning side to null (unless already changed)
            if ($offreEmploiId->getCandidat() === $this) {
                $offreEmploiId->setCandidat(null);
            }
        }

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
