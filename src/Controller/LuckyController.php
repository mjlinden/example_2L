<?php

namespace App\Controller;

use App\Repository\KlantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    #[Route('/lucky/number', name: 'lucky_number')]
    public function random_number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('bezoeker/number.html.twig',
            ['number'=>$number]);
    }

    #[Route('/lucky/number/{max}',name: 'app_lucky_you')]
    public function number(int $max):Response
    {
        $dagen=["maandag","dinsdag","woensdag","donderdag","vrijdag"];
        $number=random_int(0,$max);
        return $this->render('bezoeker/my_number.html.twig',
            ['number'=>$number,
                'days'=>$dagen]);
    }

    #[Route('/goedemorgen', name:'goede_morgen')]
    public function morgen(): Response {
        return new Response("<h1>Goedemorgen!!!</h1>");
    }

    #[Route('/lucky/{max}')]
    public function voorbeeld($max) {
        $number=random_int(0,$max);
        $dagen=["maandag","dinsdag","woensdag","donderdag","vrijdag","zaterdag","zondag"];
        return $this->render('bezoeker/voorbeeld.html.twig',
            ['number'=>$number,
                'dagen'=> $dagen]);
    }

    #[Route('/bestellingen')]
    public function besteloverzicht(KlantRepository $kl) {
            //dd($kl->findAll());
            return $this->render('bezoeker/bestellingen.html.twig',
                ['klanten'=>$kl->findAll()]);
    }

}