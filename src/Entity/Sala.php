<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalaRepository")
 * @UniqueEntity(fields={"nombre_sala"}, message="Ya está registrado un cliente con esta cédula")
 */
class Sala
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $nombre_sala;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreSala(): ?string
    {
        return $this->nombre_sala;
    }

    public function setNombreSala(string $nombre_sala): self
    {
        $this->nombre_sala = $nombre_sala;

        return $this;
    }
}
