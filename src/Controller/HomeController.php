<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends AbstractController
{



/**
     * @Route("/lettre", name="app_lettre")
     */
    public function lettre(): Response
    {
        return $this->render('home/lettre.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }




/**
     * @Route("/alerte", name="app_alte")
     */
    public function alerte(): Response
    {
        return $this->render('home/alerte.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

/**
     * @Route("/offredemploi", name="app_offredemploi")
     */
    public function offredemploi(): Response
    {
        return $this->render('home/offredemploi.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

  /**
     * @Route("/moncv", name="app_moncv")
     */
    public function moncv(): Response
    {
        return $this->render('home/moncv.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

   /**
     * @Route("/inscription", name="app_inscription")
     */
    public function iscription(
        Request $request,
        EntityManagerInterface $manager,
        UserPasswordEncoderInterface $encoder
    )

    {

        $user = new User();

        $form = $this->createForm(RegistrationFormType::class, $user);
        echo($request);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $hash=$encoder->encodePassword($user,"azerty");
            $user->setPassword($hash);
            $user->setEmail('oo@gmail.com');
            $manager->persist($user);
            $manager->flush();
            // $this->addFlash(
            //     'success',
            //     'Inscription réussi,un mail de validation vous a été envoyé sur '.$user->getEmail()
            // );
        }

      
        return $this->render('home/inscription.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


       /**
     * @Route("/compte", name="app_compte")
     */
    public function compte(): Response
    {
        return $this->render('home/compte.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

   /**
     * @Route("/connexion", name="app_connect")
     */
    public function connexion(): Response
    {
        return $this->render('home/connexion.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
