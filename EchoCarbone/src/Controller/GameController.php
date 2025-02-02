<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameType;
use App\Repository\AgeRangeRepository;
use App\Repository\CategoryRepository;
use App\Repository\GameRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/game")
 */
class GameController extends AbstractController
{
    /**
     * @Route("/", name="game_index", methods={"GET"})
     */
    public function index(GameRepository $gameRepository, CategoryRepository $categoryRepository, AgeRangeRepository $ageRangeRepository): Response
    {
        return $this->render('game/index.html.twig', [
            'games' => $gameRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
            'ageRanges' => $ageRangeRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="game_new", methods={"GET","POST"})
     * @IsGranted("ROLE_AUTHOR")
     */
    public function new(Request $request): Response
    {
        $game = new Game();
        $form = $this->createForm(GameType::class, $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
             // $game->setAuthor($this->getUser());
            $entityManager->persist($game);
            $entityManager->flush();
            $this->addFlash('success',"Le jeu a bien été ajouté !");
            return $this->redirectToRoute('article_manager');
        }

        return $this->render('game/new.html.twig', [
            'game' => $game,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}", name="game_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_AUTHOR")
     */
    public function edit(Request $request, Game $game): Response
    {
        $form = $this->createForm(GameType::class, $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success',"Le jeu a bien été modifié !");
            return $this->redirectToRoute('article_manager');
        }

        return $this->render('game/edit.html.twig', [
            'game' => $game,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/del/{id}", name="game_delete", methods={"POST"})
     * @IsGranted("ROLE_AUTHOR")
     */
    public function delete(Request $request, Game $game): Response
    {
        if ($this->isCsrfTokenValid('delete'.$game->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($game);
            $entityManager->flush();
            $this->addFlash('danger',"Le jeu a bien été supprimé !");
        }

        return $this->redirectToRoute('article_manager');
    }
}
