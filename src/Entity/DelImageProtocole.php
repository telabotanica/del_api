<?php

namespace App\Entity;

use App\Repository\DelImageProtocoleRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Table(name: "del_image_protocole",options:["engine"=>"InnoDB"])]
#[ORM\Entity(repositoryClass: DelImageProtocoleRepository::class)]
class DelImageProtocole
{
    #[Groups(['image_protocole'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "id_protocole", type: "integer", nullable: false)]
    private ?int $id_protocole = null;

    #[Groups(['image_protocole'])]
    #[ORM\Column(name: "intitule", type: "string", length: 255, nullable: false)]
    private string $intitule;

    #[Groups(['image_protocole'])]
    #[ORM\Column(name: "descriptif", type: "text", length: 65535, nullable: true)]
    private ?string $descriptif = null;

    #[Groups(['image_protocole'])]
    #[ORM\Column(name: "tag", type: "string", length: 255, nullable: false)]
    private string $tag;

    #[Groups(['image_protocole'])]
    #[ORM\Column(name: "mots_cles", type: "string", length: 600, nullable: false)]
    private string $motsCles;

    #[Groups(['image_protocole'])]
    #[ORM\Column(name: "identifie", type: "boolean", nullable: false)]
    private bool $identifie;

    #[Groups(['image_vote'])]
    #[ORM\OneToMany(mappedBy: 'image_protocole', targetEntity: DelImageVote::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $image_votes;

    #[Groups(['image_stat'])]
    #[ORM\OneToMany(mappedBy: 'image_protocole', targetEntity: DelImageStat::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $image_stats;

    public function __construct()
    {
        $this->image_votes = new ArrayCollection();
        $this->image_stats = new ArrayCollection();
        
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): static
    {
        $this->intitule = $intitule;
        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): static
    {
        $this->descriptif = $descriptif;
        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): static
    {
        $this->tag = $tag;
        return $this;
    }

    public function getMotsCles(): ?string
    {
        return $this->motsCles;
    }

    public function setMotsCles(string $motsCles): static
    {
        $this->motsCles = $motsCles;
        return $this;
    }

    public function isIdentifie(): ?bool
    {
        return $this->identifie;
    }

    public function setIdentifie(bool $identifie): static
    {
        $this->identifie = $identifie;
        return $this;
    }

    /**
     * Get the value of image_votes
     */
    public function getImageVotes(): Collection
    {
        return $this->image_votes;
    }

    /**
     * Set the value of image_votes
     */
    public function addImageVotes(DelImageVote $image_vote): self
    {
        if (!$this->image_votes->contains($image_vote)) {
            $this->image_votes->add($image_vote);
            $image_vote->setImageProtocole($this);
        }

        return $this;
    }

    /**
     * Get the value of image_stats
     */
    public function getImageStats(): Collection
    {
        return $this->image_stats;
    }

    /**
     * Set the value of image_stats
     */
    public function addImageStats(DelImageStat $image_stat): self
    {
        if (!$this->image_stats->contains($image_stat)) {
            $this->image_stats->add($image_stat);
            $image_stat->setImageProtocole($this);
        }

        return $this;
    }

    /**
     * Get the value of id_protocole
     */
    public function getIdProtocole(): ?int
    {
        return $this->id_protocole;
    }

    /**
     * Set the value of id_protocole
     */
    public function setIdProtocole(?int $id_protocole): self
    {
        $this->id_protocole = $id_protocole;

        return $this;
    }
}
