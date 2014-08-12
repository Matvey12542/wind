<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 12.08.14
 * Time: 23:49
 */

namespace Wind\CoreBundle\Services;


use Doctrine\ORM\EntityManager;

/**
 * Class GeneratorManager
 * @package Wind\CoreBundle\Services
 */
class GeneratorManager {
    private $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function findAll() {
        $generators = $this->em->getRepository('WindModelBundle:Generator')->findAll();
        return $generators;
    }
} 