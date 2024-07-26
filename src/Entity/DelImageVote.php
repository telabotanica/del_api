<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DelImageVote
 *
 * @ORM\Table(name="del_image_vote", indexes={@ORM\Index(name="ce_image", columns={"ce_image"}), @ORM\Index(name="ce_protocole", columns={"ce_protocole"}), @ORM\Index(name="ce_utilisateur", columns={"ce_utilisateur"})})
 * @ORM\Entity
 */
class DelImageVote
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
     * @ORM\Column(name="ce_image", type="bigint", nullable=false)
     */
    private $ceImage;

    /**
     * @var int
     *
     * @ORM\Column(name="ce_protocole", type="integer", nullable=false)
     */
    private $ceProtocole;

    /**
     * @var string
     *
     * @ORM\Column(name="ce_utilisateur", type="string", length=32, nullable=false, options={"comment"="Identifiant de session ou id utilisateur."})
     */
    private $ceUtilisateur;

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

    


    /**
     * Get the value of idVote
     */
    public function getIdVote(): int
    {
        return $this->idVote;
    }

    /**
     * Set the value of idVote
     */
    public function setIdVote(int $idVote): self
    {
        $this->idVote = $idVote;

        return $this;
    }

    /**
     * Get the value of ceImage
     */
    public function getCeImage(): int
    {
        return $this->ceImage;
    }

    /**
     * Set the value of ceImage
     */
    public function setCeImage(int $ceImage): self
    {
        $this->ceImage = $ceImage;

        return $this;
    }

    /**
     * Get the value of ceProtocole
     */
    public function getCeProtocole(): int
    {
        return $this->ceProtocole;
    }

    /**
     * Set the value of ceProtocole
     */
    public function setCeProtocole(int $ceProtocole): self
    {
        $this->ceProtocole = $ceProtocole;

        return $this;
    }

    /**
     * Get the value of ceUtilisateur
     */
    public function getCeUtilisateur(): string
    {
        return $this->ceUtilisateur;
    }

    /**
     * Set the value of ceUtilisateur
     */
    public function setCeUtilisateur(string $ceUtilisateur): self
    {
        $this->ceUtilisateur = $ceUtilisateur;

        return $this;
    }

    /**
     * Get the value of valeur
     */
    public function isValeur(): bool
    {
        return $this->valeur;
    }

    /**
     * Set the value of valeur
     */
    public function setValeur(bool $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * Set the value of date
     */
    public function setDate(\DateTimeImmutable $date): self
    {
        $this->date = $date;

        return $this;
    }
}
