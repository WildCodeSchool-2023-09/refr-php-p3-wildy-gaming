<?php

namespace App\Controller;

use App\Entity\Lots;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/lots', name: 'Lots_')]
class LotsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('lots/index.html.twig');
    }
}
