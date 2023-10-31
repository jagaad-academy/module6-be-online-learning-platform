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
