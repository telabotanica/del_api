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
#[ORM\Table(name: "del_utilisateurs",options:["engine"=>"InnoDB"])]
#[ORM\Entity(repositoryClass: DelUtilisateurRepository::class,readOnly:true)]
class DelUtilisateur
{
    #[Groups(['utilisateur'])]
    #[ORM\Column(name: "ID", type: "integer", length:11,nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private int $ID = 0;

    #[Groups(['utilisateur'])]
    #[ORM\Column(name: "user_email", type: "string", length: 255, nullable: true)]
    private ?string $user_email = null;

    #[Groups(['images_util'])]
    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: DelImage::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $images;

    #[Groups(['utilisateur_infos'])]
    #[ORM\OneToOne(mappedBy: 'utilisateurUI', targetEntity: DelUtilisateurInfos::class)]
    private DelUtilisateurInfos $utilisateur_infos;
    
    #[Groups(['observation_util'])]
    #[ORM\OneToMany(mappedBy: 'utilisateurO', targetEntity: DelObservation::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $observations;


    public function __construct()
    {
        
        $this->images = new ArrayCollection();
        $this->observations = new ArrayCollection();
       

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
