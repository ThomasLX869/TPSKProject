<?php

namespace App\Controller;

use App\Entity\Quizz;
use App\Form\QuizzType;
use App\Repository\AgeRangeRepository;
use App\Repository\CategoryRepository;
use App\Repository\QuizzRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/quizz")
 */
class QuizzController extends AbstractController
{
    /**
     * @Route("/", name="quizz_index", methods={"GET"})
     */
    public function index(QuizzRepository $gameRepository, CategoryRepository $categoryRepository, AgeRangeRepository $ageRangeRepository): Response
    {
        return $this->render('quizz/index.html.twig', [
            'quizzs' => $gameRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
            'ageRanges' => $ageRangeRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="quizz_new", methods={"GET","POST"})
     * @IsGranted("ROLE_AUTHOR")
     */
    public function new(Request $request): Response
    {
        $quizz = new Quizz();
        $form = $this->createForm(QuizzType::class, $quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($quizz);
            $entityManager->flush();
            $this->addFlash('success',"Le quizz a bien été ajouté !");
            return $this->redirectToRoute('article_manager');
        }

        return $this->render('quizz/new.html.twig', [
            'quizz' => $quizz,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}", name="quizz_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_AUTHOR")
     */
    public function edit(Request $request, Quizz $quizz): Response
    {
        $form = $this->createForm(QuizzType::class, $quizz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success',"Le quizz a bien été modifié !");
            return $this->redirectToRoute('article_manager');
        }

        return $this->render('quizz/edit.html.twig', [
            'quizz' => $quizz,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/del/{id}", name="quizz_delete", methods={"POST"})
     * @IsGranted("ROLE_AUTHOR")
     */
    public function delete(Request $request, Quizz $quizz): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quizz->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($quizz);
            $entityManager->flush();
            $this->addFlash('danger',"Le quizz a bien été supprimé !");
        }

        return $this->redirectToRoute('article_manager');
    }
}
