<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DelCommentaireVote
 *
 * @ORM\Table(name="del_commentaire_vote", indexes={@ORM\Index(name="ce_proposition", columns={"ce_proposition"}), @ORM\Index(name="ce_utilisateur", columns={"ce_utilisateur"})})
 * @ORM\Entity
 */
class DelCommentaireVote
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_vote", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVote;

    /**
     * @var int
     *
     * @ORM\Column(name="ce_proposition", type="bigint", nullable=false)
     */
    private $ceProposition;

    /**
     * @var string
     *
     * @ORM\Column(name="ce_utilisateur", type="string", length=32, nullable=false, options={"comment"="Identifiant de session ou id de l'utilisateur."})
     */
    private $ceUtilisateur = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="valeur", type="boolean", nullable=false)
     */
    private $valeur;

    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    public function getIdVote(): ?int
    {
        return $this->idVote;
    }

    public function getCeProposition(): ?string
    {
        return $this->ceProposition;
    }

    public function setCeProposition(string $ce_proposition): static
    {
        $this->ceProposition = $ce_proposition;

        return $this;
    }

    public function getCeUtilisateur(): ?string
    {
        return $this->ceUtilisateur;
    }

    public function setCeUtilisateur(string $ce_utilisateur): static
    {
        $this->ceUtilisateur = $ce_utilisateur;

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
}
