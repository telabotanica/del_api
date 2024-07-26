<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DelImageStat
 *
 * @ORM\Table(name="del_image_stat", indexes={@ORM\Index(name="ce_image", columns={"ce_image"}), @ORM\Index(name="ce_protocole", columns={"ce_protocole", "moyenne"}), @ORM\Index(name="nb_votes", columns={"nb_votes"}), @ORM\Index(name="nb_tags", columns={"nb_tags"}), @ORM\Index(name="moyenne", columns={"moyenne"})})
 * @ORM\Entity
 */
class DelImageStat
{
    /**
     * @var int
     *
     * @ORM\Column(name="ce_image", type="bigint", nullable=false, options={"comment"="id_image (tb_cel.cel_images)"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ceImage;

    /**
     * @var bool
     *
     * @ORM\Column(name="ce_protocole", type="boolean", nullable=false, options={"comment"="un id de protocole"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ceProtocole = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="moyenne", type="float", precision=10, scale=0, nullable=false, options={"comment"="moyenne des votes pour une image et un protocole donnÃ©"})
     */
    private $moyenne = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="nb_votes", type="smallint", nullable=false, options={"unsigned"=true,"comment"="nombre de votes pour une image et un protocole donnÃ©"})
     */
    private $nbVotes = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="nb_points", type="integer", nullable=false)
     */
    private $nbPoints = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="nb_tags", type="boolean", nullable=false, options={"comment"="nombre de tags pictoflora pour une image donnÃ©e"})
     */
    private $nbTags = '0';

    public function getCeImage(): ?int
    {
        return $this->ceImage;
    }

    public function isCeProtocole(): ?int
    {
        return $this->ceProtocole;
    }

    public function setCeProtocole(int $ce_protocole): static
    {
        $this->ceProtocole = $ce_protocole;

        return $this;
    }

    public function getMoyenne(): ?float
    {
        return $this->moyenne;
    }

    public function setMoyenne(float $moyenne): static
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    public function getNbVotes(): ?int
    {
        return $this->nbVotes;
    }

    public function setNbVotes(int $nb_votes): static
    {
        $this->nbVotes = $nb_votes;

        return $this;
    }

    public function getNbPoints(): ?int
    {
        return $this->nbPoints;
    }

    public function setNbPoints(int $nb_points): static
    {
        $this->nbPoints = $nb_points;

        return $this;
    }

    public function isNbTags(): ?int
    {
        return $this->nbTags;
    }

    public function setNbTags(int $nb_tags): static
    {
        $this->nbTags = $nb_tags;

        return $this;
    }
}
