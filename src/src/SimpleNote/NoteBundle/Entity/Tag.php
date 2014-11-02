<?php

namespace SimpleNote\NoteBundle\Entity;

/**
 * Les tags servent à marquer les notes
 */
class Tag implements \JsonSerializable {

    /**
     * La chaine marquant de tag, sans espace
     * sans #
     */
    private $name;

    /**
     * On ajoute la possibilitées de taillé un tags
     */
    private $description;

    /**
     * Le parent hierarchique du tag.
     * Lorsque l'on affecte un tag à une note, on
     * y affecte aussi c'est parent
     */
    private $parent;

    private $childs;

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

    public function __toString() {
        $string = $this->name;

        $current = $this->parent;
        while ($current != null) {
            $string = $current->name . '/' . $string;
            $current = $current->parent;
        }

        return $string;
    }

    public function jsonSerialize() {
        $vars = get_object_vars($this);
        return $vars;
    }
}
