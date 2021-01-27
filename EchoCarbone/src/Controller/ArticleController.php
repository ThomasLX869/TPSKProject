<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\GameRepository;
use App\Repository\QuizzRepository;
use App\Repository\VideoRepository;
use App\Repository\ArticleRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository, GameRepository $gameRepository, VideoRepository $videoRepository, QuizzRepository $quizzRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'articles' => $articleRepository->findAll(),
            'games' => $gameRepository->findAll(),
            'videos' => $videoRepository->findAll(),
            'quizzs' => $quizzRepository->findAll()
        ]);
    }

    /**
     * @Route("/manager", name="article_manager")
     * @IsGranted("ROLE_AUTHOR")
     */
    public function articleManager(ArticleRepository $articleRepository, GameRepository $gameRepository, VideoRepository $videoRepository, QuizzRepository $quizzRepository): Response
    {
        $user = $this->getUser();

//      Give access to all articles for admins or just access of his own articles for author
        foreach($user->getRoles() as $role){
            if($role == 'ROLE_ADMIN'){
                    $articles = $articleRepository->findAll();
                    $games= $gameRepository->findAll();
                    $videos = $videoRepository->findAll();
                    $quizz = $quizzRepository->findAll();
            }else{
                $articles = $articleRepository->findByAuthor($user->getId());
                $games = $gameRepository->findByAuthor($user->getId());
                $videos = $videoRepository->findByAuthor($user->getId());
                $quizz = $quizzRepository->findByAuthor($user->getId());
            }
        }

        return $this->render('article/articleManager.html.twig', [
            'articles' => $articles,
            'games' => $games,
            'videos' => $videos,
            'quizzs' => $quizz
        ]);
    }

    /**
     * @Route("/new", name="article_new", methods={"GET","POST"})
     * @IsGranted("ROLE_AUTHOR")
     */
    public function new(Request $request, UserInterface $user): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $article->setAuthor($user);
            $entityManager->persist($article);
            $entityManager->flush();

            $this->addFlash('success',"Nouvel article <strong>{$article->getTitle()}</strong> créé !");

            return $this->redirectToRoute('article_index');
        }

        return $this->render('article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}", name="article_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_AUTHOR")
     */
    public function edit(Request $request, Article $article, UserInterface $user): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article->setAuthor($user);
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success',"L'article <strong>{$article->getTitle()}</strong> créé !");
            return $this->redirectToRoute('article_index');
        }

        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }




    /**
     * @Route("/{id}", name="article_delete", methods={"DELETE"})
     * @IsGranted("ROLE_AUTHOR")
     */
    public function delete(Request $request, Article $article): Response
    {
        if ($this->isCsrfTokenValid('delete' . $article->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
            $this->addFlash('danger',"L'article a bien été supprimé !");
        }

        return $this->redirectToRoute('article_index');
    }
}
