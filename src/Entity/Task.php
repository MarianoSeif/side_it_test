<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 */
class Task
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *      message = "Ingrese un nombre"
     * )
     * @Assert\Type("string")
     * @Assert\Length(
     *      min = 1,
     *      max = 255,
     *      minMessage = "Ingrese un nombre para la tarea",
     *      maxMessage = "El maximo de caracteres es 255",
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *      message = "Ingrese una descripción"
     * )
     * @Assert\Type("string")
     * @Assert\Length(
     *      min = 1,
     *      max = 255,
     *      minMessage = "Ingrese un nombre para la tarea",
     *      maxMessage = "El maximo de caracteres es 255",
     * )
     */
    private $details;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $done_date;

    /**
     * @ORM\Column(type="date")
     */
    private $create_date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getDoneDate(): ?\DateTimeInterface
    {
        return $this->done_date;
    }

    public function setDoneDate(?\DateTimeInterface $done_date): self
    {
        $this->done_date = $done_date;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->create_date;
    }

    public function setCreateDate(\DateTimeInterface $create_date): self
    {
        $this->create_date = $create_date;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
