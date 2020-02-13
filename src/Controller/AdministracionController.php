<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdministracionController extends AbstractController
{

    /**
     * @Route("/administracion", name="administracion")
     */
    public function index()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        return $this->render('administracion/index.html.twig');
    }
}
