<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Table(name: "del_observation_modif_date",options:["engine"=>"InnoDB"])]
#[ORM\Entity()]

class DelObservationModifDate
{
    #[Groups(['modif_date'])]
    #[ORM\Column(name: "id_observation", type: "bigint", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private ?int $id_observation = null;

    #[ORM\ManyToOne(inversedBy: 'modif_dates',fetch:"EAGER")]
    #[ORM\JoinColumn(nullable: true,name:"id_observation",referencedColumnName:"id_observation")]
    private ?DelObservation $observation = null;

    #[Groups(['modif_date'])]
    #[ORM\Column(name: "modif_date", type: "datetime", nullable: true,options:["default" => "CURRENT_TIMESTAMP"])]
    private DateTime $modif_date;

    public function __construct(){
        
        $this->modif_date= new DateTime();

    }

    /**
     * Get the value of id_observation
     */
    public function getIdObservation(): ?int
    {
        return $this->id_observation;
    }

    /**
     * Set the value of id_observation
     */
    public function setIdObservation(?int $id_observation): self
    {
        $this->id_observation = $id_observation;

        return $this;
    }

    /**
     * Get the value of modif_date
     */
    public function getModifDate(): DateTime
    {
        return $this->modif_date;
    }

    /**
     * Set the value of modif_date
     */
    public function setModifDate(DateTime $modif_date): self
    {
        $this->modif_date = $modif_date;

        return $this;
    }

    /**
     * Get the value of observation
     */
    public function getObservation(): ?DelObservation
    {
        return $this->observation;
    }

    /**
     * Set the value of observation
     */
    public function setObservation(?DelObservation $observation): self
    {
        $this->observation = $observation;

        return $this;
    }
}
