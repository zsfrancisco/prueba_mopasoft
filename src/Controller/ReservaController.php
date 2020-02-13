<?php

namespace App\Controller;

use App\Entity\Reserva;
use App\Form\ReservaType;
use App\Repository\ReservaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reserva")
 */
class ReservaController extends AbstractController
{
    /**
     * @Route("/", name="reserva_index", methods={"GET"})
     */
    public function index(ReservaRepository $reservaRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        return $this->render('reserva/index.html.twig', [
            'reservas' => $reservaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="reserva_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        $reserva = new Reserva();
        $form = $this->createForm(ReservaType::class, $reserva);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reserva);
            $entityManager->flush();

            return $this->redirectToRoute('reserva_index');
        }

        return $this->render('reserva/new.html.twig', [
            'reserva' => $reserva,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reserva_show", methods={"GET"})
     */
    public function show(Reserva $reserva): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        return $this->render('reserva/show.html.twig', [
            'reserva' => $reserva,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reserva_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Reserva $reserva): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        $form = $this->createForm(ReservaType::class, $reserva);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reserva_index');
        }

        return $this->render('reserva/edit.html.twig', [
            'reserva' => $reserva,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reserva_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Reserva $reserva): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        if ($this->isCsrfTokenValid('delete'.$reserva->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reserva);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reserva_index');
    }
}
