<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class YouthHomeController extends AbstractController
{
    /**
     * @Route("/youth/home", name="youth_home")
     */
    public function index(): Response
    {
        return $this->render('youth_home/index.html.twig', [
            'controller_name' => 'YouthHomeController',
        ]);
    }
}
