<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReveriesSp
 *
 * @ORM\Table(name="reveries_sp")
 * @ORM\Entity
 */
class ReveriesSp
{
    /**
     * @var int
     *
     * @ORM\Column(name="num_nom", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numNom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * Get the value of numNom
     */
    public function getNumNom(): int
    {
        return $this->numNom;
    }

    /**
     * Set the value of numNom
     */
    public function setNumNom(int $numNom): self
    {
        $this->numNom = $numNom;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
