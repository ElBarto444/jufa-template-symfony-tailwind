<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use App\Services\StarCounter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CourseRepository $courseRepository): Response
    {
        $courses = $courseRepository->findBy([], ['id' => 'DESC'], 6);
        $starCounter = new StarCounter();

        return $this->render('/home/home.html.twig', [
            'controller_name' => 'HomeController',
            'courses' => $courses,
            'starCounter' => $starCounter,
        ]);
    }
}
