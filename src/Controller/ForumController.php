<?php

namespace App\Controller;

use App\Entity\Message;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class ForumController extends Controller
{
    /**
     * @Route("/forum", name="forum")
     */
    public function forum()
    {
        return $this->render('interfaces/forum.html.twig', [
            'controller_name' => 'ForumController',
        ]);
    }
    /**
     * @Rest\Post("/posteQuestion", name="posteQuestion")
     */
    public function AjoutQuestionAction(Request $request)
    {

        $data = new Message();
        $description = $request->get('description');

        if (empty($description)) {
            return new JsonResponse(array(
                'message' => "null value",
                'code' => "3"
            ), 200);
        }
        $time = date('H:i:s \O\n d/m/Y');

        $data->setDescription($description);
        $data->setDate($time);
        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();
        return new JsonResponse(array(
            'message' => "done",
            'code' => "2"
        ), 200);
    }
    /**
     * @Rest\Delete("/evaluation/{id}")
     */
    public function deleteQuestionAction($id)
    {
        $sn = $this->getDoctrine()->getManager();
        $evaluation = $this->getDoctrine()->getRepository('AppBundle:Evaluation')->find($id);
        if (empty($evaluation)) {
            return new JsonResponse(array(
                'message' => "n existe pas ",
                'code' => "1"
            ), 200);        }
        else {
            $sn->remove($evaluation);
            $sn->flush();
        }
        return new JsonResponse(array(
            'message' => "supprimer",
            'code' => "2"
        ), 200);    }
    /**
     * @Rest\Get("/getListeEvaluation")
     */

    public function getListeQuestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('App:Message')->findAll();

        return $this->render('interfaces/forum.html.twig',array('user'=>$users));

    }

}
