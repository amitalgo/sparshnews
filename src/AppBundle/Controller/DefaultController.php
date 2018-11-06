<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Test;
use CategoryBundle\Controller\Common;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityRepository;
use LoginBundle\Entity\Login;

class DefaultController extends Controller
{

    /**
     * @Route("/h")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
//        $r=array('name'=>'Amitt');
//
//        return new Response(json_encode($r));
    }

    /**
     * @Route("/fetchh")
     */
    public function fetchAction()
    {
        $r=array('name'=>'Amit');

        return new Response(json_encode($r));
    }

    /**
     * @Route("/fetchall/")
     */
    public function fetchingAction()
    {
//        $e=array("name"=>"Asim");
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $em=$this->getDoctrine()->getManager();
        $r=$em->getRepository('AppBundle:Test')->find(1);

        $json = $serializer->serialize($r, 'json');

        return new Response($json);

//        return new Response(json_encode($r));
    }

    /**
     * @Route("/api/cat/")
     */
    public function catAction(Request $request)
    {
        $query=$this->getDoctrine()->getRepository('AppBundle:Test')->findByParent();

        return $this->response(Response::HTTP_OK,"success","category Fetched Successfully",$query,Response::HTTP_OK);
    }

    /**
     * @Route("/view")
     */
    public function viewAction(Request $request)
    {
        $user=new Login();

        $form=$this->createFormBuilder($user)
            ->add('password',TextType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('save',SubmitType::class,array('label'=>'Submit','attr'=>array('class'=>'btn btn-primary')))
            ->getForm();

        return $this->render('mail\resetform.html.twig',array('form'=>$form->createView(),
            ));
    }

    /**
     * @Route("/fttr")
     */
    public function frAction(Request $request)
    {
        return $this->render("mail/resetform.html.twig");
    }

}