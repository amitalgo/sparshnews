<?php

/**
 * Created by PhpStorm.
 * User: Android
 * Date: 14/03/2018
 * Time: 10:13 AM
 */
namespace CategoryBundle\Controller\EasyAdmin;

use CategoryBundle\Entity\Category;
use Sodium\add;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends  BaseAdminController
{

    public function prePersistCategoryEntity($entity)
    {

        $entity->getImage()->move(
            'uploads',
            $entity->getImage()->getClientOriginalName()
        );
        $img = '/uploads/'.$entity->getImage()->getClientOriginalName();
        $entity->getIcon()->move(
            'uploads',
            $entity->getIcon()->getClientOriginalName()
        );
        $icon = '/uploads/'.$entity->getIcon()->getClientOriginalName();
        $entity->setImage( '/uploads/'.$entity->getImage()->getClientOriginalName());
        $entity->setImgName($img);
        $entity->setIcon( '/uploads/'.$entity->getIcon()->getClientOriginalName());
        $entity->setIconName($icon);
    }

    public function prePersistNewsEntity($entity)
    {
        $entity->getNewsMedia()->move(
            'uploads',
            $entity->getNewsMedia()->getClientOriginalName()
        );
        $img = '/uploads/'.$entity->getNewsMedia()->getClientOriginalName();
        $entity->setNewsMedia( '/uploads/'.$entity->getNewsMedia()->getClientOriginalName());
        $entity->setStatus('active');
        $entity->setNewsMediaName($img);
    }


    protected function updateCategoryEntity($entity){
        if($entity->getImage()!=null){
            $entity->getImage()->move(
                'uploads',
                $entity->getImage()->getClientOriginalName()
            );
            $entity->setImage( '/uploads/'.$entity->getImage()->getClientOriginalName());
        }else{
            $entity->setImage($entity->getImgName());
        }
        if($entity->getIcon()!=null){
            $entity->getIcon()->move(
                'uploads',
                $entity->getIcon()->getClientOriginalName()
            );
            $entity->setIcon( '/uploads/'.$entity->getIcon()->getClientOriginalName());
        }else{
            $entity->setIcon($entity->getIconName());
        }



        parent::updateEntity($entity);
    }

    protected function updateNewsEntity($entity){
        if($entity->getNewsMedia()!=null){
            $entity->getNewsMedia()->move(
                'uploads',
                $entity->getNewsMedia()->getClientOriginalName()
            );
            $entity->setNewsMedia( '/uploads/'.$entity->getNewsMedia()->getClientOriginalName());
        }else{
            $entity->setNewsMedia($entity->getNewsMediaName());
        }
        parent::updateEntity($entity);
    }
}