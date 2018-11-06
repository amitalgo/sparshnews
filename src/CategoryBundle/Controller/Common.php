<?php

/**

 * Created by PhpStorm.

 * User: purple

 * Date: 26-06-2017

 * Time: PM 01:55

 */



namespace CategoryBundle\Controller;



use FOS\RestBundle\Controller\FOSRestController;

use FOS\RestBundle\View\View;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;





class Common extends FOSRestController

{

    public function _getJSON()

    {

        return json_decode(file_get_contents('php://input'),true);

    }



    public function response($status,$type,$msg,$data,$statuscode)

    {

        return new View(array("status"=>$status,"type"=>$type,"message"=>$msg,"data"=>$data),$statuscode);

    }



    public function set_header($value)

    {

        $response = new Response();

        $response->headers->set('X-Auth-Token', "$value");

        return $response;

    }



    public function checkApi(Request $request)

    {

        $apiKey=$request->headers->get('x-api-key');

        if(isset($apiKey)) {

            $em = $this->getDoctrine()->getManager();

            $connection = $em->getConnection();

            $statement = $connection->prepare("Select * from api where api_key='$apiKey'");

            $statement->execute();

            $results = $statement->fetchAll();

            return !empty($results) ? true : false;

        }

        else

        {

            return false;

        }



    }



    public function lresponse($status,$type,$msg,$data,$head)

    {

        return $this->view(array("status"=>$status,"type"=>$type,"message"=>$msg,"data"=>$data),200)->setHeader('X-Auth-Token',$head);

    }



    public function authorized(Request $request)

    {

        $user_api=$request->headers->get('X-Auth-Token');

        if(isset($user_api))

        {

//            $em=$this->getDoctrine()->getManager();

//            $connection = $em->getConnection();

//            $statement = $connection->prepare("Select * from userapi where api_key='$user_api'");

//            $statement->execute();

//            $results = $statement->fetchAll();

//            return !empty($results)?$results:false;



            $em=$this->getDoctrine()->getRepository('LoginBundle:Userapi')->findOneBy(array('apiKey'=>$user_api));

            return !empty($em)?$em:false;

        }

        else

        {

            return false;

        }



    }



    public function baseUrl()

    {

        $baseUrl='http://technople.com/Demo/sparshnews/web/';

        return $baseUrl;

    }

}