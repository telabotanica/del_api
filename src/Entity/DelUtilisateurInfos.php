<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DelUtilisateurInfos
 *
 * @ORM\Table(name="del_utilisateur_infos", indexes={@ORM\Index(name="courriel_idx", columns={"courriel"})})
 * @ORM\Entity
 */
class DelUtilisateurInfos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="intitule", type="string", length=128, nullable=true)
     */
    private $intitule;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom", type="string", length=32, nullable=true)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=32, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="courriel", type="string", length=128, nullable=true)
     */
    private $courriel;

    /**
     * @var bool
     *
     * @ORM\Column(name="admin", type="boolean", nullable=false)
     */
    private $admin;

    /**
     * @var string
     *
     * @ORM\Column(name="preferences", type="text", length=0, nullable=false)
     */
    private $preferences;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(name="date_premiere_utilisation", type="datetime", nullable=true)
     */
    private $datePremiereUtilisation;

    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="date_derniere_consultation_evenements", type="datetime", nullable=false)
     */
    private $dateDerniereConsultationEvenements;

    


    /**
     * Get the value of idUtilisateur
     */
    public function getIdUtilisateur(): int
    {
        return $this->idUtilisateur;
    }

    /**
     * Set the value of idUtilisateur
     */
    public function setIdUtilisateur(int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get the value of intitule
     */
    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    /**
     * Set the value of intitule
     */
    public function setIntitule(?string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of courriel
     */
    public function getCourriel(): ?string
    {
        return $this->courriel;
    }

    /**
     * Set the value of courriel
     */
    public function setCourriel(?string $courriel): self
    {
        $this->courriel = $courriel;

        return $this;
    }

    /**
     * Get the value of admin
     */
    public function isAdmin(): bool
    {
        return $this->admin;
    }

    /**
     * Set the value of admin
     */
    public function setAdmin(bool $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get the value of preferences
     */
    public function getPreferences(): string
    {
        return $this->preferences;
    }

    /**
     * Set the value of preferences
     */
    public function setPreferences(string $preferences): self
    {
        $this->preferences = $preferences;

        return $this;
    }

    /**
     * Get the value of datePremiereUtilisation
     */
    public function getDatePremiereUtilisation(): ?\DateTimeImmutable
    {
        return $this->datePremiereUtilisation;
    }

    /**
     * Set the value of datePremiereUtilisation
     */
    public function setDatePremiereUtilisation(?\DateTimeImmutable $datePremiereUtilisation): self
    {
        $this->datePremiereUtilisation = $datePremiereUtilisation;

        return $this;
    }

    /**
     * Get the value of dateDerniereConsultationEvenements
     */
    public function getDateDerniereConsultationEvenements(): \DateTimeImmutable
    {
        return $this->dateDerniereConsultationEvenements;
    }

    /**
     * Set the value of dateDerniereConsultationEvenements
     */
    public function setDateDerniereConsultationEvenements(\DateTimeImmutable $dateDerniereConsultationEvenements): self
    {
        $this->dateDerniereConsultationEvenements = $dateDerniereConsultationEvenements;

        return $this;
    }
}
