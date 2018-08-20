<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     */
    public function index()
    {
        return $this->render('interfaces/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    /**
     * @Route("/offre", name="offre")
     */
    public function offre()
    {
        return $this->render('interfaces/offredestage.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    /**
     * @Route("/demande", name="demande")
     */
    public function demande()
    {
        return $this->render('interfaces/demandedestage.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
