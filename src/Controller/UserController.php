<?php
namespace App\Controller;
use App\Entity\User;
use App\Form\ProfileUserType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
#[Route('/mon_profil', name:'user_profil')]
    public function index(UserInterface $user, Request $request, EntityManagerInterface $entityManager ): Response 
    {
      $form=  $this->createForm(ProfileUserType::class, $user);
      $form->handleRequest($request);
      if( $form->isSubmitted() && $form->isValid())
      { 
      $entityManager->flush();
      }
       return $this->render('/mon_profil.html.twig',["form"=>$form]);
    }
  /*  public function delete(Request $request, $id)
    {
        $form = $this->DeleteForm("id");
        $form->submit($request);
            $em->remove($entity);
            $em->flush();
     }
        return $this->redirect('/mon_profil.html.twig');*/
    
}