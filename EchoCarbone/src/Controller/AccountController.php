<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\AdminType;
use App\Repository\AdminRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account_index")
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(AdminRepository $adminRepository): Response
    {

        dump($admin = $adminRepository->findAll());

        return $this->render('account/index.html.twig', [
            'admins' => $adminRepository->findAll()
        ]);
    }

    /**
     * @Route("/account/new", name="account_create")
     * @IsGranted("ROLE_ADMIN")
     */
    public function create(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new Admin();

        $form = $this->createForm(AdminType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();

            $this->addFlash('success',"Bienvenue <strong>{$user->getPseudo()}</strong> !");

            return $this->redirectToRoute('home_index');
        }

        return $this->render('account/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/account/{slug}", name="account_profil")
     */
    public function show($slug , AdminRepository $adminRepository)
    {
        $user= $adminRepository->findOneBySlug($slug);

        return $this->render('account/show.html.twig', [
            'admin' => $user
        ]);
    }

    /**
     * @Route("/account/{slug}/edit", name="account_edit")
     * @IsGranted("ROLE_AUTHOR")
     */
    public function edit(Request $request, Admin $user, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
    {
        $currentUser = $this->getUser();

//      Give access to user update form for admins or to the owner account
        foreach($currentUser->getRoles() as $role) {
            if (($role !== 'ROLE_ADMIN') && ($user !== $currentUser )){
                $this->addFlash('danger',
                    "Vous n'avez pas les droits pour accéder à ce formulaire !");
                return $this->redirectToRoute('home_index');
            }else{
                $form = $this->createForm(AdminType::class, $user);

                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {

                    $hash = $encoder->encodePassword($user, $user->getPassword());
                    $user->setPassword($hash);

                    $manager->flush();

                    $this->addFlash('info',
                        "<strong>{$user->getPseudo()}</strong> votre profil a bien été modifié");

                    return $this->redirectToRoute('account_profil' , [
                        'slug' => $user->getSlug()
                    ]);
                }
            }
        }

        return $this->render('account/edit.html.twig', [
            'admin' => $user,
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/account/{slug}/delete", name="account_delete")
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(EntityManagerInterface $manager, Admin $user)
    {
        $manager->remove($user);
        $manager->flush();

        $this->addFlash('danger',"Utilisateur supprimé !");

        return $this->redirectToRoute('home_index');
    }


}


