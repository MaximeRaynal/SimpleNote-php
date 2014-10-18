<?php

namespace SimpleNote\NoteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use SimpleNote\NoteBundle\Entity\Tag;

class LoadTagData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $tag = new Tag();
        $tag->setName('Tag 1');
        $tag->setDescription('Le premier tag');
        $manager->persist($tag);
        $this->addReference('t1', $tag);

        $tag = new Tag();
        $tag->setName('Tag 2');
        $tag->setDescription('Le second tag');
        $manager->persist($tag);
        $this->addReference('t2', $tag);

        $tag = new Tag();
        $tag->setName('Tag 3');
        $tag->setDescription('Le troisième tag');
        $manager->persist($tag);
        $this->addReference('t3', $tag);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}