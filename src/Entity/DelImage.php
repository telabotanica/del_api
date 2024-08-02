<?php

namespace App\Entity;

use App\Repository\DelImageRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use DateTime;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * DelImage
 */

#[ORM\Table(name: "del_image")]
#[ORM\Entity(repositoryClass: DelImageRepository::class)]
class DelImage
{
    #[Groups(['image'])]
    #[ORM\Column(name: "id_image", type: "integer", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private int $id_image = 0;

    
    #[ORM\ManyToOne(inversedBy: 'images')]
    #[ORM\JoinColumn(name:"ce_observation",nullable: false,referencedColumnName:"id_observation")]
    private ?DelObservation $observation = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    #[ORM\JoinColumn(name:"ce_utilisateur",nullable: false,referencedColumnName:"ID")]
    private ?DelUtilisateur $utilisateur = null;

    #[Groups(['image'])]
    #[ORM\Column(name: "ce_utilisateur", type: "integer", nullable: true)]
    private ?int $ceUtilisateur = null;

    #[Groups(['image'])]
    #[ORM\Column(name: "nom_utilisateur", type: "string", length: 155, nullable: true)]
    private ?string $nomUtilisateur = null;

    #[Groups(['image'])]
    #[ORM\Column(name: "prenom_utilisateur", type: "text", nullable: false)]
    private string $prenomUtilisateur;

    #[Groups(['image'])]
    #[ORM\Column(name: "courriel_utilisateur", type: "string", length: 155, nullable: true)]
    private ?string $courrielUtilisateur = null;

    #[Groups(['image'])]
    #[ORM\Column(name: "hauteur", type: "string", length: 4, nullable: false)]
    private string $hauteur;

    #[Groups(['image'])]
    #[ORM\Column(name: "largeur", type: "string", nullable: false)]
    private string $largeur;

    #[Groups(['image'])]
    #[ORM\Column(name: "date_prise_de_vue", type: "datetime", nullable: true)]
    private ?\DateTime $datePriseDeVue = null;

    #[Groups(['image'])]
    #[ORM\Column(name: "mots_cles_texte", type: "string", nullable: true)]
    private ?string $motsClesTexte = null;

    #[Groups(['image'])]
    #[ORM\Column(name: "commentaire", type: "string", nullable: true)]
    private ?string $commentaire = null;

    #[Groups(['image'])]
    #[ORM\Column(name: "nom_original", type: "string", nullable: true)]
    private ?string $nomOriginal = null;

    #[Groups(['image'])]
    #[ORM\Column(name: "date_creation", type: "datetime", nullable: true)]
    private ?\DateTime $dateCreation = null;

    #[Groups(['image'])]
    #[ORM\Column(name: "date_modification", type: "datetime", nullable: true)]
    private ?\DateTime $dateModification = null;

    #[Groups(['image'])]
    #[ORM\Column(name: "date_liaison", type: "datetime", nullable: true)]
    private ?\DateTime $dateLiaison = null;

    #[Groups(['image_tag'])]
    #[ORM\OneToMany(mappedBy: 'image', targetEntity: DelImageTag::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $image_tags;

    #[Groups(['image_vote'])]
    #[ORM\OneToMany(mappedBy: 'image', targetEntity: DelImageVote::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $image_votes;

    #[Groups(['image_stat'])]
    #[ORM\OneToMany(mappedBy: 'image', targetEntity: DelImageStat::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $image_stats;

    public function __construct()
    {
        $this->datePriseDeVue = new DateTime();
        $this->dateCreation = new DateTime;
        $this->dateModification = new DateTime();
        $this->dateLiaison = new DateTime();
        $this->image_tags = new ArrayCollection();
        $this->image_votes = new ArrayCollection();
        $this->image_stats = new ArrayCollection();
        
    }

    public function getCeUtilisateur(): ?int
    {
        return $this->ceUtilisateur;
    }

    public function setCeUtilisateur(?int $ceUtilisateur): self
    {
        $this->ceUtilisateur = $ceUtilisateur;
        return $this;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur(?string $nomUtilisateur): self
    {
        $this->nomUtilisateur = $nomUtilisateur;
        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenomUtilisateur;
    }

    public function setPrenomUtilisateur(string $prenomUtilisateur): self
    {
        $this->prenomUtilisateur = $prenomUtilisateur;
        return $this;
    }

    public function getCourrielUtilisateur(): ?string
    {
        return $this->courrielUtilisateur;
    }

    public function setCourrielUtilisateur(?string $courrielUtilisateur): self
    {
        $this->courrielUtilisateur = $courrielUtilisateur;
        return $this;
    }

    public function getHauteur(): string
    {
        return $this->hauteur;
    }

    public function setHauteur(string $hauteur): self
    {
        $this->hauteur = $hauteur;
        return $this;
    }

    public function getLargeur(): string
    {
        return $this->largeur;
    }

    public function setLargeur(string $largeur): self
    {
        $this->largeur = $largeur;
        return $this;
    }

    public function getDatePriseDeVue(): ?DateTime
    {
        return $this->datePriseDeVue;
    }

    public function setDatePriseDeVue(?DateTime $datePriseDeVue): self
    {
        $this->datePriseDeVue = $datePriseDeVue;
        return $this;
    }

    public function getMotsClesTexte(): ?string
    {
        return $this->motsClesTexte;
    }

    public function setMotsClesTexte(?string $motsClesTexte): self
    {
        $this->motsClesTexte = $motsClesTexte;
        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;
        return $this;
    }

    public function getNomOriginal(): ?string
    {
        return $this->nomOriginal;
    }

    public function setNomOriginal(?string $nomOriginal): self
    {
        $this->nomOriginal = $nomOriginal;
        return $this;
    }

    public function getDateCreation(): ?DateTime
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?DateTime $dateCreation): self
    {
        $this->dateCreation = $dateCreation;
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

    public function getDateLiaison(): ?DateTime
    {
        return $this->dateLiaison;
    }

    public function setDateLiaison(?DateTime $dateLiaison): self
    {
        $this->dateLiaison = $dateLiaison;
        return $this;
    }

    /**
     * Get the value of observation
     */
    public function getObservation(): DelObservation
    {
        return $this->observation;
    }

    /**
     * Set the value of observation
     */
    public function setObservation(DelObservation $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get the value of image_tags
     */
    public function getImageTags(): Collection
    {
        return $this->image_tags;
    }

    /**
     * Set the value of image_tags
     */
    public function addImageTags(DelImageTag $image_tag): self
    {
        if (!$this->image_tags->contains($image_tag)) {
            $this->image_tags->add($image_tag);
            $image_tag->setImage($this);
        }

        return $this;
    }

    /**
     * Get the value of utilisateur
     */
    public function getUtilisateur(): ?DelUtilisateur
    {
        return $this->utilisateur;
    }

    /**
     * Set the value of utilisateur
     */
    public function setUtilisateur(?DelUtilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

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
            $image_vote->setImage($this);
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
            $image_stat->setImage($this);
        }

        return $this;
    }
    
    /**
     * Get the value of id_image
     */
    public function getIdImage(): int
    {
        return $this->id_image;
    }

    /**
     * Set the value of id_image
     */
    public function setIdImage(int $id_image): self
    {
        $this->id_image = $id_image;

        return $this;
    }
}
