<?php
namespace App\Controller;
use App\Entity\User;
use App\Form\ProfileUserType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class UserController extends AbstractController
{
#[Route('/mon_profil/{id}', name:'user_profil')]
    public function index(User $user, Request $request, EntityManagerInterface $entityManager ): Response 
    {
      $form=  $this->createForm(ProfileUserType::class, $user);
      $form->handleRequest($request);
      if( $form->isSubmitted() && $form->isValid())
      { 
      $entityManager->flush();
      }
       return $this->render('/mon_profil.html.twig',["form"=>$form]);  
    }

    #[Route('/user/{id}', name:'user_delete', methods:['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $em, TokenStorageInterface $token): Response
    {
        if($this->isCsrfTokenValid($user->getId(),$request->request->get('_token'))){
          $token->setToken(null);
          $em->remove($user);
          $em->flush();
      }
      return $this->redirectToRoute('app_login',[], Response::HTTP_SEE_OTHER);     
    }  
}