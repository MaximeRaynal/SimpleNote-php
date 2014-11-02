<?php

namespace SimpleNote\NoteBundle\Service;

use SimpleNote\NoteBundle\Entity\Note;
use SimpleNote\NoteBundle\Entity\Page;

class PageLoader {

    private $basePath;

    public function __construct($basePath) {
        $this->basePath = $basePath;
    }

    public function loadPages(Note $note) {

        // On récupère le contenu du dossier correspondant
        // On filtre en retirant . et ..
        $directoryContent =
            array_diff(scandir($this->basePath . $note->getName()),
                        array('.', '..'));

        if (! $directoryContent) {
            throw new Exception("Error Processing Request", 1);
        }

        foreach ($directoryContent as $file) {
            $page = new Page();

            $page->setOrder(split('_', $file)[0]);
            $page->setName(split('_', $file)[1]);

            $page->setText(
                file_get_contents(
                        $this->basePath . $note->getName() . '/' .$file));

            $page->setNote($note);
            $note->addPage($page);
        }

    }
}