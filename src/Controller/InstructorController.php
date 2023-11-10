<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Instructor;
use App\Repository\InstructorRepository;
use App\Services\StarCounter;

class InstructorController extends AbstractController
{
    #[Route('/instructor', name: 'app_instructor', methods: ['GET'])]
    public function index(InstructorRepository $instructorRepository): Response
    {
        $instructors = $instructorRepository->findAll();

        $starCounter = new StarCounter();

        return $this->render('instructor/index.html.twig', [
            'instructors' => $instructors,
            'starCounter' => $starCounter,
        ]);
    }

    #[Route('/instructor/show/{id}', name: 'app_instructor_show')]
    public function show(Instructor $instructor): Response
    {

        $starCounter = new StarCounter();

        return $this->render('instructor/show.html.twig', [
            'instructor' => $instructor,
            'starCounter' => $starCounter,
        ]);
    }
}
