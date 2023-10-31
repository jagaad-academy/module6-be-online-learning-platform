<?php

namespace App\Controller;

use App\Repository\CoursesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(CoursesRepository $coursesRepository): Response
    {
        return $this->render('home_page/index.html.twig', [
            'title' => 'Jagaad Online Learning Platform',
            'courses' => $coursesRepository->findAll()
        ]);
    }
}
