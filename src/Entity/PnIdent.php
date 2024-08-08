<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * DelObservation
 */
#[ORM\Table(name: "pn_ident",options:["engine"=>"InnoDB"])]
#[ORM\Index(name: "ce_obs", columns: ["ce_obs"])]
#[ORM\Entity()]

class PnIdent
{   
    #[ORM\Column(name: "id", type: "integer", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[Groups(['pn'])]
    private int $id;

    #[Groups(['pn'])]
    #[ORM\Column(name: "ce_obs", type: "bigint", nullable: true)]
    private ?int $ce_obs = null;

    #[Groups(['pn'])]
    #[ORM\Column(name: "nom_sci", type: "string", length: 128, nullable: true)]
    private ?string $nom_sci = null;

    

    public function __construct()
    {
        
    }

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
     * Get the value of ce_obs
     */
    public function getCeObs(): ?int
    {
        return $this->ce_obs;
    }

    /**
     * Set the value of ce_obs
     */
    public function setCeObs(?int $ce_obs): self
    {
        $this->ce_obs = $ce_obs;

        return $this;
    }

    /**
     * Get the value of nom_sci
     */
    public function getNomSci(): ?string
    {
        return $this->nom_sci;
    }

    /**
     * Set the value of nom_sci
     */
    public function setNomSci(?string $nom_sci): self
    {
        $this->nom_sci = $nom_sci;

        return $this;
    }
}
