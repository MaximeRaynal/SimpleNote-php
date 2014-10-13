<?php

namespace SimpleNote\NoteBundle\Entity;

/**
 * Une page est la composante d'une note,
 * Elle PEUT être repèré par un nom
 * SINON par son numéro (ordre)
 * Elle contient du texte rédigé au format Markdown
 * Cette élément n'est pas stocké en base de données mais local
 */
public class Page {

    private $numero;

    private $note;

    private $name;

    private $text;

    public function __construct() {

    }

 }