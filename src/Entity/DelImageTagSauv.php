<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DelImageTagSauv
 *
 * @ORM\Table(name="del_image_tag_sauv", indexes={@ORM\Index(name="tag", columns={"tag"}), @ORM\Index(name="tag_normalise", columns={"tag_normalise"}), @ORM\Index(name="ce_image", columns={"ce_image"}), @ORM\Index(name="ce_utilisateur", columns={"ce_utilisateur"})})
 * @ORM\Entity
 */
class DelImageTagSauv
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tag", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTag;

    /**
     * @var int
     *
     * @ORM\Column(name="ce_image", type="bigint", nullable=false)
     */
    private $ceImage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ce_utilisateur", type="string", length=64, nullable=true)
     */
    private $ceUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=255, nullable=false)
     */
    private $tag;

    /**
     * @var string
     *
     * @ORM\Column(name="tag_normalise", type="string", length=255, nullable=false)
     */
    private $tagNormalise;

    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP","comment"="Date de création du tag."})
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="actif", type="integer", nullable=false)
     */
    private $actif;

    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(name="date_modification", type="datetime", nullable=true)
     */
    private $dateModification;
    
    

    /**
     * Get the value of idTag
     */
    public function getIdTag(): int
    {
        return $this->idTag;
    }

    /**
     * Set the value of idTag
     */
    public function setIdTag(int $idTag): self
    {
        $this->idTag = $idTag;

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
     * Get the value of ceUtilisateur
     */
    public function getCeUtilisateur(): ?string
    {
        return $this->ceUtilisateur;
    }

    /**
     * Set the value of ceUtilisateur
     */
    public function setCeUtilisateur(?string $ceUtilisateur): self
    {
        $this->ceUtilisateur = $ceUtilisateur;

        return $this;
    }

    /**
     * Get the value of tag
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * Set the value of tag
     */
    public function setTag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get the value of tagNormalise
     */
    public function getTagNormalise(): string
    {
        return $this->tagNormalise;
    }

    /**
     * Set the value of tagNormalise
     */
    public function setTagNormalise(string $tagNormalise): self
    {
        $this->tagNormalise = $tagNormalise;

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

    /**
     * Get the value of actif
     */
    public function getActif(): int
    {
        return $this->actif;
    }

    /**
     * Set the value of actif
     */
    public function setActif(int $actif): self
    {
        $this->actif = $actif;

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
}
