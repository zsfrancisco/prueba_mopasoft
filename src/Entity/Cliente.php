<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 * @UniqueEntity(fields={"cedula_cliente"}, message="Ya está registrado un cliente con esta cédula")
 */
class Cliente
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombres_cliente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellidos_cliente;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $cedula_cliente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correo_cliente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $direccion_cliente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefono_cliente;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombresCliente(): ?string
    {
        return $this->nombres_cliente;
    }

    public function setNombresCliente(string $nombres_cliente): self
    {
        $this->nombres_cliente = $nombres_cliente;

        return $this;
    }

    public function getApellidosCliente(): ?string
    {
        return $this->apellidos_cliente;
    }

    public function setApellidosCliente(string $apellidos_cliente): self
    {
        $this->apellidos_cliente = $apellidos_cliente;

        return $this;
    }

    public function getCedulaCliente(): ?string
    {
        return $this->cedula_cliente;
    }

    public function setCedulaCliente(string $cedula_cliente): self
    {
        $this->cedula_cliente = $cedula_cliente;

        return $this;
    }

    public function getCorreoCliente(): ?string
    {
        return $this->correo_cliente;
    }

    public function setCorreoCliente(string $correo_cliente): self
    {
        $this->correo_cliente = $correo_cliente;

        return $this;
    }

    public function getDireccionCliente(): ?string
    {
        return $this->direccion_cliente;
    }

    public function setDireccionCliente(string $direccion_cliente): self
    {
        $this->direccion_cliente = $direccion_cliente;

        return $this;
    }

    public function getTelefonoCliente(): ?string
    {
        return $this->telefono_cliente;
    }

    public function setTelefonoCliente(string $telefono_cliente): self
    {
        $this->telefono_cliente = $telefono_cliente;

        return $this;
    }
}
