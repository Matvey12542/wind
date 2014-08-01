<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 28.07.14
 * Time: 18:38
 */

namespace Wind\ModelBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wind\ModelBundle\Entity\Comment;

class Comments extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 20;
    }

    public function load(ObjectManager $manager) {
        $posts = $manager->getRepository('WindModelBundle:Post')->findAll();

        $comments = array(
            0 => 'Text comment 1',
            1 => 'Text comment 2',
            2 => 'Text comment 3',
        );

        $i = 0;

        foreach ($posts as $post) {
            $comment = new Comment();
            $comment -> setAuthorName('Someone');
            $comment -> setBody($comments[$i++]);
            $comment -> setPost($post);

            $manager->persist($comment);
        }

        $manager->flush();
    }

} 