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

    protected $slides = array(
        array(
            'title' => 'Lorem',
            'picture' => 'wind-01.jpg',
            'body' =>
              'Lorem lorem',
        ),
        array(
            'title' => 'Test test',
            'picture' => 'wind-02.jpg',
            'body' =>
              'buuuuu TEst test tste',
        ),
        array(
            'title' => 'Lorem',
            'picture' => 'wind-03.jpg',
            'body' =>
              'test description',
        ),
    );
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
        foreach ($this->slides as $slideData) {
            $slide = new Slider();
            $slide->setTitle($slideData['title']);
            $slide->setPath($slide->getAbsolutePath().'/'.$slideData['picture']);
            $slide->setBody($slideData['body']);

            $manager->persist($slide);
            $manager->flush();
        }
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