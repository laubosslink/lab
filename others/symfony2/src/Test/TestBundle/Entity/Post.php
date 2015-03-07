<?php

namespace Test\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test\TestBundle\Entity\Post
 */
class Post
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var text $content
     */
    private $content;

    /**
     * @var date $date
     */
    private $date;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param text $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set date
     *
     * @param date $date
     * @return Post
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return date 
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @var string $subtitle
     */
    private $subtitle;


    /**
     * Set subtitle
     *
     * @param string $subtitle
     * @return Post
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string 
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }
    /**
     * @var string $lang
     */
    private $lang;

    /**
     * @var string $important_content
     */
    private $important_content;


    /**
     * Set lang
     *
     * @param string $lang
     * @return Post
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
        return $this;
    }

    /**
     * Get lang
     *
     * @return string 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set important_content
     *
     * @param string $importantContent
     * @return Post
     */
    public function setImportantContent($importantContent)
    {
        $this->important_content = $importantContent;
        return $this;
    }

    /**
     * Get important_content
     *
     * @return string 
     */
    public function getImportantContent()
    {
        return $this->important_content;
    }
}