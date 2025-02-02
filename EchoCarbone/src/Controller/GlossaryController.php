<?php

namespace App\Controller;

use App\Entity\Glossary;
use App\Form\GlossaryType;
use App\Repository\GlossaryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/glossary")
 */
class GlossaryController extends AbstractController
{
    /**
     * @Route("/", name="glossary_index", methods={"GET"})
     */
    public function index(GlossaryRepository $glossaryRepository): Response
    {
        // return $this->render('glossary/index.html.twig', [
        //     'glossaries' => $glossaryRepository->findAll(),
        // ]);

        return $this->render('glossary/index.html.twig');
    }

    // /**
    //  * @Route("/new", name="glossary_new", methods={"GET","POST"})
    //  */
    // public function new(Request $request): Response
    // {
    //     $glossary = new Glossary();
    //     $form = $this->createForm(GlossaryType::class, $glossary);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($glossary);
    //         $entityManager->flush();
    //         $this->addFlash('success',"L'élément a bien été ajouté !");
    //         return $this->redirectToRoute('glossary_index');
    //     }

    //     return $this->render('glossary/new.html.twig', [
    //         'glossary' => $glossary,
    //         'form' => $form->createView(),
    //     ]);
    // }

    // /**
    //  * @Route("/{id}", name="glossary_show", methods={"GET"})
    //  */
    // public function show(Glossary $glossary): Response
    // {
    //     return $this->render('glossary/show.html.twig', [
    //         'glossary' => $glossary,
    //     ]);
    // }


    // /**
    //  * @Route("/{id}/edit", name="glossary_edit", methods={"GET","POST"})
    //  */
    // public function edit(Request $request, Glossary $glossary): Response
    // {
    //     $form = $this->createForm(GlossaryType::class, $glossary);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $this->getDoctrine()->getManager()->flush();
    //         $this->addFlash('success',"L'élément a bien été modifié !");
    //         return $this->redirectToRoute('glossary_index');
    //     }

    //     return $this->render('glossary/edit.html.twig', [
    //         'glossary' => $glossary,
    //         'form' => $form->createView(),
    //     ]);
    // }


    // /**
    //  * @Route("/{id}", name="glossary_delete", methods={"DELETE"})
    //  */
    // public function delete(Request $request, Glossary $glossary): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$glossary->getId(), $request->request->get('_token'))) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->remove($glossary);
    //         $entityManager->flush();
    //         $this->addFlash('danger',"L'élément a bien été supprimé !");
    //     }

   
}
