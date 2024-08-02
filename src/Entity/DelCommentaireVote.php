<?php

namespace App\Entity;

use App\Repository\DelCommentaireVoteRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Table(name: "del_commentaire_vote")]
#[ORM\Index(name: "ce_proposition", columns: ["ce_proposition"])]
#[ORM\Index(name: "ce_utilisateur", columns: ["ce_utilisateur"])]
#[ORM\Entity(repositoryClass: DelCommentaireVoteRepository::class)]
class DelCommentaireVote
{
    #[Groups(['commentaire_vote'])]
    #[ORM\Id]
    #[ORM\Column(name: "id_vote", type: "bigint", nullable: false)]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private ?int $id_vote = null;

    #[ORM\ManyToOne(inversedBy: 'commentaire_votes')]
    #[ORM\JoinColumn(nullable: false,name: "ce_proposition",referencedColumnName:"id_commentaire")]
    private ?DelCommentaire $commentaire = null;

    #[ORM\ManyToOne(inversedBy: 'commentaire_votes')]
    #[ORM\JoinColumn(nullable: false,name: "ce_utilisateur",referencedColumnName:"ID")]
    private ?DelUtilisateur $utilisateurCV = null;

    #[Groups(['commentaire_vote'])]
    #[ORM\Column(name: "valeur", type: "boolean", nullable: false)]
    private bool $valeur;

    #[Groups(['commentaire_vote'])]
    #[ORM\Column(name: "date", type: "datetime", nullable: false)]
    private ?\DateTime $date;

    public function __construct()
    {
        $this->date = new DateTime();
    }
    
    public function getValeur(): bool
    {
        return $this->valeur;
    }

    public function setValeur(bool $valeur): self
    {
        $this->valeur = $valeur;
        return $this;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get the value of commentaire
     */
    public function getCommentaire(): ?DelCommentaire
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     */
    public function setCommentaire(?DelCommentaire $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get the value of utilisateurCV
     */
    public function getUtilisateurCV(): ?DelUtilisateur
    {
        return $this->utilisateurCV;
    }

    /**
     * Set the value of utilisateurCV
     */
    public function setUtilisateurCV(?DelUtilisateur $utilisateurCV): self
    {
        $this->utilisateurCV = $utilisateurCV;

        return $this;
    }

    /**
     * Get the value of id_vote
     */
    public function getIdVote(): ?int
    {
        return $this->id_vote;
    }

    /**
     * Set the value of id_vote
     */
    public function setIdVote(?int $id_vote): self
    {
        $this->id_vote = $id_vote;

        return $this;
    }
}
