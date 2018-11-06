<?php

namespace CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

#use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
#use JavierEguiluz\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
class DefaultController extends BaseAdminController
{
//    public function indexAction()
//    {
//        return $this->render('CategoryBundle:Default:index.html.twig');
//    }

    public function prePersistEntity($entity)
    {
        echo 1;
        exit;
    }

}
