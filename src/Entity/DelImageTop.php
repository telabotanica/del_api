<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DelImageTop
 *
 * @ORM\Table(name="del_image_top", indexes={@ORM\Index(name="organe", columns={"organe"})})
 * @ORM\Entity
 */
class DelImageTop
{
    /**
     * @var string
     *
     * @ORM\Column(name="nn", type="decimal", precision=9, scale=0, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nn;

    /**
     * @var string
     *
     * @ORM\Column(name="referentiel", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $referentiel;

    /**
     * @var int
     *
     * @ORM\Column(name="ce_image", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ceImage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="organe", type="string", length=255, nullable=true)
     */
    private $organe;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(name="date_vote", type="datetime", nullable=true, options={"comment"="Date du dernier vote"})
     */
    private $dateVote;

    

    /**
     * Get the value of nn
     */
    public function getNn(): string
    {
        return $this->nn;
    }

    /**
     * Set the value of nn
     */
    public function setNn(string $nn): self
    {
        $this->nn = $nn;

        return $this;
    }

    /**
     * Get the value of referentiel
     */
    public function getReferentiel(): string
    {
        return $this->referentiel;
    }

    /**
     * Set the value of referentiel
     */
    public function setReferentiel(string $referentiel): self
    {
        $this->referentiel = $referentiel;

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
     * Get the value of organe
     */
    public function getOrgane(): ?string
    {
        return $this->organe;
    }

    /**
     * Set the value of organe
     */
    public function setOrgane(?string $organe): self
    {
        $this->organe = $organe;

        return $this;
    }

    /**
     * Get the value of dateVote
     */
    public function getDateVote(): ?\DateTimeImmutable
    {
        return $this->dateVote;
    }

    /**
     * Set the value of dateVote
     */
    public function setDateVote(?\DateTimeImmutable $dateVote): self
    {
        $this->dateVote = $dateVote;

        return $this;
    }
}
