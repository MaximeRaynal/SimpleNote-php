<?php

namespace SimpleNote\NoteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Une note est un agrégat de page (au moins une)
 * Une note est reparé par son nom
 * Elle possède un ensemble de tag
 * Les pages ne sont pas stocké en base de données mais en local
 */
class Note implements \JsonSerializable{

    private $id;

    private $name;

    private $description;

    private $tags;

    private $pages;

    private $privacyState;

    private $creationDate;

    private $lastUpdateDate;

    private $author;

    private $isCrypted;

    public function __construct() {
        $pages = array();
        $tags = ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     * @return Note
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Note
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set privacyState
     *
     * @param string $privacyState
     * @return Note
     */
    public function setPrivacyState($privacyState)
    {
        $this->privacyState = $privacyState;

        return $this;
    }

    /**
     * Get privacyState
     *
     * @return string
     */
    public function getPrivacyState()
    {
        return $this->privacyState;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Note
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set lastUpdateDate
     *
     * @param \DateTime $lastUpdateDate
     * @return Note
     */
    public function setLastUpdateDate($lastUpdateDate)
    {
        $this->lastUpdateDate = $lastUpdateDate;

        return $this;
    }

    /**
     * Get lastUpdateDate
     *
     * @return \DateTime
     */
    public function getLastUpdateDate()
    {
        return $this->lastUpdateDate;
    }

    /**
     * Set isCrypted
     *
     * @param boolean $isCrypted
     * @return Note
     */
    public function setIsCrypted($isCrypted)
    {
        $this->isCrypted = $isCrypted;

        return $this;
    }

    /**
     * Get isCrypted
     *
     * @return boolean
     */
    public function getIsCrypted()
    {
        return $this->isCrypted;
    }

    /**
     * Add tags
     *
     * @param \SimpleNote\NoteBundle\Entity\Tag $tags
     * @return Note
     */
    public function addTag(\SimpleNote\NoteBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \SimpleNote\NoteBundle\Entity\Tag $tags
     */
    public function removeTag(\SimpleNote\NoteBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Retourne tout sauf les tags (lazyLoading, convertit les dates en timestamp
     */
    public function jsonSerialize() {
        $vars = get_object_vars($this);

        $vars['creationDate']->getTimestamp();
        $vars['lastUpdateDate']->getTimestamp();

        return $vars;
    }

    public function addPage(Page $page) {
        $this->pages[$page->getOrder()] = $page;
    }


}
