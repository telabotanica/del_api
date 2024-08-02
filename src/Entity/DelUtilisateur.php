<?php

namespace App\Entity;

use App\Repository\DelUtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * DelUtilisateur
 */
#[ORM\Table(name: "del_utilisateurs")]
#[ORM\Entity(repositoryClass: DelUtilisateurRepository::class)]
class DelUtilisateur
{
    #[Groups(['utilisateur'])]
    #[ORM\Column(name: "ID", type: "integer", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private int $ID = 0;

    #[Groups(['utilisateur'])]
    #[ORM\Column(name: "user_email", type: "string", length: 255, nullable: true)]
    private ?string $user_email = null;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: DelImage::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $images;

    #[Groups(['utilisateur_infos'])]
    #[ORM\OneToOne(mappedBy: 'utilisateurUI', targetEntity: DelUtilisateurInfos::class)]
    private DelUtilisateurInfos $utilisateur_infos;
    
    #[Groups(['observation_util'])]
    #[ORM\OneToMany(mappedBy: 'utilisateurO', targetEntity: DelObservation::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $observations;

    #[Groups(['commentaire_util'])]
    #[ORM\OneToMany(mappedBy: 'utilisateurC', targetEntity: DelCommentaire::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $commentaires;

    #[Groups(['image_vote_util'])]
    #[ORM\OneToMany(mappedBy: 'utilisateurIV', targetEntity: DelImageVote::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $image_votes;

    #[Groups(['image_tag_util'])]
    #[ORM\OneToMany(mappedBy: 'utilisateurIT', targetEntity: DelImageTag::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $image_tags;

    #[Groups(['commentaire_vote_util'])]
    #[ORM\OneToMany(mappedBy: 'utilisateurCV', targetEntity: DelCommentaireVote::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $commentaire_votes;

    public function __construct()
    {
        
        $this->images = new ArrayCollection();
        $this->observations = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->image_votes = new ArrayCollection();
        $this->image_tags = new ArrayCollection();
        $this->commentaire_votes = new ArrayCollection();
        
    }

    /**
     * Get the value of user_email
     */
    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    /**
     * Set the value of user_email
     */
    public function setUserEmail(?string $user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }

    /**
     * Get the value of images
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    /**
     * Set the value of images
     */
    public function addImages(DelImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setUtilisateur($this);
        }

        return $this;
    }

    /**
     * Get the value of utilisateur_infos
     */
    public function getUtilisateurInfos(): DelUtilisateurInfos
    {
        return $this->utilisateur_infos;
    }

    /**
     * Set the value of utilisateur_infos
     */
    public function setUtilisateurInfos(DelUtilisateurInfos $utilisateur_infos): self
    {
        $this->utilisateur_infos = $utilisateur_infos;

        return $this;
    }

    /**
     * Get the value of observations
     */
    public function getObservations(): Collection
    {
        return $this->observations;
    }

    /**
     * Set the value of observations
     */
    public function addObservations(DelObservation $observation): self
    {
        if (!$this->observations->contains($observation)) {
            $this->observations->add($observation);
            $observation->setUtilisateurO($this);
        }

        return $this;
    }

    /**
     * Get the value of commentaires
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    /**
     * Set the value of commentaires
     */
    public function addCommentaires(DelCommentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setUtilisateurC($this);
        }
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
            $image_vote->setUtilisateurIV($this);
        }

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
            $image_tag->setUtilisateurIT($this);
        }

        return $this;
    }

    /**
     * Get the value of commentaire_votes
     */
    public function getCommentaireVotes(): Collection
    {
        return $this->commentaire_votes;
    }

    /**
     * Set the value of commentaire_votes
     */
    public function addCommentaireVotes(DelCommentaireVote $commentaire_vote): self
    {
        if (!$this->commentaire_votes->contains($commentaire_vote)) {
            $this->commentaire_votes->add($commentaire_vote);
            $commentaire_vote->setUtilisateurCV($this);
        }
        return $this;
    }

    /**
     * Get the value of ID
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * Set the value of ID
     */
    public function setID(int $ID): self
    {
        $this->ID = $ID;

        return $this;
    }
}
