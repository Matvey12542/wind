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

    /**
     * @param $slug
     * @return object
     * @throws NotFoundException
     */
    public function findBySlug($slug) {
        $post = $this->em->getRepository('WindModelBundle:Generator')->findOneBy(
            array(
                'slug' => $slug
            )
        );

        if (null === $post) {
            throw new NotFoundException('Post was not found');
        }

        return $post;
    }

    public function findAll() {
        $generators = $this->em->getRepository('WindModelBundle:Generator')->findAll();
        return $generators;
    }
} 