<?php
namespace App\Controller;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\form;



class UserController extends AbstractController
{
#[Route('/mon_profil', name:'user_profil')]
    public function index(): Response 
    {
        
        $formUser -> $this -> createForm(User::class);
       return $this->render('/mon_profil.html.twig');
    }
}