<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlmozoRepository")
 */
class Blmozo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\BlmozosSueldo", mappedBy="relation", cascade={"persist", "remove"})
     */
    private $sueldo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getSueldo(): ?BlmozosSueldo
    {
        return $this->sueldo;
    }

    public function setSueldo(BlmozosSueldo $sueldo): self
    {
        $this->sueldo = $sueldo;

        // set the owning side of the relation if necessary
        if ($sueldo->getRelation() !== $this) {
            $sueldo->setRelation($this);
        }

        return $this;
    }
}
