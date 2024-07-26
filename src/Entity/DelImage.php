<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTimeImmutable;

/**
 * DelImage
 *
 * @ORM\Table(name="del_image")
 * @ORM\Entity
 */
class DelImage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_image", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idImage = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="ce_observation", type="integer", nullable=true)
     */
    private $ceObservation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ce_utilisateur", type="integer", nullable=true)
     */
    private $ceUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_utilisateur", type="string", length=155, nullable=true)
     */
    private $nomUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_utilisateur", type="text", nullable=false)
     */
    private $prenomUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="courriel_utilisateur", type="string", length=155, nullable=true)
     */
    private $courrielUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="hauteur", type="string", length=4, nullable=false)
     */
    private $hauteur;

    /**
     * @var string
     *
     * @ORM\Column(name="largeur, type="string", nullable=false)
     */
    private $largeur;

    /**
     * @var DateTimeImmutable|null
     *
     * @ORM\Column(name="date_prise_de_vue", type="datetime", nullable=true)
     */
    private $datePriseDeVue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mots_cles_texte", type="string", nullable=true)
     */
    private $motsClesTexte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire", type="string", nullable=true)
     */
    private $commentaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_original", type="string", nullable=true)
     */
    private $nomOriginal;

    /**
     * @var DateTimeImmutable|null
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=true)
     */
    private $dateCreation;

    /**
     * @var DateTimeImmutable|null
     *
     * @ORM\Column(name="date_modification", type="datetime", nullable=true)
     */
    private $dateModification;

    /**
     * @var DateTimeImmutable|null
     *
     * @ORM\Column(name="date_liaison", type="datetime", nullable=true)
     */
    private $dateLiaison;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(name="date_transmission", type="datetime", nullable=true)
     */
    private $dateTransmission;

   

    /**
     * Get the value of idImage
     */
    public function getIdImage(): int
    {
        return $this->idImage;
    }

    /**
     * Set the value of idImage
     */
    public function setIdImage(int $idImage): self
    {
        $this->idImage = $idImage;

        return $this;
    }

    /**
     * Get the value of ceObservation
     */
    public function getCeObservation(): ?int
    {
        return $this->ceObservation;
    }

    /**
     * Set the value of ceObservation
     */
    public function setCeObservation(?int $ceObservation): self
    {
        $this->ceObservation = $ceObservation;

        return $this;
    }

    /**
     * Get the value of ceUtilisateur
     */
    public function getCeUtilisateur(): ?int
    {
        return $this->ceUtilisateur;
    }

    /**
     * Set the value of ceUtilisateur
     */
    public function setCeUtilisateur(?int $ceUtilisateur): self
    {
        $this->ceUtilisateur = $ceUtilisateur;

        return $this;
    }

    /**
     * Get the value of nomUtilisateur
     */
    public function getNomUtilisateur(): ?string
    {
        return $this->nomUtilisateur;
    }

    /**
     * Set the value of nomUtilisateur
     */
    public function setNomUtilisateur(?string $nomUtilisateur): self
    {
        $this->nomUtilisateur = $nomUtilisateur;

        return $this;
    }

    /**
     * Get the value of prenomUtilisateur
     */
    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenomUtilisateur;
    }

    /**
     * Set the value of prenomUtilisateur
     */
    public function setPrenomUtilisateur(?string $prenomUtilisateur): self
    {
        $this->prenomUtilisateur = $prenomUtilisateur;

        return $this;
    }

    /**
     * Get the value of courrielUtilisateur
     */
    public function getCourrielUtilisateur(): ?string
    {
        return $this->courrielUtilisateur;
    }

    /**
     * Set the value of courrielUtilisateur
     */
    public function setCourrielUtilisateur(?string $courrielUtilisateur): self
    {
        $this->courrielUtilisateur = $courrielUtilisateur;

        return $this;
    }

    /**
     * Get the value of hauteur
     */
    public function getHauteur(): string
    {
        return $this->hauteur;
    }

    /**
     * Set the value of hauteur
     */
    public function setHauteur(string $hauteur): self
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    /**
     * Get the value of largeur
     */
    public function getLargeur(): string
    {
        return $this->largeur;
    }

    /**
     * Set the value of largeur
     */
    public function setLargeur(string $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    /**
     * Get the value of datePriseDeVue
     */
    public function getDatePriseDeVue(): ?DateTimeImmutable
    {
        return $this->datePriseDeVue;
    }

    /**
     * Set the value of datePriseDeVue
     */
    public function setDatePriseDeVue(?DateTimeImmutable $datePriseDeVue): self
    {
        $this->datePriseDeVue = $datePriseDeVue;

        return $this;
    }

    /**
     * Get the value of motsClesTexte
     */
    public function getMotsClesTexte(): ?string
    {
        return $this->motsClesTexte;
    }

    /**
     * Set the value of motsClesTexte
     */
    public function setMotsClesTexte(?string $motsClesTexte): self
    {
        $this->motsClesTexte = $motsClesTexte;

        return $this;
    }

    /**
     * Get the value of commentaire
     */
    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     */
    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get the value of nomOriginal
     */
    public function getNomOriginal(): ?string
    {
        return $this->nomOriginal;
    }

    /**
     * Set the value of nomOriginal
     */
    public function setNomOriginal(?string $nomOriginal): self
    {
        $this->nomOriginal = $nomOriginal;

        return $this;
    }

    /**
     * Get the value of dateCreation
     */
    public function getDateCreation(): ?DateTimeImmutable
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     */
    public function setDateCreation(?DateTimeImmutable $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get the value of dateModification
     */
    public function getDateModification(): ?DateTimeImmutable
    {
        return $this->dateModification;
    }

    /**
     * Set the value of dateModification
     */
    public function setDateModification(?DateTimeImmutable $dateModification): self
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get the value of dateLiaison
     */
    public function getDateLiaison(): ?DateTimeImmutable
    {
        return $this->dateLiaison;
    }

    /**
     * Set the value of dateLiaison
     */
    public function setDateLiaison(?DateTimeImmutable $dateLiaison): self
    {
        $this->dateLiaison = $dateLiaison;

        return $this;
    }

    /**
     * Get the value of dateTransmission
     */
    public function getDateTransmission(): ?\DateTimeImmutable
    {
        return $this->dateTransmission;
    }

    /**
     * Set the value of dateTransmission
     */
    public function setDateTransmission(?\DateTimeImmutable $dateTransmission): self
    {
        $this->dateTransmission = $dateTransmission;

        return $this;
    }
}
