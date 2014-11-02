<?php

namespace SimpleNote\NoteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use \DateTime;

use SimpleNote\NoteBundle\Entity\Note;

class LoadNoteData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $note = new Note();

        $note->setName('Note 1');
        $note->setDescription('La première note');
        $note->setPrivacyState('private');
        $note->setCreationDate(new DateTime('now'));
        $note->setLastUpdateDate(new DateTime('now'));
        $note->setIsCrypted(false);
        $note->addTag($this->getReference('t1'));

        $manager->persist($note);

        $note = new Note();

        $note->setName('Note 2');
        $note->setDescription('La seconde note');
        $note->setPrivacyState('public');
        $note->setCreationDate(new DateTime('now'));
        $note->setLastUpdateDate(new DateTime('now'));
        $note->setIsCrypted(false);
        $note->addTag($this->getReference('t1'));
        $note->addTag($this->getReference('t2'));


        $manager->persist($note);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}