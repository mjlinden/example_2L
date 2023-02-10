<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    #[Route('/lucky/number')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('bezoeker/number.html.twig',
            ['number'=>$number]);

    }

    #[Route('/')]
    public function morgenMeneerDeJong() {
        return new Response('<h1>goedemorgen</h1>');
    }

}