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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;


}
