<?php

namespace NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="NewsBundle\Repository\NewsRepository")
 * @ORM\Table(name="news")
 * @ORM\HasLifecycleCallbacks
 */
class News
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="news_head",type="string", length=100)
     */
    private $newsHeading;

    /**
     * @ORM\Column(name="news_desc",type="string", length=255)
     */
    private $newsDescription;

    /**
     * @ORM\Column(name="news_cont",type="text")
     */
    private $newsContent;

    /**
     * @ORM\Column(name="news_media",type="string",length=500)
     */
    private $newsMedia;

    /**
     * @ORM\Column(name="news_media_name",type="string",length=500)
     */
    private $newsMediaName;

    /**
     * Many Subcategory have One category.
     * @ORM\ManyToOne(targetEntity="CategoryBundle\Entity\Category")
     * @ORM\JoinColumn(name="news_category", referencedColumnName="id")
     */
    private $newsCategory;

    /**
     * @ORM\Column(name="status",type="string",nullable=true, length=600,options={"unsigned":true, "default":"active"})
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;


    /**
     * @ORM\PrePersist
     */
    public function doStuffOnPrePersist()
    {
        $this->created= new \DateTime("now");
    }

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
    public function getNewsHeading()
    {
        return $this->newsHeading;
    }

    /**
     * @param mixed $newsHeading
     */
    public function setNewsHeading($newsHeading)
    {
        $this->newsHeading = $newsHeading;
    }

    /**
     * @return mixed
     */
    public function getNewsDescription()
    {
        return $this->newsDescription;
    }

    /**
     * @param mixed $newsDescription
     */
    public function setNewsDescription($newsDescription)
    {
        $this->newsDescription = $newsDescription;
    }

    /**
     * @return mixed
     */
    public function getNewsContent()
    {
        return $this->newsContent;
    }

    /**
     * @param mixed $newsContent
     */
    public function setNewsContent($newsContent)
    {
        $this->newsContent = $newsContent;
    }

    /**
     * @return mixed
     */
    public function getNewsCategory()
    {
        return $this->newsCategory;
    }

    /**
     * @param mixed $newsCategory
     */
    public function setNewsCategory($newsCategory)
    {
        $this->newsCategory = $newsCategory;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return News
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function getNewsMedia()
    {
        return $this->newsMedia;
    }

    /**
     * @param mixed $newsMedia
     */
    public function setNewsMedia($newsMedia)
    {
        $this->newsMedia = $newsMedia;
    }

    /**
     * @return mixed
     */
    public function getNewsMediaName()
    {
        return $this->newsMediaName;
    }

    /**
     * @param mixed $newsMediaName
     */
    public function setNewsMediaName($newsMediaName)
    {
        $this->newsMediaName = $newsMediaName;
    }





}
