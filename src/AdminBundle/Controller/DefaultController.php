<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\BrowserKit\Response;
class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('AdminBundle:Default:index.html.twig');
    }
    /**
     * @Route("/admin")
     */
    public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }

    /**
     * @Route("/logout",name="logout")
     */
    public  function logoutAction(){

    }

//    /**
//     * @Route("admin/login",name="login")
//     */
//    public function loginAction(Request $request,AuthenticationUtils $authenticationUtils)
//    {
//       //echo "<pre>";json_encode($authenticationUtils);exit();
//        $error = $authenticationUtils->getLastAuthenticationError();
//        $username= $authenticationUtils->getLastUsername();
//        return $this->render('AdminBundle:WebLogin:login.html.twig', array(
//            'error'=>$error,
//            'username'=>$username,
//        ));
//    }

}
