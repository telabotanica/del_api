<?php

namespace App\Entity;

use App\Repository\DelImageVoteRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Table(name: "del_image_vote",options:["engine"=>"InnoDB"])]
#[ORM\Index(name: "ce_image", columns: ["ce_image"])]
#[ORM\Index(name: "ce_protocole", columns: ["ce_protocole"])]
#[ORM\Index(name: "ce_utilisateur", columns: ["ce_utilisateur"])]
#[ORM\Entity(repositoryClass: DelImageVoteRepository::class)]
class DelImageVote
{
    #[Groups(['image_vote'])]
    #[ORM\Column(name: "id_vote", type: "bigint", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private ?int $id_vote = null;

    #[ORM\ManyToOne(inversedBy: 'image_votes',fetch:"EAGER")]
    #[ORM\JoinColumn(nullable: false,name: "ce_image",referencedColumnName:"id_image")]
    private ?DelImage $image = null;

    #[ORM\ManyToOne(inversedBy: 'image_votes',fetch:"EAGER")]
    #[ORM\JoinColumn(nullable: false,name: "ce_protocole",referencedColumnName:"id_protocole")]
    private ?DelImageProtocole $image_protocole = null;

    #[Groups(['image_tag'])]
    #[ORM\Column(name: "ce_utilisateur", type: "string", length: 255, nullable: true)]
    private string $ce_utilisateur;

    #[Groups(['image_vote'])]
    #[ORM\Column(name: "valeur", type: "boolean", nullable: false)]
    private bool $valeur;

    #[Groups(['image_vote'])]
    #[ORM\Column(name: "date", type: "datetime", nullable: true,options:["default" => "CURRENT_TIMESTAMP", "comment" => "Date de création du vote."])]
    private DateTime $date;

    public function __construct()
    {
        $this->date = new DateTime();
        
    }

    public function isValeur(): bool
    {
        return $this->valeur;
    }

    public function setValeur(bool $valeur): self
    {
        $this->valeur = $valeur;
        return $this;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage(): ?DelImage
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage(?DelImage $image): self
    {
        $this->image = $image;

        return $this;
    }


    /**
     * Get the value of image_protocole
     */
    public function getImageProtocole(): ?DelImageProtocole
    {
        return $this->image_protocole;
    }

    /**
     * Set the value of image_protocole
     */
    public function setImageProtocole(?DelImageProtocole $image_protocole): self
    {
        $this->image_protocole = $image_protocole;

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
