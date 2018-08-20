<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegisterController extends Controller
{
    /**
     * @Route("/registeretudiant", name="etudiant")
     */
    public function registeretudiant()
    {
        return $this->render('interfaces/registeretudiant.html.twig', [
            'controller_name' => 'RegisterController',
        ]);
    }
    /**
     * @Route("/registerdiplome", name="diplome")
     */

    public function registerdiplome()
    {
        return $this->render('interfaces/registerdiplome.html.twig', [
            'controller_name' => 'RegisterController',
        ]);
    }
}
