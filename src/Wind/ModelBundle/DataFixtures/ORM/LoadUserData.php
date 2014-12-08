<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 07.12.14
 * Time: 16:37
 */

namespace Wind\ModelBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wind\ModelBundle\Entity\User;

class LoadUserData implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setPlainPassword('admin');
        $userAdmin->setEmail('admin@admin.org');
        $userAdmin->setEnabled(true);
        $userAdmin->setEnabled(true);
        $userAdmin->addRole('ROLE_ADMIN');
        $manager->persist($userAdmin);
        $manager->flush();
    }
} 