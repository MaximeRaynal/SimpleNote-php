<?php

namespace SimpleNote\NoteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Une note est un agrégat de page (au moins une)
 * Une note est reparé par son nom
 * Elle possède un ensemble de tag
 * Les pages ne sont pas stocké en base de données mais en local
 */
class Note {

    private $id;

    private $name;

    private $description;

    private $tags;

    private $pages;

    private $privacyState;

    private $creationDate;

    private $lastupdateDate;

    private $author;

    private $isCrypted;

    public function __construct() {

    }

}