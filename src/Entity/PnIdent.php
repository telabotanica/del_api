<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PnIdent
 *
 * @ORM\Table(name="pn_ident", indexes={@ORM\Index(name="fk_del_obs", columns={"ce_obs"})})
 * @ORM\Entity
 */
class PnIdent
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ce_obs", type="bigint", nullable=true)
     */
    private $ceObs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_sci", type="string", length=128, nullable=true)
     */
    private $nomSci;

    

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of ceObs
     */
    public function getCeObs(): ?int
    {
        return $this->ceObs;
    }

    /**
     * Set the value of ceObs
     */
    public function setCeObs(?int $ceObs): self
    {
        $this->ceObs = $ceObs;

        return $this;
    }

    /**
     * Get the value of nomSci
     */
    public function getNomSci(): ?string
    {
        return $this->nomSci;
    }

    /**
     * Set the value of nomSci
     */
    public function setNomSci(?string $nomSci): self
    {
        $this->nomSci = $nomSci;

        return $this;
    }
}
