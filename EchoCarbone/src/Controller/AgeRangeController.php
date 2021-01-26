<?php

namespace App\Controller;

use App\Entity\AgeRange;
use App\Form\AgeRangeType;
use App\Repository\AgeRangeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/age/range")
 */
class AgeRangeController extends AbstractController
{
    /**
     * @Route("/", name="age_range_index", methods={"GET"})
     */
    public function index(AgeRangeRepository $ageRangeRepository): Response
    {
        return $this->render('age_range/index.html.twig', [
            'age_ranges' => $ageRangeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="age_range_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ageRange = new AgeRange();
        $form = $this->createForm(AgeRangeType::class, $ageRange);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ageRange);
            $entityManager->flush();

            return $this->redirectToRoute('age_range_index');
        }

        return $this->render('age_range/new.html.twig', [
            'age_range' => $ageRange,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="age_range_show", methods={"GET"})
     */
    public function show(AgeRange $ageRange): Response
    {
        return $this->render('age_range/show.html.twig', [
            'age_range' => $ageRange,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="age_range_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AgeRange $ageRange): Response
    {
        $form = $this->createForm(AgeRangeType::class, $ageRange);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('age_range_index');
        }

        return $this->render('age_range/edit.html.twig', [
            'age_range' => $ageRange,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="age_range_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AgeRange $ageRange): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ageRange->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ageRange);
            $entityManager->flush();
        }

        return $this->redirectToRoute('age_range_index');
    }
}
