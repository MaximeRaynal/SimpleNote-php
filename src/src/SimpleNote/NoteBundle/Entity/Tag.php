<?php

namespace SimpleNote\NoteBundle\Entity;

/**
 * Les tags servent à marquer les notes
 */
class Tag {

    public $name;

    public $description;

    // Non utilisé dans la v1
    public $parent;

    // Non utilisé dans la v1
    public $childs;

    public function __construct() {

    }


    /**
     * Set name
     *
     * @param string $name
     * @return Tag
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
     * @return Tag
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
}
