<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UserController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function index(): Response
    {
        /** @var Users $user */
        $user = $this->getUser();
        return $this->render('user/index.html.twig', [
            'user' => $user,
            'title' => 'Profile of ' . $user->getUsername()
        ]);
    }

    #[Route('/users/all', name: 'app_all_users')]
    #[IsGranted('ROLE_INSTRUCTOR')]
    public function users(UsersRepository $usersRepository): Response
    {
//        $this->denyAccessUnlessGranted('ROLE_INSTRUCTOR');
        $users = $usersRepository->findAll();
        return $this->render('user/all.html.twig', [
            'users' => $users
        ]);
    }
}
