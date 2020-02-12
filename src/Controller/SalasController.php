<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SalasController extends AbstractController
{
    /**
     * @Route("/", name="salas")
     */
    public function index()
    {
        return $this->render('salas/index.html.twig', [
            'controller_name' => 'SalasController',
        ]);
    }
}
