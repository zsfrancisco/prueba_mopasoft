<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservaRepository")
 */
class Reserva
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sala", inversedBy="reservas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sala;

    /**
     * @ORM\Column(type="integer")
     */
    private $hora_inicio_reserva;

    /**
     * @ORM\Column(type="integer")
     */
    private $hora_fin_reserva;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="reservas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente_reserva;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSala(): ?Sala
    {
        return $this->sala;
    }

    public function setSala(?Sala $sala): self
    {
        $this->sala = $sala;

        return $this;
    }

    public function getHoraInicioReserva(): ?int
    {
        return $this->hora_inicio_reserva;
    }

    public function setHoraInicioReserva(int $hora_inicio_reserva): self
    {
        $this->hora_inicio_reserva = $hora_inicio_reserva;

        return $this;
    }

    public function getHoraFinReserva(): ?int
    {
        return $this->hora_fin_reserva;
    }

    public function setHoraFinReserva(int $hora_fin_reserva): self
    {
        $this->hora_fin_reserva = $hora_fin_reserva;

        return $this;
    }

    public function getClienteReserva(): ?Cliente
    {
        return $this->cliente_reserva;
    }

    public function setClienteReserva(?Cliente $cliente_reserva): self
    {
        $this->cliente_reserva = $cliente_reserva;

        return $this;
    }
}
