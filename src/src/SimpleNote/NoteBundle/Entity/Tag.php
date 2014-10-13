<?php

namespace SimpleNote\NoteBundle\Entity;

/**
 * Les tags servent à marquer les notes
 */
class Tag {

    public $name;

    public $description;

    public $parent;

    public $childs;

    public function __construct() {

    }

}