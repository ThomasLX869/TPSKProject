<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalcHomeController extends AbstractController
{
    /**
     * @Route("/home/calc", name="home_calc")
     */
    public function index(): Response
    {
        return $this->render('calc_home/index.html.twig', [
            'controller_name' => 'CalcHomeController',
        ]);
    }
}
