<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GlossaryController extends AbstractController
{
    /**
     * @Route("/glossary", name="glossary")
     */
    public function index(): Response
    {
        return $this->render('glossary/index.html.twig', [
            'controller_name' => 'GlossaryController',
        ]);
    }
}
