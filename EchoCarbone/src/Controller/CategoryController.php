<?php

namespace App\Controller;

use App\Entity\AgeRange;
use App\Entity\Category;
use App\Form\AgeRangeType;
use App\Form\CategoryType;
use App\Repository\AgeRangeRepository;
use App\Repository\CategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sort")
 * @IsGranted("ROLE_ADMIN")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="category_index", methods={"GET"})
     */
    public function index(CategoryRepository $categoryRepository,AgeRangeRepository $ageRangeRepository): Response
    {
        return $this->render('category/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'ageRanges' => $ageRangeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/newcat", name="category_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();
            return $this->redirectToRoute('category_index');
        }
        return $this->render('category/new.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/editcat", name="category_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Category $category): Response
    {
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success',"La catégorie a bien été modfiée !");
            return $this->redirectToRoute('category_index');
        }

        return $this->render('category/edit.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delcat/{id}", name="category_delete", methods={"POST"})
     */
    public function delete(Request $request, Category $category): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($category);
            $entityManager->flush();
        }
        return $this->redirectToRoute('category_index');
    }



///////////////////////////////////////////////////////////////////////////////////////////////////////////
/// //////////////////////////              AGE RANGE               ///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * @Route("/newage", name="age_range_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function newAge(Request $request): Response
    {
        $ageRange = new AgeRange();
        $form = $this->createForm(AgeRangeType::class, $ageRange);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ageRange);
            $entityManager->flush();
            $this->addFlash('success',"La tranche d'âge a bien été ajoutée !");
            return $this->redirectToRoute('category_index');
        }

        return $this->render('age_range/new.html.twig', [
            'age_range' => $ageRange,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/editage", name="age_range_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function editAge(Request $request, AgeRange $ageRange): Response
    {
        $form = $this->createForm(AgeRangeType::class, $ageRange);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success',"La tranche d'âge a bien été modifiée !");
            return $this->redirectToRoute('category_index');
        }

        return $this->render('age_range/edit.html.twig', [
            'age_range' => $ageRange,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/del/{id}", name="age_range_delete", methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function deleteAge(Request $request, AgeRange $ageRange): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ageRange->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ageRange);
            $entityManager->flush();
            $this->addFlash('danger',"La tranche d'âge a bien été supprimée !");
        }
        return $this->redirectToRoute('category_index');
    }



}
