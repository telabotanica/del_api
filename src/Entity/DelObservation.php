<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DelObservation
 *
 * @ORM\Table(name="del_observation", indexes={@ORM\Index(name="courriel_utilisateur", columns={"courriel_utilisateur"}), @ORM\Index(name="nom_sel", columns={"nom_sel"}), @ORM\Index(name="nom_referentiel", columns={"nom_referentiel"}), @ORM\Index(name="certitude", columns={"certitude"}), @ORM\Index(name="nom_sel_nn", columns={"nom_sel_nn"}), @ORM\Index(name="nom_ret_nn", columns={"nom_ret_nn"}), @ORM\Index(name="source", columns={"input_source"}), @ORM\Index(name="ce_utilisateur", columns={"ce_utilisateur"})})
 * @ORM\Entity
 */
class DelObservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_observation", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idObservation = '0';

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
     * @var string|null
     *
     * @ORM\Column(name="prenom_utilisateur", type="string", length=5, nullable=true)
     */
    private $prenomUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="courriel_utilisateur", type="string", length=155, nullable=true)
     */
    private $courrielUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_sel", type="string", length=255, nullable=true)
     */
    private $nomSel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nom_sel_nn", type="integer", nullable=true, options={"comment"="Numéro du nom sélectionné."})
     */
    private $nomSelNn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_ret", type="string", length=255, nullable=true)
     */
    private $nomRet;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nom_ret_nn", type="integer", nullable=true, options={"comment"="Numéro du nom retenu."})
     */
    private $nomRetNn;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nt", type="integer", nullable=true, options={"comment"="Numéro du nom retenu."})
     */
    private $nt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="famille", type="string", length=100, nullable=true)
     */
    private $famille;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ce_zone_geo", type="string", length=5, nullable=true)
     */
    private $ceZoneGeo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="zone_geo", type="string", length=255, nullable=true)
     */
    private $zoneGeo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieudit", type="string", length=255, nullable=true)
     */
    private $lieudit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="station", type="string", length=255, nullable=true)
     */
    private $station;

    /**
     * @var string|null
     *
     * @ORM\Column(name="milieu", type="string", length=255, nullable=true)
     */
    private $milieu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_referentiel", type="string", length=25, nullable=true)
     */
    private $nomReferentiel;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(name="date_observation", type="datetime", nullable=true)
     */
    private $dateObservation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mots_cles_texte", type="text", length=0, nullable=true, options={"comment"="Champ calculé contenant la liste des mots clés utilisateurs séparé par des virgules."})
     */
    private $motsClesTexte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire", type="text", length=65535, nullable=true)
     */
    private $commentaire;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=true)
     */
    private $dateCreation;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(name="date_modification", type="datetime", nullable=true)
     */
    private $dateModification;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(name="date_transmission", type="datetime", nullable=true)
     */
    private $dateTransmission;

    /**
     * @var string|null
     *
     * @ORM\Column(name="certitude", type="string", length=25, nullable=true)
     */
    private $certitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pays", type="string", length=150, nullable=true, options={"comment"="Code de pays suivant le standard ISO 3166-2"})
     */
    private $pays;

    /**
     * @var string|null
     *
     * @ORM\Column(name="input_source", type="string", length=15, nullable=true)
     */
    private $inputSource;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="donnees_standard", type="boolean", nullable=true)
     */
    private $donneesStandard;

    

    /**
     * Get the value of idObservation
     */
    public function getIdObservation(): int
    {
        return $this->idObservation;
    }

    /**
     * Set the value of idObservation
     */
    public function setIdObservation(int $idObservation): self
    {
        $this->idObservation = $idObservation;

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
     * Get the value of nomSel
     */
    public function getNomSel(): ?string
    {
        return $this->nomSel;
    }

    /**
     * Set the value of nomSel
     */
    public function setNomSel(?string $nomSel): self
    {
        $this->nomSel = $nomSel;

        return $this;
    }

    /**
     * Get the value of nomSelNn
     */
    public function getNomSelNn(): ?int
    {
        return $this->nomSelNn;
    }

    /**
     * Set the value of nomSelNn
     */
    public function setNomSelNn(?int $nomSelNn): self
    {
        $this->nomSelNn = $nomSelNn;

        return $this;
    }

    /**
     * Get the value of nomRet
     */
    public function getNomRet(): ?string
    {
        return $this->nomRet;
    }

    /**
     * Set the value of nomRet
     */
    public function setNomRet(?string $nomRet): self
    {
        $this->nomRet = $nomRet;

        return $this;
    }

    /**
     * Get the value of nomRetNn
     */
    public function getNomRetNn(): ?int
    {
        return $this->nomRetNn;
    }

    /**
     * Set the value of nomRetNn
     */
    public function setNomRetNn(?int $nomRetNn): self
    {
        $this->nomRetNn = $nomRetNn;

        return $this;
    }

    /**
     * Get the value of nt
     */
    public function getNt(): ?int
    {
        return $this->nt;
    }

    /**
     * Set the value of nt
     */
    public function setNt(?int $nt): self
    {
        $this->nt = $nt;

        return $this;
    }

    /**
     * Get the value of famille
     */
    public function getFamille(): ?string
    {
        return $this->famille;
    }

    /**
     * Set the value of famille
     */
    public function setFamille(?string $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get the value of ceZoneGeo
     */
    public function getCeZoneGeo(): ?string
    {
        return $this->ceZoneGeo;
    }

    /**
     * Set the value of ceZoneGeo
     */
    public function setCeZoneGeo(?string $ceZoneGeo): self
    {
        $this->ceZoneGeo = $ceZoneGeo;

        return $this;
    }

    /**
     * Get the value of zoneGeo
     */
    public function getZoneGeo(): ?string
    {
        return $this->zoneGeo;
    }

    /**
     * Set the value of zoneGeo
     */
    public function setZoneGeo(?string $zoneGeo): self
    {
        $this->zoneGeo = $zoneGeo;

        return $this;
    }

    /**
     * Get the value of lieudit
     */
    public function getLieudit(): ?string
    {
        return $this->lieudit;
    }

    /**
     * Set the value of lieudit
     */
    public function setLieudit(?string $lieudit): self
    {
        $this->lieudit = $lieudit;

        return $this;
    }

    /**
     * Get the value of station
     */
    public function getStation(): ?string
    {
        return $this->station;
    }

    /**
     * Set the value of station
     */
    public function setStation(?string $station): self
    {
        $this->station = $station;

        return $this;
    }

    /**
     * Get the value of milieu
     */
    public function getMilieu(): ?string
    {
        return $this->milieu;
    }

    /**
     * Set the value of milieu
     */
    public function setMilieu(?string $milieu): self
    {
        $this->milieu = $milieu;

        return $this;
    }

    /**
     * Get the value of nomReferentiel
     */
    public function getNomReferentiel(): ?string
    {
        return $this->nomReferentiel;
    }

    /**
     * Set the value of nomReferentiel
     */
    public function setNomReferentiel(?string $nomReferentiel): self
    {
        $this->nomReferentiel = $nomReferentiel;

        return $this;
    }

    /**
     * Get the value of dateObservation
     */
    public function getDateObservation(): ?\DateTimeImmutable
    {
        return $this->dateObservation;
    }

    /**
     * Set the value of dateObservation
     */
    public function setDateObservation(?\DateTimeImmutable $dateObservation): self
    {
        $this->dateObservation = $dateObservation;

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
     * Get the value of dateCreation
     */
    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     */
    public function setDateCreation(?\DateTimeImmutable $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get the value of dateModification
     */
    public function getDateModification(): ?\DateTimeImmutable
    {
        return $this->dateModification;
    }

    /**
     * Set the value of dateModification
     */
    public function setDateModification(?\DateTimeImmutable $dateModification): self
    {
        $this->dateModification = $dateModification;

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

    /**
     * Get the value of certitude
     */
    public function getCertitude(): ?string
    {
        return $this->certitude;
    }

    /**
     * Set the value of certitude
     */
    public function setCertitude(?string $certitude): self
    {
        $this->certitude = $certitude;

        return $this;
    }

    /**
     * Get the value of pays
     */
    public function getPays(): ?string
    {
        return $this->pays;
    }

    /**
     * Set the value of pays
     */
    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get the value of inputSource
     */
    public function getInputSource(): ?string
    {
        return $this->inputSource;
    }

    /**
     * Set the value of inputSource
     */
    public function setInputSource(?string $inputSource): self
    {
        $this->inputSource = $inputSource;

        return $this;
    }

    /**
     * Get the value of donneesStandard
     */
    public function isDonneesStandard(): ?bool
    {
        return $this->donneesStandard;
    }

    /**
     * Set the value of donneesStandard
     */
    public function setDonneesStandard(?bool $donneesStandard): self
    {
        $this->donneesStandard = $donneesStandard;

        return $this;
    }
}
