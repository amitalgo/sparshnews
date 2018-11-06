<?php
/**
 * Created by PhpStorm.
 * User: purple
 * Date: 26-06-2017
 * Time: AM 09:38
 */

namespace CategoryBundle\Controller;

use CategoryBundle\Entity\Category;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;

class ApiController extends Common
{
    /**
     * @Rest\Get("api/fetchCategory")
     */
    public function fetchCatAction(Request $request)
    {
        if($this->checkapi($request)!=FALSE)
        {
            $em=$this->getDoctrine()->getManager();
//            $data=$em->getRepository('CategoryBundle:category')->findBy(array("parentId"=>null,"status"=>"active"),array('sortOrder'=>'ASC'));
            $data=$em->getRepository('CategoryBundle:Category')->findByParent();

            if(!empty($data))
            {
                $r=array_values($data);
                $response['categories']=$r;
                return $this->response(Response::HTTP_OK,"success","category Fetched Successfully",$response,Response::HTTP_OK);
            }
            else
            {
                return $this->response(Response::HTTP_FORBIDDEN,"error","Unable to fetch category",[],Response::HTTP_FORBIDDEN);
            }
        }
        else
        {
            return $this->response(Response::HTTP_FORBIDDEN,"error","Invalid API KEY",[],Response::HTTP_FORBIDDEN);
        }

    }

}