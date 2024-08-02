<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\DelObservationRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * DelObservation
 */
#[ORM\Table(name: "del_observation")]
#[ORM\Index(name: "courriel_utilisateur", columns: ["courriel_utilisateur"])]
#[ORM\Index(name: "nom_sel", columns: ["nom_sel"])]
#[ORM\Index(name: "nom_referentiel", columns: ["nom_referentiel"])]
#[ORM\Index(name: "certitude", columns: ["certitude"])]
#[ORM\Index(name: "nom_sel_nn", columns: ["nom_sel_nn"])]
#[ORM\Index(name: "nom_ret_nn", columns: ["nom_ret_nn"])]
#[ORM\Index(name: "source", columns: ["input_source"])]
#[ORM\Index(name: "ce_utilisateur", columns: ["ce_utilisateur"])]
#[ORM\Entity(repositoryClass: DelObservationRepository::class)]

class DelObservation
{   
    #[ORM\Column(name: "id_observation", type: "bigint", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[Groups(['observation'])]
    private int $id_observation;

    #[Groups(['utilisateur'])]
    #[ORM\ManyToOne(inversedBy: 'observations',targetEntity:DelUtilisateur::class)]
    #[ORM\JoinColumn(nullable: false,name: "ce_utilisateur",referencedColumnName:"ID")]
    private ?DelUtilisateur $utilisateurO = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "nom_utilisateur", type: "string", length: 155, nullable: true)]
    private ?string $nomUtilisateur = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "prenom_utilisateur", type: "string", length: 5, nullable: true)]
    private ?string $prenomUtilisateur = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "courriel_utilisateur", type: "string", length: 155, nullable: true)]
    private ?string $courrielUtilisateur = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "nom_sel", type: "string", length: 255, nullable: true)]
    private ?string $nomSel = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "nom_sel_nn", type: "integer", nullable: true, options: ["comment" => "Numéro du nom sélectionné."])]
    private ?int $nomSelNn = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "nom_ret", type: "string", length: 255, nullable: true)]
    private ?string $nomRet = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "nom_ret_nn", type: "integer", nullable: true, options: ["comment" => "Numéro du nom retenu."])]
    private ?int $nomRetNn = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "nt", type: "integer", nullable: true, options: ["comment" => "Numéro du nom retenu."])]
    private ?int $nt = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "famille", type: "string", length: 100, nullable: true)]
    private ?string $famille = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "ce_zone_geo", type: "string", length: 5, nullable: true)]
    private ?string $ceZoneGeo = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "zone_geo", type: "string", length: 255, nullable: true)]
    private ?string $zoneGeo = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "lieudit", type: "string", length: 255, nullable: true)]
    private ?string $lieudit = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "station", type: "string", length: 255, nullable: true)]
    private ?string $station = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "milieu", type: "string", length: 255, nullable: true)]
    private ?string $milieu = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "nom_referentiel", type: "string", length: 25, nullable: true)]
    private ?string $nomReferentiel = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "date_observation", type: "datetime_immutable", nullable: true)]
    private ?DateTimeImmutable $dateObservation = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "mots_cles_texte", type: "text", nullable: true, options: ["comment" => "Champ calculé contenant la liste des mots clés utilisateurs séparé par des virgules."])]
    private ?string $motsClesTexte = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "commentaire", type: "text", length: 65535, nullable: true)]
    private ?string $commentaire = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "date_creation", type: "datetime_immutable", nullable: true)]
    private ?DateTimeImmutable $dateCreation = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "date_modification", type: "datetime_immutable", nullable: true)]
    private ?DateTimeImmutable $dateModification = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "date_transmission", type: "datetime_immutable", nullable: true)]
    private ?DateTimeImmutable $dateTransmission = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "certitude", type: "string", length: 25, nullable: true)]
    private ?string $certitude = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "pays", type: "string", length: 150, nullable: true, options: ["comment" => "Code de pays suivant le standard ISO 3166-2"])]
    private ?string $pays = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "input_source", type: "string", length: 15, nullable: true)]
    private ?string $inputSource = null;

    #[Groups(['observation'])]
    #[ORM\Column(name: "donnees_standard", type: "boolean", nullable: true)]
    private ?bool $donneesStandard = null;

    #[Groups(['image'])]
    #[ORM\OneToMany(mappedBy: 'observation', targetEntity: DelImage::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $images;

    #[Groups(['commentaire'])]
    #[ORM\OneToMany(mappedBy: 'observation', targetEntity: DelCommentaire::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $commentaires;

    public function __construct()
    {
        $this->dateCreation = new DateTimeImmutable();
        $this->dateModification = new DateTimeImmutable();
        $this->dateTransmission = new DateTimeImmutable();
        $this->dateObservation = new DateTimeImmutable();
        $this->images = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        
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

    public function setPrenomUtilisateur(?string $prenomUtilisateur): self
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

    public function getNomSel(): ?string
    {
        return $this->nomSel;
    }

    public function setNomSel(?string $nomSel): self
    {
        $this->nomSel = $nomSel;

        return $this;
    }

    public function getNomSelNn(): ?int
    {
        return $this->nomSelNn;
    }

    public function setNomSelNn(?int $nomSelNn): self
    {
        $this->nomSelNn = $nomSelNn;

        return $this;
    }

    public function getNomRet(): ?string
    {
        return $this->nomRet;
    }

    public function setNomRet(?string $nomRet): self
    {
        $this->nomRet = $nomRet;

        return $this;
    }

    public function getNomRetNn(): ?int
    {
        return $this->nomRetNn;
    }

    public function setNomRetNn(?int $nomRetNn): self
    {
        $this->nomRetNn = $nomRetNn;

        return $this;
    }

    public function getNt(): ?int
    {
        return $this->nt;
    }

    public function setNt(?int $nt): self
    {
        $this->nt = $nt;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(?string $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    public function getCeZoneGeo(): ?string
    {
        return $this->ceZoneGeo;
    }

    public function setCeZoneGeo(?string $ceZoneGeo): self
    {
        $this->ceZoneGeo = $ceZoneGeo;

        return $this;
    }

    public function getZoneGeo(): ?string
    {
        return $this->zoneGeo;
    }

    public function setZoneGeo(?string $zoneGeo): self
    {
        $this->zoneGeo = $zoneGeo;

        return $this;
    }

    public function getLieudit(): ?string
    {
        return $this->lieudit;
    }

    public function setLieudit(?string $lieudit): self
    {
        $this->lieudit = $lieudit;

        return $this;
    }

    public function getStation(): ?string
    {
        return $this->station;
    }

    public function setStation(?string $station): self
    {
        $this->station = $station;

        return $this;
    }

    public function getMilieu(): ?string
    {
        return $this->milieu;
    }

    public function setMilieu(?string $milieu): self
    {
        $this->milieu = $milieu;

        return $this;
    }

    public function getNomReferentiel(): ?string
    {
        return $this->nomReferentiel;
    }

    public function setNomReferentiel(?string $nomReferentiel): self
    {
        $this->nomReferentiel = $nomReferentiel;

        return $this;
    }

    public function getDateObservation(): ?DateTimeImmutable
    {
        return $this->dateObservation;
    }

    public function setDateObservation(?DateTimeImmutable $dateObservation): self
    {
        $this->dateObservation = $dateObservation;

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

    public function getDateCreation(): ?DateTimeImmutable
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?DateTimeImmutable $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateModification(): ?DateTimeImmutable
    {
        return $this->dateModification;
    }

    public function setDateModification(?DateTimeImmutable $dateModification): self
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    public function getDateTransmission(): ?DateTimeImmutable
    {
        return $this->dateTransmission;
    }

    public function setDateTransmission(?DateTimeImmutable $dateTransmission): self
    {
        $this->dateTransmission = $dateTransmission;

        return $this;
    }

    public function getCertitude(): ?string
    {
        return $this->certitude;
    }

    public function setCertitude(?string $certitude): self
    {
        $this->certitude = $certitude;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getInputSource(): ?string
    {
        return $this->inputSource;
    }

    public function setInputSource(?string $inputSource): self
    {
        $this->inputSource = $inputSource;

        return $this;
    }

    public function getDonneesStandard(): ?bool
    {
        return $this->donneesStandard;
    }

    public function setDonneesStandard(?bool $donneesStandard): self
    {
        $this->donneesStandard = $donneesStandard;

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
            $image->setObservation($this);
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
            $commentaire->setObservation($this);
        }
        

        return $this;
    }

    /**
     * Get the value of utilisateurO
     */
    public function getUtilisateurO(): ?DelUtilisateur
    {
        return $this->utilisateurO;
    }

    /**
     * Set the value of utilisateurO
     */
    public function setUtilisateurO(?DelUtilisateur $utilisateurO): self
    {
        $this->utilisateurO = $utilisateurO;

        return $this;
    }

    /**
     * Get the value of id_observation
     */
    public function getIdObservation(): int
    {
        return $this->id_observation;
    }

    /**
     * Set the value of id_observation
     */
    public function setIdObservation(int $id_observation): self
    {
        $this->id_observation = $id_observation;

        return $this;
    }
}
