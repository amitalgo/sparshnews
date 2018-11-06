<?php
/**
 * Created by PhpStorm.
 * User: purple
 * Date: 27-06-2017
 * Time: AM 11:31
 */

namespace NewsBundle\Controller;

use CategoryBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class ApiController extends CategoryBundle\Controller\Common
{
    /**
     * @Rest\Get("api/fetchNews")
     */
    public function fetchNewsAction(Request $request)
    {
        if($this->checkApi($request)!=FALSE)
        {
            $em=$this->getDoctrine()->getManager();
            $data=$em->getRepository('NewsBundle:News')->findBy(array("status"=>"active"),array('created'=>'DESC'));
            if(!empty($data))
            {
                $response['news']=$data;
                return $this->response(Response::HTTP_OK,"success","News Fetched Successfully",$response,Response::HTTP_OK);
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

    /**
     * @Rest\Get("api/{catId}/fetchNewsbyCatId")
     */
    public function fetchNewsbyCatIdAction(Request $request,$catId)
    {
//        $catId=$request->headers->get('catid');
        if($this->checkApi($request)!=FALSE)
        {
            if(!empty($catId) && is_numeric($catId))
            {
                $em=$this->getDoctrine()->getManager();
                $data=$em->getRepository('NewsBundle:News')->findBy(array("newsCategory"=>$catId,"status"=>"active"),array('created'=>'DESC'));

                if(!empty($data))
                {
                    $response['news']=$data;
                    return $this->response(Response::HTTP_OK,"success","News Fetched Successfully",$response,Response::HTTP_OK);
                }
                else
                {
                    return $this->response(Response::HTTP_NOT_FOUND,"error","Unable to fetch News",[],Response::HTTP_NOT_FOUND);
                }
            }
            else
            {
                return $this->response(Response::HTTP_FORBIDDEN,"error","Validation Error",[],Response::HTTP_FORBIDDEN);
            }
        }
        else
        {
            return $this->response(Response::HTTP_FORBIDDEN,"error","Invalid API KEY",[],Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * @Rest\Get("api/{newsId}/fetchNews")
     */
    public function fetchNewsbyIdAction(Request $request,$newsId)
    {
        
        if($this->checkApi($request)!=FALSE)
        {
//            $newsId=$request->headers->get('newsid');
            if(!empty($newsId) && is_numeric($newsId))
            {
                $em=$this->getDoctrine()->getRepository('NewsBundle:News')->find($newsId);
                if($em)
                {
                    $cat_id=$em->getNewsCategory();
                    $rel_news=$this->getDoctrine()->getRepository('NewsBundle:News')->fetchExcept($cat_id,$newsId);
                    $response['news']=$em;
                    $response['related_news']=$rel_news;
                    return $this->response(Response::HTTP_OK,"success","News Fetched Successfully",$response,Response::HTTP_OK);
                }
                else
                {
                    return $this->response(Response::HTTP_NOT_FOUND,"error","Unable to fetch News",[],Response::HTTP_NOT_FOUND);
                }
            }
            else
            {
                return $this->response(Response::HTTP_FORBIDDEN,"error","Validation Error",[],Response::HTTP_FORBIDDEN);
            }
        }
        else
        {
            return $this->response(Response::HTTP_FORBIDDEN,"error","Invalid API KEY",[],Response::HTTP_FORBIDDEN);
        }
    }
}