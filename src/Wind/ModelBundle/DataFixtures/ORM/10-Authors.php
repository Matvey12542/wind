<?php
namespace Wind\ModelBundle\DataFixtures\ORM;

use Wind\ModelBundle\Entity\Author;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for Author Entity
 */
class Authors extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10;
    }

    public function load(ObjectManager $manager)
    {
        $a1 = new Author();
        $a1->setName("Kolya");

        $a2 = new Author();
        $a2->setName("David");

        $a3 = new Author();
        $a3->setName("Buuu");

        $manager->persist($a1);
        $manager->persist($a2);
        $manager->persist($a3);

        $manager->flush();
    }
}
