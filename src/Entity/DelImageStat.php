<?php

namespace App\Entity;

use App\Repository\DelImageStatRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Table(name: "del_image_stat",options:["engine"=>"InnoDB"])]
#[ORM\Index(name: "ce_image", columns: ["ce_image"])]
#[ORM\Index(name: "ce_protocole", columns: ["ce_protocole", "moyenne"])]
#[ORM\Index(name: "nb_votes", columns: ["nb_votes"])]
#[ORM\Index(name: "nb_tags", columns: ["nb_tags"])]
#[ORM\Index(name: "moyenne", columns: ["moyenne"])]
#[ORM\Entity(repositoryClass: DelImageStatRepository::class)]

class DelImageStat
{
    #[Groups(['image_stat'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "id", type: "integer", nullable: false)]
    private int $id;

    #[ORM\Column(name:"ce_image",type: "integer")]
    private int $ce_image;

    #[ORM\ManyToOne(inversedBy: 'image_stats',fetch:"EAGER")]
    #[ORM\JoinColumn(nullable: false,name:"ce_image",referencedColumnName:"id_image")]
    private ?DelImage $image = null;

    #[ORM\ManyToOne(inversedBy: 'image_stats',fetch:"EAGER")]
    #[ORM\JoinColumn(nullable: false,name: "ce_protocole",referencedColumnName:"id_protocole")]
    private ?DelImageProtocole $image_protocole = null;

    #[Groups(['image_stat'])]
    #[ORM\Column(name: "moyenne", type: "float", precision: 10, scale: 0, nullable: false, options: ["comment" => "moyenne des votes pour une image et un protocole donné"])]
    private float $moyenne = 0;

    #[Groups(['image_stat'])]
    #[ORM\Column(name: "nb_votes", type: "smallint", nullable: false, options: ["unsigned" => true, "comment" => "nombre de votes pour une image et un protocole donné"])]
    private int $nbVotes = 0;

    #[Groups(['image_stat'])]
    #[ORM\Column(name: "nb_points", type: "integer", nullable: false)]
    private int $nbPoints = 0;

    #[Groups(['image_stat'])]
    #[ORM\Column(name: "nb_tags", type: "boolean", nullable: false, options: ["comment" => "nombre de tags pictoflora pour une image donnée"])]
    private bool $nbTags = false;

    public function __construct(){
        
    }

    public function getMoyenne(): ?float
    {
        return $this->moyenne;
    }

    public function setMoyenne(float $moyenne): static
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    public function getNbVotes(): ?int
    {
        return $this->nbVotes;
    }

    public function setNbVotes(int $nbVotes): static
    {
        $this->nbVotes = $nbVotes;

        return $this;
    }

    public function getNbPoints(): ?int
    {
        return $this->nbPoints;
    }

    public function setNbPoints(int $nbPoints): static
    {
        $this->nbPoints = $nbPoints;

        return $this;
    }

    public function isNbTags(): ?bool
    {
        return $this->nbTags;
    }

    public function setNbTags(bool $nbTags): static
    {
        $this->nbTags = $nbTags;

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
     * Get the value of ce_image
     */
    public function getCeImage(): int
    {
        return $this->ce_image;
    }

    /**
     * Set the value of ce_image
     */
    public function setCeImage(int $ce_image): self
    {
        $this->ce_image = $ce_image;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
