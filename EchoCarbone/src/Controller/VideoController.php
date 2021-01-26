<?php

namespace App\Controller;

use App\Entity\Video;
use App\Form\VideoType;
use App\Repository\VideoRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/video")
 */
class VideoController extends AbstractController
{
//    /**
//     * @Route("/", name="video_index", methods={"GET"})
//     * @IsGranted("ROLE_AUTHOR")
//     */
//    public function index(VideoRepository $videoRepository): Response
//    {
//        return $this->render('video/index.html.twig', [
//            'videos' => $videoRepository->findAll(),
//        ]);
//    }

    /**
     * @Route("/new", name="video_new", methods={"GET","POST"})
     * @IsGranted("ROLE_AUTHOR")
     */
    public function new(Request $request): Response
    {
        $video = new Video();
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($video);
            $entityManager->flush();
            $this->addFlash('success',"La vidéo a bien été ajoutée !");

            return $this->redirectToRoute('video_index');
        }

        return $this->render('video/new.html.twig', [
            'video' => $video,
            'form' => $form->createView(),
        ]);
    }

//    /**
//     * @Route("/{id}", name="video_show", methods={"GET"})
//     * @IsGranted("ROLE_AUTHOR")
//     */
//    public function show(Video $video): Response
//    {
//        return $this->render('video/show.html.twig', [
//            'video' => $video,
//        ]);
//    }

    /**
     * @Route("/{id}/edit", name="video_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_AUTHOR")
     */
    public function edit(Request $request, Video $video): Response
    {
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success',"La vidéo a bien été modifiée !");
            return $this->redirectToRoute('video_index');
        }

        return $this->render('video/edit.html.twig', [
            'video' => $video,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="video_delete", methods={"DELETE"})
     * @IsGranted("ROLE_AUTHOR")
     */
    public function delete(Request $request, Video $video): Response
    {
        if ($this->isCsrfTokenValid('delete'.$video->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($video);
            $this->addFlash('danger',"La vidéo a bien été supprimée !");
            $entityManager->flush();
        }

        return $this->redirectToRoute('video_index');
    }
}
