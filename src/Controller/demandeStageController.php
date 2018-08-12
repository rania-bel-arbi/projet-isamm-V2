<?php
/**
 * Created by PhpStorm.
 * User: spot-info
 * Date: 02/08/18
 * Time: 23:40
 */

namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use App\Entity\User;
use App\Entity\DemandedeStage;

class demandeStageController
{
    /**
     * @Rest\Put("/demandeStage/")
     */
    public function IndexAction(Request $request)
    {

    }
    /**
     * @Rest\Put("/demandeStage/")
     */
    public function AddDemandeAction(Request $request)
    {
        $idUser = $request->get('idUser');
        $disponibilite = $request->get('disponibilite');
        $email = $request->get('email');
        $cv = $request->get('cv');

        $em = $this->getDoctrine()->getManager();
        $data = new DemandedeStage;
        $data->setDisponibilite($disponibilite);
        $data->setEmail($email);
        $data->setCv($cv);


        $User = $this->getDoctrine()->getRepository('App:User')->findOneBy(array('id' => $idUser));
        $data->setEtudiantId($User);



        $em->persist($data);
        $em->flush();
        return new JsonResponse(array(
            'message' => "offre add succ",
            'code' => "2"
        ), 200);
    }
    /**
     * @Rest\Get("/demande")
     */

    public function getDemandeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(

            'SELECT o
            FROM App:OffreStage o'

        );
        $offres = $query->getArrayResult();


        return new Response(json_encode($offres), 200);
    }



}