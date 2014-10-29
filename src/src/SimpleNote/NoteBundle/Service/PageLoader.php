<?php

namespace SimpleNote\NoteBundle\Service;

use SimpleNote\NoteBundle\Entity\Note;
use SimpleNote\NoteBundle\Entity\Page;

class PageLoader {

    private $basePath;

    public function($basePath) {
        $this->basePath = $basePath;
    }

    public function loadPages(Note $note) {
        $directoryContent = scandir($this->basePath . $note->name);

        if (! $directoryContent) {
            throw new Exception("Error Processing Request", 1);
        }

        foreach ($directoryContent as $file) {
            $page = new Page();

            $page->setOrder(split('_', $file)[0]);
            $page->setName(split('_', $file)[1]);

            $page->text = file_get_contents($file);

            $page->note = $note;
            $note->addPage($page);
        }

    }
}