<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DelCommentaire
 *
 * @ORM\Table(name="del_commentaire", indexes={@ORM\Index(name="ce_commentaire_parent_2", columns={"ce_commentaire_parent"}), @ORM\Index(name="ce_proposition", columns={"ce_proposition"}), @ORM\Index(name="ce_utilisateur", columns={"ce_utilisateur"}), @ORM\Index(name="ce_observation", columns={"ce_observation"}), @ORM\Index(name="ce_commentaire_parent", columns={"ce_commentaire_parent"})})
 * @ORM\Entity
 */
class DelCommentaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_commentaire", type="bigint", nullable=false, options={"comment"="identifiant d'un commentaire ou d'une proposition"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommentaire;

    /**
     * @var int
     *
     * @ORM\Column(name="ce_observation", type="bigint", nullable=false)
     */
    private $ceObservation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ce_proposition", type="integer", nullable=true, options={"comment"="id_commentaire de la proposition à laquelle est liée le commentaire"})
     */
    private $ceProposition = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="ce_commentaire_parent", type="bigint", nullable=true, options={"comment"="id_commentaire du commentaire ou de la proposition parent"})
     */
    private $ceCommentaireParent = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="texte", type="text", length=65535, nullable=true)
     */
    private $texte;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ce_utilisateur", type="integer", nullable=true)
     */
    private $ceUtilisateur = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="utilisateur_prenom", type="string", length=255, nullable=true)
     */
    private $utilisateurPrenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="utilisateur_nom", type="string", length=255, nullable=true)
     */
    private $utilisateurNom;

    /**
     * @var string
     *
     * @ORM\Column(name="utilisateur_courriel", type="string", length=255, nullable=false)
     */
    private $utilisateurCourriel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_sel", type="string", length=255, nullable=true, options={"comment"="contient ce qu'il a été saisi dans le cel pas forcement nom latin"})
     */
    private $nomSel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_sel_nn", type="decimal", precision=9, scale=0, nullable=true, options={"comment"="attention peut être null ou 0 si pas de valeur"})
     */
    private $nomSelNn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_ret", type="string", length=255, nullable=true, options={"comment"="nom retenu du référentiel"})
     */
    private $nomRet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_ret_nn", type="decimal", precision=9, scale=0, nullable=true)
     */
    private $nomRetNn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nt", type="decimal", precision=9, scale=0, nullable=true)
     */
    private $nt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="famille", type="string", length=255, nullable=true)
     */
    private $famille;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_referentiel", type="string", length=255, nullable=true)
     */
    private $nomReferentiel;

    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"comment"="Date de création du commentaire."})
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="proposition_initiale", type="integer", nullable=false)
     */
    private $propositionInitiale = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="proposition_retenue", type="integer", nullable=false, options={"comment"="proposition qui peut être initiale ou non et qui a été validé par l'auteur comme nom"})
     */
    private $propositionRetenue = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="ce_validateur", type="integer", nullable=true)
     */
    private $ceValidateur;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(name="date_validation", type="datetime", nullable=true)
     */
    private $dateValidation;

    public function getIdCommentaire(): ?int
    {
        return $this->idCommentaire;
    }

    public function getCeObservation(): ?int
    {
        return $this->ceObservation;
    }

    public function setCeObservation(?int $ceObservation): static
    {
        $this->ceObservation = $ceObservation;

        return $this;
    }

    public function getCeProposition(): ?int
    {
        return $this->ceProposition;
    }

    public function setCeProposition(?int $ce_proposition): static
    {
        $this->ceProposition = $ce_proposition;

        return $this;
    }

    public function getCeCommentaireParent(): ?string
    {
        return $this->ceCommentaireParent;
    }

    public function setCeCommentaireParent(?string $ce_commentaire_parent): static
    {
        $this->ceCommentaireParent = $ce_commentaire_parent;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): static
    {
        $this->texte = $texte;

        return $this;
    }

    public function getCeUtilisateur(): ?int
    {
        return $this->ceUtilisateur;
    }

    public function setCeUtilisateur(?int $ce_utilisateur): static
    {
        $this->ceUtilisateur = $ce_utilisateur;

        return $this;
    }

    public function getUtilisateurPrenom(): ?int
    {
        return $this->utilisateurPrenom;
    }

    public function setUtilisateurPrenom(?int $utilisateur_prenom): static
    {
        $this->utilisateurPrenom = $utilisateur_prenom;

        return $this;
    }

    public function getUtilisateurNom(): ?string
    {
        return $this->utilisateurNom;
    }

    public function setUtilisateurNom(?string $utilisateur_nom): static
    {
        $this->utilisateurNom = $utilisateur_nom;

        return $this;
    }

    public function getUtilisateurCourriel(): ?string
    {
        return $this->utilisateurCourriel;
    }

    public function setUtilisateurCourriel(string $utilisateur_courriel): static
    {
        $this->utilisateurCourriel = $utilisateur_courriel;

        return $this;
    }

    public function getNomSel(): ?string
    {
        return $this->nomSel;
    }

    public function setNomSel(?string $nom_sel): static
    {
        $this->nomSel = $nom_sel;

        return $this;
    }

    public function getNomSelNn(): ?string
    {
        return $this->nomSelNn;
    }

    public function setNomSelNn(?string $nom_sel_nn): static
    {
        $this->nomSelNn = $nom_sel_nn;

        return $this;
    }

    public function getNomRet(): ?string
    {
        return $this->nomRet;
    }

    public function setNomRet(?string $nom_ret): static
    {
        $this->nomRet = $nom_ret;

        return $this;
    }

    public function getNomRetNn(): ?string
    {
        return $this->nomRetNn;
    }

    public function setNomRetNn(string $nom_ret_nn): static
    {
        $this->nomRetNn = $nom_ret_nn;

        return $this;
    }

    public function getNt(): ?string
    {
        return $this->nt;
    }

    public function setNt(?string $nt): static
    {
        $this->nt = $nt;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(?string $famille): static
    {
        $this->famille = $famille;

        return $this;
    }

    public function getNomReferentiel(): ?string
    {
        return $this->nomReferentiel;
    }

    public function setNomReferentiel(?string $nom_referentiel): static
    {
        $this->nomReferentiel = $nom_referentiel;

        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getPropositionInitiale(): ?int
    {
        return $this->propositionInitiale;
    }

    public function setPropositionInitiale(int $proposition_initiale): static
    {
        $this->propositionInitiale = $proposition_initiale;

        return $this;
    }

    public function getPropositionRetenue(): ?int
    {
        return $this->propositionRetenue;
    }

    public function setPropositionRetenue(int $proposition_retenue): static
    {
        $this->propositionRetenue = $proposition_retenue;

        return $this;
    }

    public function getCeValidateur(): ?int
    {
        return $this->ceValidateur;
    }

    public function setCeValidateur(?int $ce_validateur): static
    {
        $this->ceValidateur = $ce_validateur;

        return $this;
    }

    public function getDateValidation(): ?\DateTimeImmutable
    {
        return $this->dateValidation;
    }

    public function setDateValidation(?\DateTimeImmutable $date_validation): static
    {
        $this->dateValidation = $date_validation;

        return $this;
    }

}
