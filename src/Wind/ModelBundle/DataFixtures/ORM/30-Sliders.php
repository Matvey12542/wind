<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 21.08.14
 * Time: 22:07
 */

namespace Wind\ModelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wind\ModelBundle\Entity\Slider;

class Sliders extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 30;
    }
    /**
     * Load data fixtures with the passed EntityManager
     *
     */
    function load(ObjectManager $manager)
    {
        $s1 = new Slider();
        $s1->setTitle('Lorem');
        $s1->setPath($s1->getAbsolutePath().'/wind-01.jpg');
        $s1->setBody('Lorem 300M рассчитан на сильные ветра и может быть установлен, к примеру, на яхту, телекоммуникационные вышки и прочие объекты.');


        $s2 = new Slider();
        $s2->setTitle('Test');
        $s2->setPath($s2->getWebPath().'/wind-02.jpg');

        $s2->setBody('TEst test tste сильные ветра и может быть установлен, к примеру, на яхту, телекоммуникационные вышки и прочие объекты.');

        $s3 = new Slider();
        $s3->setTitle('Test test ');
        $s3->setPath($s3->getWebPath().'/wind-03.jpg');
        $s3->setBody('buuuuu TEst test tste сильные ветра и может быть установлен, к примеру, на яхту, телекоммуникационные вышки и прочие объекты.');


        $s4 = new Slider();
        $s4->setTitle('Test test ');
        $s4->setPath($s4->getWebPath().'/wind-04.jpg');
        $s4->setBody('buuuuu TEst test tste сильные ветра и может быть установлен, к примеру, на яхту, телекоммуникационные вышки и прочие объекты.');


        $s5 = new Slider();
        $s5->setTitle('Test test ');
        $s5->setPath($s5->getWebPath().'/wind-05.jpg');
        $s5->setBody('buuuuu TEst test tste сильные ветра и может быть установлен, к примеру, на яхту, телекоммуникационные вышки и прочие объекты.');

        $manager->persist($s1);
        $manager->persist($s2);
        $manager->persist($s3);
        $manager->persist($s4);
        $manager->persist($s5);
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