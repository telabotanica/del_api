<?php

namespace App\Entity;

use App\Repository\DelCommentaireRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use DateTime;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Service\PDOConnection;
use PDO;

#[ORM\Table(name: "del_commentaire",options:["engine"=>"InnoDB"])]
#[ORM\Index(name: "ce_proposition", columns: ["ce_proposition"])]
#[ORM\Index(name: 'ce_utilisateur', columns: ['ce_utilisateur'])]
#[ORM\Index(name: "ce_observation", columns: ["ce_observation"])]
#[ORM\Index(name: "ce_commentaire_parent", columns: ["ce_commentaire_parent"])]
#[ORM\Entity(repositoryClass: DelCommentaireRepository::class)]
class DelCommentaire
{
    #[Groups(['commentaire'])]
    #[ORM\Id]
    #[ORM\Column(name: "id_commentaire", type: "bigint", nullable: false, options: ["comment" => "identifiant d'un commentaire ou d'une proposition"])]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private ?int $id_commentaire = null;

    #[ORM\ManyToOne(targetEntity: DelObservation::class, inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false, name:"ce_observation", referencedColumnName:"id_observation")]
    private ?DelObservation $observation = null;

  
    #[ORM\ManyToOne(inversedBy: 'commentairesP')]
    #[ORM\JoinColumn(nullable: true,name: "ce_proposition",referencedColumnName:"id_commentaire")]
    private ?DelCommentaire $commentaireP = null;

    
    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false,name: "ce_commentaire_parent",referencedColumnName:"id_commentaire")]
    private ?DelCommentaire $commentaire = null;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "texte", type: "text", length: 65535, nullable: true)]
    private ?string $texte = null;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "ce_utilisateur", type: "string", length: 255, nullable: true)]
    private string $ce_utilisateur;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "utilisateur_prenom", type: "string", length: 255, nullable: true)]
    private ?string $utilisateurPrenom = null;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "utilisateur_nom", type: "string", length: 255, nullable: true)]
    private ?string $utilisateurNom = null;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "utilisateur_courriel", type: "string", length: 255, nullable: false)]
    private string $utilisateurCourriel;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "nom_sel", type: "string", length: 255, nullable: true, options: ["comment" => "contient ce qu'il a été saisi dans le cel pas forcement nom latin"])]
    private ?string $nomSel = null;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "nom_sel_nn", type: "decimal", precision: 9, scale: 0, nullable: true, options: ["comment" => "attention peut être null ou 0 si pas de valeur"])]
    private ?string $nomSelNn = null;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "nom_ret", type: "string", length: 255, nullable: true, options: ["comment" => "nom retenu du référentiel"])]
    private ?string $nomRet = null;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "nom_ret_nn", type: "decimal", precision: 9, scale: 0, nullable: true)]
    private ?string $nomRetNn = null;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "nt", type: "decimal", precision: 9, scale: 0, nullable: true)]
    private ?string $nt = null;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "famille", type: "string", length: 255, nullable: true)]
    private ?string $famille = null;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "nom_referentiel", type: "string", length: 255, nullable: true)]
    private ?string $nomReferentiel = null;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "date", type: "datetime", nullable: true, options: ["default" => "CURRENT_TIMESTAMP", "comment" => "Date de création du commentaire."])]
    private ?\DateTime $date;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "proposition_initiale", type: "integer", nullable: false)]
    private int $propositionInitiale = 0;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "proposition_retenue", type: "integer", nullable: false, options: ["comment" => "proposition qui peut être initiale ou non et qui a été validé par l'auteur comme nom"])]
    private int $propositionRetenue = 0;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "ce_validateur", type: "integer", nullable: true)]
    private ?int $ceValidateur = null;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "date_validation", type: "datetime", nullable: true)]
    private ?\DateTime $dateValidation = null;

    #[Groups(['commentaire'])]
    #[ORM\Column(name: "points", type: "integer", nullable: false)]
    private int $score =0;

    #[Groups(['commentaire_vote'])]
    #[ORM\OneToMany(mappedBy: 'commentaire', targetEntity: DelCommentaireVote::class, orphanRemoval: true,cascade:['persist'])]
    private Collection $commentaire_votes;

    #[Groups(['commentaire_vote'])]
    #[ORM\OneToMany(mappedBy: 'commentaireP', targetEntity: DelCommentaire::class)]
    private Collection $commentairesP;

    #[Groups(['commentaire_vote'])]
    #[ORM\OneToMany(mappedBy: 'commentaire', targetEntity: DelCommentaire::class)]
    private Collection $commentaires;

    public function __construct()
    {
        $this->date = new DateTime();
        $this->dateValidation = new DateTime();
        $this->commentaire_votes = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;
        return $this;
    }

    public function getUtilisateurPrenom(): ?string
    {
        return $this->utilisateurPrenom;
    }

    public function setUtilisateurPrenom(?string $utilisateurPrenom): self
    {
        $this->utilisateurPrenom = $utilisateurPrenom;
        return $this;
    }

    public function getUtilisateurNom(): ?string
    {
        return $this->utilisateurNom;
    }

    public function setUtilisateurNom(?string $utilisateurNom): self
    {
        $this->utilisateurNom = $utilisateurNom;
        return $this;
    }

    public function getUtilisateurCourriel(): string
    {
        return $this->utilisateurCourriel;
    }

    public function setUtilisateurCourriel(string $utilisateurCourriel): self
    {
        $this->utilisateurCourriel = $utilisateurCourriel;
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

    public function getNomSelNn(): ?string
    {
        return $this->nomSelNn;
    }

    public function setNomSelNn(?string $nomSelNn): self
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

    public function getNomRetNn(): ?string
    {
        return $this->nomRetNn;
    }

    public function setNomRetNn(?string $nomRetNn): self
    {
        $this->nomRetNn = $nomRetNn;
        return $this;
    }

    public function getNt(): ?string
    {
        return $this->nt;
    }

    public function setNt(?string $nt): self
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

    public function getNomReferentiel(): ?string
    {
        return $this->nomReferentiel;
    }

    public function setNomReferentiel(?string $nomReferentiel): self
    {
        $this->nomReferentiel = $nomReferentiel;
        return $this;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getPropositionInitiale(): int
    {
        return $this->propositionInitiale;
    }

    public function setPropositionInitiale(int $propositionInitiale): self
    {
        $this->propositionInitiale = $propositionInitiale;
        return $this;
    }

    public function getPropositionRetenue(): int
    {
        return $this->propositionRetenue;
    }

    public function setPropositionRetenue(int $propositionRetenue): self
    {
        $this->propositionRetenue = $propositionRetenue;
        return $this;
    }

    public function getCeValidateur(): ?int
    {
        return $this->ceValidateur;
    }

    public function setCeValidateur(?int $ceValidateur): self
    {
        $this->ceValidateur = $ceValidateur;
        return $this;
    }

    public function getDateValidation(): ?\DateTime
    {
        return $this->dateValidation;
    }

    public function setDateValidation(?\DateTime $dateValidation): self
    {
        $this->dateValidation = $dateValidation;
        return $this;
    }

    /**
     * Get the value of observation
     */
    public function getObservation(): ?DelObservation
    {
        return $this->observation;
    }

    /**
     * Set the value of observation
     */
    public function setObservation(?DelObservation $observation): self
    {
        $this->observation = $observation;

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
            $commentaire_vote->setCommentaire($this);
        }

        return $this;
    }
    
    public function removeCommentaireVotes(DelCommentaire $commentaire_vote): self
    {
        if ($this->commentaire_votes->removeElement($commentaire_vote)) {
            if ($commentaire_vote->getCommentaire() === $this) {
                $commentaire_vote->setCommentaire(null);
            }
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
            $commentaire->setCommentaire($this);
        }

        return $this;
    }

    public function removeCommentaires(DelCommentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            if ($commentaire->getCommentaire() === $this) {
                $commentaire->setCommentaire(null);
            }
        }

        return $this;
    }
    /**
     * Get the value of commentaire
     */
    public function getCommentaire(): ?DelCommentaire
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     */
    public function setCommentaire(?DelCommentaire $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get the value of id_commentaire
     */
    public function getIdCommentaire(): ?int
    {
        return $this->id_commentaire;
    }

    /**
     * Set the value of id_commentaire
     */
    public function setIdCommentaire(?int $id_commentaire): self
    {
        $this->id_commentaire = $id_commentaire;

        return $this;
    }

    /**
     * Get the value of commentaireP
     */
    public function getCommentaireP(): ?DelCommentaire
    {
        return $this->commentaireP;
    }

    /**
     * Set the value of commentaireP
     */
    public function setCommentaireP(?DelCommentaire $commentaireP): self
    {
        $this->commentaireP = $commentaireP;

        return $this;
    }

    /**
     * Get the value of score
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * Set the value of score
     */
    public function setScore(int $score): self
    {
        $score = 0;
        foreach($this->commentaire_votes as $vote){
            if(is_numeric($vote->getCeUtilisateur())){
                            
                if ($vote->getValeur()){
                    $score+=3;
                }else{
                    $score+=-3;
                }
            }else{
                
                if ($vote->getValeur()){
                    $score+=1;
                }else{
                    $score+=-1;
                }
            }
        }

        $this->score = $score;
        
        
        return $this;
    }

    /**
     * Get the value of commentairesP
     */
    public function getCommentairesP(): Collection
    {
        return $this->commentairesP;
    }

    /**
     * Set the value of commentairesP
     */
    public function addCommentairesP(DelCommentaire $commentaireP): self
    {
        if (!$this->commentairesP->contains($commentaireP)) {
            $this->commentairesP->add($commentaireP);
            $commentaireP->setCommentaireP($this);
        }

        return $this;
    }

    public function removeCommentairesP(DelCommentaire $commentaireP): self
    {
        if ($this->commentairesP->removeElement($commentaireP)) {
            if ($commentaireP->getCommentaire() === $this) {
                $commentaireP->setCommentaire(null);
            }
        }

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
