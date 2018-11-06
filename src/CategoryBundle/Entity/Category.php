<?php

namespace CategoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="CategoryBundle\Repository\CategoryRepository")
 * @ORM\Table(name="category")
 */
class Category
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parentId")
     */
    private $children;

    /**
     * Many Subcategory have One category.
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parentId=null;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    /**
     * @var string $catName
     *
     * @ORM\Column(name="cat_name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(name="cat_icon", type="string", length=255,nullable=false)
     */
    private $icon;

    /**
     * @ORM\Column(name="cat_image",type="string", length=500)
     */
    private $image;

    /**
     * @ORM\Column(type="integer")
     */
    private $sortOrder;

    /**
     * @ORM\Column(name="imgsetter",type="string", length=500)
     */
    private $ImgName;

    /**
     * @ORM\Column(name="iconsetter",type="string", length=500)
     */
    private $IconName;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     */
    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param mixed $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param mixed $sortOrder
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImgName()
    {
        return $this->ImgName;
    }

    /**
     * @param mixed $ImgName
     */
    public function setImgName($ImgName)
    {
        $this->ImgName = $ImgName;
    }

    /**
     * @return mixed
     */
    public function getIconName()
    {
        return $this->IconName;
    }

    /**
     * @param mixed $IconName
     */
    public function setIconName($IconName)
    {
        $this->IconName = $IconName;
    }



//    public function __toString()
//    {
//        return (string) $this->getId();
//    }

    public function __toString()
    {
        return (string) $this->getName();
    }






}
