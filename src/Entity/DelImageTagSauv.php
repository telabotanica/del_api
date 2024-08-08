<?php

namespace App\Entity;

use App\Repository\DelImageTagRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Table(name: "del_image_tag_sauv",options:["engine"=>"InnoDB"])]
#[ORM\Index(name: "ce_utilisateur", columns: ["ce_utilisateur"])]
#[ORM\Index(name: "tag", columns: ["tag"])]
#[ORM\Index(name: "tag_normalise", columns: ["tag_normalise"])]
#[ORM\Index(name: "ce_image", columns: ["ce_image"])]
#[ORM\Entity(repositoryClass: DelImageTagRepository::class)]

class DelImageTagSauv
{
    #[Groups(['image_tag_sauv'])]
    #[ORM\Column(name: "id_tag", type: "bigint", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private ?int $id_tag = null;

    #[ORM\ManyToOne(inversedBy: 'image_tags',fetch:"EAGER")]
    #[ORM\JoinColumn(nullable: false,name: "ce_image",referencedColumnName:"id_image")]
    private ?DelImage $image = null;

    #[Groups(['image_tag'])]
    #[ORM\Column(name: "ce_utilisateur", type: "string", length: 255, nullable: true)]
    private string $ce_utilisateur;

    #[Groups(['image_tag_sauv'])]
    #[ORM\Column(name: "tag", type: "string", length: 255, nullable: false)]
    private string $tag;

    #[Groups(['image_tag_sauv'])]
    #[ORM\Column(name: "tag_normalise", type: "string", length: 255, nullable: false)]
    private string $tagNormalise;

    #[Groups(['image_tag_sauv'])]
    #[ORM\Column(name: "date", type: "datetime", nullable: true, options: ["default" => "CURRENT_TIMESTAMP", "comment" => "Date de création du tag."])]
    private DateTime $date;

    #[Groups(['image_tag_sauv'])]
    #[ORM\Column(name: "actif", type: "integer", nullable: false)]
    private int $actif;

    #[Groups(['image_tag_sauv'])]
    #[ORM\Column(name: "date_modification", type: "datetime", nullable: true)]
    private ?DateTime $dateModification = null;

    public function __construct(){
        
        $this->date= new DateTime();
        $this->dateModification = new DateTime();
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function setTag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    public function getTagNormalise(): string
    {
        return $this->tagNormalise;
    }

    public function setTagNormalise(string $tagNormalise): self
    {
        $this->tagNormalise = $tagNormalise;

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

    public function getActif(): int
    {
        return $this->actif;
    }

    public function setActif(int $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getDateModification(): ?DateTime
    {
        return $this->dateModification;
    }

    public function setDateModification(?DateTime $dateModification): self
    {
        $this->dateModification = $dateModification;

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
     * Get the value of id_tag
     */
    public function getIdTag(): ?int
    {
        return $this->id_tag;
    }

    /**
     * Set the value of id_tag
     */
    public function setIdTag(?int $id_tag): self
    {
        $this->id_tag = $id_tag;

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
