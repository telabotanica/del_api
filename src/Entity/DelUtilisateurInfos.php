<?php

namespace App\Entity;

use App\Repository\DelUtilisateurInfosRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Table(name: "del_utilisateur_infos",options:["engine"=>"InnoDB"])]
#[ORM\Index(name: "courriel_idx", columns: ["courriel"])]
#[ORM\Entity(repositoryClass: DelUtilisateurInfosRepository::class)]
class DelUtilisateurInfos
{   
    #[Groups(['utilisateur_infos'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(name:"id_utilisateur",type: "integer")]
    private int $id_utilisateur;
    
    #[ORM\OneToOne(inversedBy: 'utilisateur_infos')]
    #[ORM\JoinColumn(nullable: true,name:"id_utilisateur",referencedColumnName:"ID")]
    private ?DelUtilisateur $utilisateurUI = null;

    #[Groups(['utilisateur_infos'])]
    #[ORM\Column(name: "intitule", type: "string", length: 128, nullable: true)]
    private ?string $intitule = null;

    #[Groups(['utilisateur_infos'])]
    #[ORM\Column(name: "prenom", type: "string", length: 32, nullable: true)]
    private ?string $prenom = null;

    #[Groups(['utilisateur_infos'])]
    #[ORM\Column(name: "nom", type: "string", length: 32, nullable: true)]
    private ?string $nom = null;

    #[Groups(['utilisateur_infos'])]
    #[ORM\Column(name: "courriel", type: "string", length: 128, nullable: true)]
    private ?string $courriel = null;

    #[Groups(['utilisateur_infos'])]
    #[ORM\Column(name: "admin", type: "boolean", nullable: false)]
    private bool $admin;

    #[Groups(['utilisateur_infos'])]
    #[ORM\Column(name: "preferences", type: "text", nullable: false)]
    private string $preferences;

    #[Groups(['utilisateur_infos'])]
    #[ORM\Column(name: "date_premiere_utilisation", type: "datetime", nullable: true)]
    private ?\DateTime $datePremiereUtilisation = null;

    #[Groups(['utilisateur_infos'])]
    #[ORM\Column(name: "date_derniere_consultation_evenements", type: "datetime", nullable: true)]
    private ?\DateTime $dateDerniereConsultationEvenements;

    public function __construct()
    {
        $this->datePremiereUtilisation = new DateTime();
        $this->dateDerniereConsultationEvenements = new DateTime();
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(?string $intitule): self
    {
        $this->intitule = $intitule;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getCourriel(): ?string
    {
        return $this->courriel;
    }

    public function setCourriel(?string $courriel): self
    {
        $this->courriel = $courriel;
        return $this;
    }

    public function isAdmin(): bool
    {
        return $this->admin;
    }

    public function setAdmin(bool $admin): self
    {
        $this->admin = $admin;
        return $this;
    }

    public function getPreferences(): string
    {
        return $this->preferences;
    }

    public function setPreferences(string $preferences): self
    {
        $this->preferences = $preferences;
        return $this;
    }

    public function getDatePremiereUtilisation(): ?\DateTime
    {
        return $this->datePremiereUtilisation;
    }

    public function setDatePremiereUtilisation(?\DateTime $datePremiereUtilisation): self
    {
        $this->datePremiereUtilisation = $datePremiereUtilisation;
        return $this;
    }

    public function getDateDerniereConsultationEvenements(): \DateTime
    {
        return $this->dateDerniereConsultationEvenements;
    }

    public function setDateDerniereConsultationEvenements(\DateTime $dateDerniereConsultationEvenements): self
    {
        $this->dateDerniereConsultationEvenements = $dateDerniereConsultationEvenements;
        return $this;
    }

    /**
     * Get the value of utilisateurUI
     */
    public function getUtilisateurUI(): ?DelUtilisateur
    {
        return $this->utilisateurUI;
    }

    /**
     * Set the value of utilisateurUI
     */
    public function setUtilisateurUI(?DelUtilisateur $utilisateurUI): self
    {
        $this->utilisateurUI = $utilisateurUI;

        return $this;
    }

    /**
     * Get the value of id_utilisateur
     */
    public function getIdUtilisateur(): int
    {
        return $this->id_utilisateur;
    }

    /**
     * Set the value of id_utilisateur
     */
    public function setIdUtilisateur(int $id_utilisateur): self
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }
}
