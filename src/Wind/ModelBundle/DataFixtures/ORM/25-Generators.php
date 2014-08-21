<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 13.08.14
 * Time: 0:07
 */

namespace Wind\ModelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wind\ModelBundle\Entity\Generator;

class Generators extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 25;
    }
    /**
     * Load data fixtures with the passed EntityManager
     *
     */
    function load(ObjectManager $manager)
    {
        $g1 = new Generator();
        $g1->setTitle('Lorem');
        $g1->setPath($g1->getAbsolutePath().'/63b16-smile1.jpg');
        $g1->setBody('Lorem 300M рассчитан на сильные ветра и может быть установлен, к примеру, на яхту, телекоммуникационные вышки и прочие объекты.');
        $g1->setPerformance('0-400');
        $g1->setInitialSpeed('3');
        $g1->setRatedSpeed('30');
        $g1->setWeight('30');
        $g1->setPrice(525);
        $g1->setAuthor($this->getAuthor($manager,"Kolya"));

        $g2 = new Generator();
        $g2->setTitle('Test');
        $g2->setPath($g1->getWebPath().'/123.jpeg');

        $g2->setBody('TEst test tste сильные ветра и может быть установлен, к примеру, на яхту, телекоммуникационные вышки и прочие объекты.');
        $g2->setPerformance('0-300');
        $g2->setInitialSpeed('1');
        $g2->setRatedSpeed('70');
        $g2->setWeight('100');
        $g2->setPrice(100);
        $g2->setAuthor($this->getAuthor($manager, "David"));

        $g3 = new Generator();
        $g3->setTitle('Test test ');
        $g3->setPath($g1->getWebPath().'/drua_logo.png');

        $g3->setBody('buuuuu TEst test tste сильные ветра и может быть установлен, к примеру, на яхту, телекоммуникационные вышки и прочие объекты.');
        $g3->setPerformance('0-500');
        $g3->setInitialSpeed('6');
        $g3->setRatedSpeed('70');
        $g3->setWeight('800');
        $g3->setPrice(10700);
        $g3->setAuthor($this->getAuthor($manager, "Buuu"));

        $manager->persist($g1);
        $manager->persist($g2);
        $manager->persist($g3);
        $manager->flush();
    }

    /**
     * Get an Autthor
     *
     * @param Object $manager
     * @param $name
     */
    private function getAuthor(ObjectManager $manager, $name)
    {
        return $manager->getRepository('WindModelBundle:Author')->findOneBy(
            array(
                'name' => $name
            )
        );
    }
}