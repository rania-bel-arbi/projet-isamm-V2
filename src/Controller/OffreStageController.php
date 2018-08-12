<?php
/**
 * Created by PhpStorm.
 * User: spot-info
 * Date: 02/08/18
 * Time: 17:06
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
use App\Entity\OffreStage;


class OffreStageController  extends Controller
{
    /**
     * @Rest\Put("/Offre/")
     */
    public function AddOffreAction(Request $request)
    {
        $idUser = $request->get('idUser');
        $description = $request->get('description');
        $adresse = $request->get('adresse');
        $date_expirtion = $request->get('date_expirtion');
        $societe = $request->get('societe');
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');
        $categorie = $request->get('categorie');

        if(empty($description) || empty($adresse) || empty($date_expirtion) || empty($societe))
        {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }
        $em = $this->getDoctrine()->getManager();
        $data = new offreStage;
        $data->setDescription($description);
        $data->setSociete($societe);
        $data->setAdresse($adresse);
        $data->setDateExpiration($date_expirtion);
        $data->setLatitude($latitude);
        $data->setLongitude($longitude);
        $User = $this->getDoctrine()->getRepository('App:User')->findOneBy(array('id' => $idUser));
        $data->setPosteurId($User);
        $data->setCategorie($categorie);


        $em->persist($data);
        $em->flush();
        return new JsonResponse(array(
            'message' => "offre add succ",
            'code' => "2"
        ), 200);
    }
    /**
     * @Rest\Get("/offre")
     */

    public function getOffreAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(

            'SELECT o
            FROM App:OffreStage o'

        );
        $offres = $query->getArrayResult();


        return new Response(json_encode($offres), 200);
    }
    /**
     * @Rest\Get("/OffreByCategorie/{categorie}")
     */

    public function OffreByCategorieAction($categorie)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(


            "SELECT o 
             FROM App:offre o  
              WHERE o.categorie=$categorie "


        );
        $users = $query->getArrayResult();


        return new Response(json_encode($users), 200);
    }

}