<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DelImageTag
 *
 * @ORM\Table(name="del_image_tag", indexes={@ORM\Index(name="ce_utilisateur", columns={"ce_utilisateur"}), @ORM\Index(name="tag", columns={"tag"}), @ORM\Index(name="tag_normalise", columns={"tag_normalise"}), @ORM\Index(name="ce_image", columns={"ce_image"})})
 * @ORM\Entity
 */
class DelImageTag
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

    public function getIdTag(): ?int
    {
        return $this->idTag;
    }

    public function getCeImage(): ?string
    {
        return $this->ceImage;
    }

    public function setCeImage(string $ce_image): static
    {
        $this->ceImage = $ce_image;

        return $this;
    }

    public function getCeUtilisateur(): ?string
    {
        return $this->ceUtilisateur;
    }

    public function setCeUtilisateur(?string $ce_utilisateur): static
    {
        $this->ceUtilisateur = $ce_utilisateur;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): static
    {
        $this->tag = $tag;

        return $this;
    }

    public function getTagNormalise(): ?string
    {
        return $this->tagNormalise;
    }

    public function setTagNormalise(string $tag_normalise): static
    {
        $this->tagNormalise = $tag_normalise;

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

    public function getActif(): ?int
    {
        return $this->actif;
    }

    public function setActif(int $actif): static
    {
        $this->actif = $actif;

        return $this;
    }

    public function getDateModification(): ?\DateTimeImmutable
    {
        return $this->dateModification;
    }

    public function setDateModification(?\DateTimeImmutable $date_modification): static
    {
        $this->dateModification = $date_modification;

        return $this;
    }

}
