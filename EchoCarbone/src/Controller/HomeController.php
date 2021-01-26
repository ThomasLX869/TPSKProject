<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home_index")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/home/rgpd", name="rgpd_view")
     */
    public function rgpd(): Response
    {
        return $this->render('home/rgpd.html.twig');
    }


    /**
     * @Route("/home/presentation", name="presentation_view")
     */
    public function presentation(): Response
    {
        return $this->render('home/presentation.html.twig');
    }



    /**
     * @Route("/home/contact", name="contact_view")
     */
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig');
    }


}
