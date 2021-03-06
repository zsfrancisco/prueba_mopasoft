<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Reserva;
use App\Repository\ReservaRepository;

use App\Entity\Sala;
use App\Repository\SalaRepository;

use Symfony\Component\HttpFoundation\Response;

class InicioController extends AbstractController
{
    /**
     * @Route("/", name="inicio")
     */
    public function index(ReservaRepository $reservaRepository, SalaRepository $salaRepository): Response
    {
        return $this->render('inicio/index.html.twig', [
            'reservas' => $reservaRepository->findAll(),
            'salas' => $salaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/disponibilidad/{id}", name="disponibilidad")
     */
    public function disponibilidad_sala($id, ReservaRepository $reservaRepository): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $sala = $entityManager->getRepository(Reserva::class)->findBy(
            ['sala' => $id],
            ['hora_fin_reserva' => 'ASC']
            );
        if (!$sala) {
            throw $this->createNotFoundException(
                'Esta sala se encuentra disponible durante todo el día. '.$id
            );
        }
        return $this->render('inicio/disponibilidad.html.twig', [
            'sala' => $sala,
        ]);
    }
}
