<?php

namespace App\Entity;

use App\Repository\DelCommentaireVoteRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Table(name: "del_commentaire_vote",options:["engine"=>"InnoDB"])]
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

    #[ORM\ManyToOne(inversedBy: 'commentaire_votes',fetch:"EAGER")]
    #[ORM\JoinColumn(nullable: false,name: "ce_proposition",referencedColumnName:"id_commentaire")]
    private ?DelCommentaire $commentaire = null;

    #[Groups(['commentaire_vote'])]
    #[ORM\Column(name: "ce_utilisateur", type: "string", length: 255, nullable: false)]
    private string $ce_utilisateur="";

    #[Groups(['commentaire_vote'])]
    #[ORM\Column(name: "valeur", type: "boolean", nullable: false)]
    private bool $valeur;

    #[Groups(['commentaire_vote'])]
    #[ORM\Column(name: "date", type: "datetime", nullable: true,options:["default" => "CURRENT_TIMESTAMP", "comment" => "Date de création de la proposition."])]
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

    /**
     * Get the value of ce_utilisateur
     */
    public function getCeUtilisateur(): string
    {
        return $this->ce_utilisateur;
    }

    /**
     * Set the value of ce_utilisateur
     */
    public function setCeUtilisateur(string $ce_utilisateur): self
    {
        $this->ce_utilisateur = $ce_utilisateur;

        return $this;
    }
}
