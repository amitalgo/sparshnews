<?php
/**
 * Created by PhpStorm.
 * User: purple
 * Date: 27-06-2017
 * Time: AM 11:46
 */

namespace LoginBundle\Controller;

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

    public function response($status,$type,$msg,$data=null,$statuscode)
    {
        return new View(array("status"=>$status,"type"=>$type,"message"=>$msg,"data"=>$data),$statuscode);
    }

    public function checkapi()
    {
        $_POST=$this->_getJSON();
        if(isset($_POST['api_key'])) {
            $api = $_POST['api_key'];
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement = $connection->prepare("Select * from api where api_key='$api'");
            $statement->execute();
            $results = $statement->fetchAll();
            return !empty($results) ? true : false;
        }
        else
        {
            return false;
        }
    }

    public function set_header($value)
    {
        $response = new Response();
        $response->headers->set('X-Auth-Token', "$value");
        return $response;
    }
}