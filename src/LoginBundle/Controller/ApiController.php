<?php

/**

 * Created by PhpStorm.

 * User: purple

 * Date: 26-06-2017

 * Time: PM 06:12

 */



namespace LoginBundle\Controller;



use ClassesWithParents\F;

use LoginBundle\Entity\Login;

use LoginBundle\Entity\Userapi;

use LoginBundle\LoginBundle;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations as Rest;



use Symfony\Component\Serializer\Serializer;

use Symfony\Component\Serializer\Encoder\XmlEncoder;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Validator\Constraints\EmailValidator;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class ApiController extends \CategoryBundle\Controller\Common

{

    /**

     * @Rest\Post("api/login")

     */

    public function loginAction()

    {

//        $encoders = array(new XmlEncoder(), new JsonEncoder());

//        $normalizers = array(new GetSetMethodNormalizer());

//        $serializer = new Serializer($normalizers, $encoders);



        $_POST=$this->_getJSON();

        $datas['email']=$_POST['email'];

        $pass=$_POST['pass'];



        $user = new Login();

        $encoderFactory=$this->get('security.encoder_factory');

        $encoder=$encoderFactory->getEncoder($user);



        $r=$this->getDoctrine()->getRepository('LoginBundle:Login')->findOneBy($datas);

        if($r) {



            if ($encoder->isPasswordValid($r->getPassword(), $pass, $r->getSalt())) {

                $flag = false;

                $data = new Userapi;

                $rr['userId'] = $r->getId();

                $em = $this->getDoctrine()->getManager();

                $user_check = $this->getDoctrine()->getRepository('LoginBundle:Userapi')->findOneBy($rr);

                $id = $rr['userId'];

                $user_api = md5($id . time());

                if (empty($user_check)) {

                    $data->setUserId($id);

                    $data->setApiKey($user_api);

                    $em->persist($data);

                    $em->flush();

                    $flag = true;

                } else {

                    $user_check->setApiKey($user_api);

                    $em->flush();

                    $flag = true;

                }



                if ($flag) {

                    return $this->lresponse(Response::HTTP_OK, "success", "Logged In Successfully", $r, $user_api);

                }

            } else {

                return $this->response(Response::HTTP_FORBIDDEN, "error", "Invalid email or password", [], Response::HTTP_FORBIDDEN);

            }



        } else

            {

                return $this->response(Response::HTTP_FORBIDDEN, "error", "Invalid email or password", [], Response::HTTP_FORBIDDEN);

            }

        }





    /**

     * @Rest\Post("api/chk")

     */

    public function chkAction(Request $request)

    {

        if($this->authorized($request)!=FALSE)

        {

            $_POST=$this->_getJSON();



           $user = new Login();



           $data=$_POST['pass'];



           $encoderFactory=$this->get('security.encoder_factory');

            $encoder=$encoderFactory->getEncoder($user);



            $password=$encoder->encodePassword($data,$data);



            $datas['email']=$_POST['email'];



            $em=$this->getDoctrine()->getRepository('LoginBundle:Login')->findOneBy($datas);



            if ($encoder->isPasswordValid($em->getPassword(), $data, $em->getSalt()))

            {

                die('ok');

            }

            else

            {

                die('not ok');

            }



            return $this->response(Response::HTTP_OK,"success","User Exists",$em->getPassword(),Response::HTTP_OK);



        }

        else

        {

            return $this->response(Response::HTTP_FORBIDDEN,"error","Unauthorised Access",[],Response::HTTP_FORBIDDEN);

        }

    }



    /**

     * @Rest\Post("api/register")

     */

    public function registerAction(Request $request)

    {

        $_POST=$this->_getJSON();

        $name=$_POST['name'];

        $email=$_POST['email'];

        $login= new Login();

        /***********To Encode Password**********/

        $encoderFactory=$this->get('security.encoder_factory');

        $encoder=$encoderFactory->getEncoder($login);



        $pass=$encoder->encodePassword($_POST['pass'],$login);

        /****************************************/

        $login->setName($name);

        $login->setEmail($email);

        $login->setPassword($pass);

        $login->setPlainPass($_POST['pass']);

        $login->setToken('h');

        $login->setStatus('active');

        $validator=$this->get('validator');

        $errors = $validator->validate($login);



        if(count($errors) <= 0)

        {

            $em=$this->getDoctrine()->getManager();

            $chk_email=$em->getRepository('LoginBundle:Login')->findOneBy(array('email'=>$email));

            if($chk_email)

            {

                return $this->response(Response::HTTP_FORBIDDEN,"success","Email Id already Exits",$chk_email,Response::HTTP_FORBIDDEN);

            }

            else {

                $em->persist($login);

                $em->flush();

            }

            if($em)

            {

                $id=$login->getId();

                $last_user_added_details=$em->getRepository('LoginBundle:Login')->find($id);

                return $this->response(Response::HTTP_OK,"success","User Registered Successfully",$last_user_added_details,Response::HTTP_OK);

            }

        }

        else

        {

            $errorsString = $errors ;



            return $this->response(Response::HTTP_FORBIDDEN,"error",$errorsString,[],Response::HTTP_FORBIDDEN);

        }



    }



    /**

     * @Rest\Post("api/forgotPassword")

     */

    public function forgotPassword(Request $request)

    {

        if($this->authorized($request)!=FALSE)

        {

            $_POST=$this->_getJSON();

            $details=$this->authorized($request);

            $email['email']=$_POST['email'];

            $chk_email=$this->getDoctrine()->getRepository('LoginBundle:Login')->findOneBy($email);

            if(!empty($chk_email))

            {

                $user['email']=$chk_email->getEmail();

                $user['id']=$details->getuserId();

                $chk_credential=$this->getDoctrine()->getRepository('LoginBundle:Login')->findOneBy($user);

                if(!empty($chk_credential))

                {

                    $em=$this->getDoctrine()->getManager();

                    $to_mail=$chk_credential->getEmail();

                    $name=$chk_credential->getName();

                    $password=$chk_credential->getPlainPass();

                    $baseurl=$this->baseUrl();

                    $emaii=base64_encode($to_mail);

                    $setToken=md5($to_mail.time());

                    $chk_credential->setToken($setToken);

                    $em->flush();

                    $link=$baseurl.$emaii.'/'.$setToken;

                    $message = \Swift_Message::newInstance()

                        ->setSubject('Forget Password')

                        ->setFrom('no-reply@gmail.com')

                        ->setTo($to_mail)

                        ->setBody($this->renderView(

                            'mail/fpass.html.twig',

                            array('name' => $name,'password'=>$link)

                        ),

                            'text/html'

                        )

                    ;



                    $msg=$this->get('mailer')->send($message);



                    if($msg)

                    {

                        return $this->response(Response::HTTP_OK,"success","Mail Send Successfully",$msg,Response::HTTP_OK);

                    }

                    else

                    {

                        return $this->response(Response::HTTP_FORBIDDEN,"error","Something went wrong",[],Response::HTTP_FORBIDDEN);

                    }



                }

                else

                {

                    return $this->response(Response::HTTP_FORBIDDEN,"error","Invalid Data",[],Response::HTTP_FORBIDDEN);

                }

            }

            else

            {

                return $this->response(Response::HTTP_NOT_FOUND,"error","Email Id Not Exists",[],Response::HTTP_NOT_FOUND);

            }

        }

        else

        {

            return $this->response(Response::HTTP_FORBIDDEN,"error","Unauthorised Access",[],Response::HTTP_FORBIDDEN);

        }

    }



    /**

     * @Route("{email}/{token}/resetpassword")

     */

    public function resetPassword(Request $request,$email,$token)

    {

        $decodeEmail['email']=base64_decode($email);

        $decodeEmail['token']=$token;

        $view=new Login();

        $em=$this->getDoctrine()->getManager();

        $chkPass=$this->getDoctrine()->getRepository('LoginBundle:Login')->findOneBy($decodeEmail);

        if(!empty($chkPass))

        {

            $form=$this->createFormBuilder($view)

                ->add('password',PasswordType::class,array('attr'=>array('placeholder'=>'Enter New Password','class'=>'form-control','style'=>'margin-bottom:15px;padding:10px')))

                ->add('Reset',SubmitType::class,array('label'=>'Submit','attr'=>array('class'=>'btn btn-primary')))

                ->getForm();



            $form->handleRequest($request);

            if($form->isSubmitted())

            {

                $newPassword=$form['password']->getData();

//                /*** To Encrypt Password ***/

                $encoderFactory=$this->get('security.encoder_factory');

                $encoder=$encoderFactory->getEncoder($view);

                $pass=$encoder->encodePassword($newPassword,$view);

//

//                /***********To Encrypt Password*********/



                $chkPass->setPassword($pass);

                $chkPass->setPlainPass($newPassword);

                $chkPass->setToken('0');

                $e=$em->flush();

                    return new Response('Password Updated Successfully');

            }



            return $this->render('mail\resetform.html.twig',array('form'=>$form->createView(),

                ));

        }

        else

        {

            return new Response('Reset Password Link Expired');

        }



//        return $this->response(Response::HTTP_OK,"success","Unauthorised Access",$chkPass,Response::HTTP_OK);

    }



   /**

    * @Rest\Get("/fr")

    */

   public function frAction(Request $request)

   {

       $pass="jieindnsdnsd";

        $url=$this->get('router')->generate('fr',array('page'=>2));



        return new Response($url);exit;

   }

}