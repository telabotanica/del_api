<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DelImageProtocole
 *
 * @ORM\Table(name="del_image_protocole")
 * @ORM\Entity
 */
class DelImageProtocole
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_protocole", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProtocole;

    /**
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=255, nullable=false)
     */
    private $intitule;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descriptif", type="text", length=65535, nullable=true)
     */
    private $descriptif;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=255, nullable=false)
     */
    private $tag;

    /**
     * @var string
     *
     * @ORM\Column(name="mots_cles", type="string", length=600, nullable=false)
     */
    private $motsCles;

    /**
     * @var bool
     *
     * @ORM\Column(name="identifie", type="boolean", nullable=false)
     */
    private $identifie;

    public function getIdProtocole(): ?int
    {
        return $this->idProtocole;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): static
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): static
    {
        $this->descriptif = $descriptif;

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

    public function getMotsCles(): ?string
    {
        return $this->motsCles;
    }

    public function setMotsCles(string $mots_cles): static
    {
        $this->motsCles = $mots_cles;

        return $this;
    }

    public function isIdentifie(): ?bool
    {
        return $this->identifie;
    }

    public function setIdentifie(bool $identifie): static
    {
        $this->identifie = $identifie;

        return $this;
    }
}
