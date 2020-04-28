<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlmozosSueldoRepository")
 */
class BlmozosSueldo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sueldo;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Blmozo", inversedBy="sueldo", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $relation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSueldo(): ?int
    {
        return $this->sueldo;
    }

    public function setSueldo(?int $sueldo): self
    {
        $this->sueldo = $sueldo;

        return $this;
    }

    public function getRelation(): ?Blmozo
    {
        return $this->relation;
    }

    public function setRelation(Blmozo $relation): self
    {
        $this->relation = $relation;

        return $this;
    }
}
