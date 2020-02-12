<?php

namespace App\Controller;

use App\Entity\Sala;
use App\Form\SalaType;
use App\Repository\SalaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sala")
 */
class SalaController extends AbstractController
{
    /**
     * @Route("/", name="sala_index", methods={"GET"})
     */
    public function index(SalaRepository $salaRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        return $this->render('sala/index.html.twig', [
            'salas' => $salaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sala_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        $sala = new Sala();
        $form = $this->createForm(SalaType::class, $sala);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sala);
            $entityManager->flush();

            return $this->redirectToRoute('sala_index');
        }

        return $this->render('sala/new.html.twig', [
            'sala' => $sala,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sala_show", methods={"GET"})
     */
    public function show(Sala $sala): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        return $this->render('sala/show.html.twig', [
            'sala' => $sala,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sala_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sala $sala): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        $form = $this->createForm(SalaType::class, $sala);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sala_index');
        }

        return $this->render('sala/edit.html.twig', [
            'sala' => $sala,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sala_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sala $sala): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        if ($this->isCsrfTokenValid('delete'.$sala->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sala);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sala_index');
    }
}
