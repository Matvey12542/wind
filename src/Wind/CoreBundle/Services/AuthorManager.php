<?php

namespace Wind\CoreBundle\Services;


use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Wind\ModelBundle\Entity\Author;

class AuthorManager {
    private $em;

    /**
     * @param EntityMAnager $em
     */
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    /**
     * Find Author by slug
     */
    public function findBySlug($slug){
        $author = $this->em->getRepository('WindModelBundle:Author')->findOneBy(
            array(
                'slug' => $slug
            )
        );

        if (null === $author) {
            throw new NotFoundHttpException('Author was not found');
        }

        return $author;
    }

    /**
     * @param Author $author
     * @return array
     */
    public function findPosts(Author $author){
        $posts = $this->em->getRepository('WindModelBundle:Post')->findBy(
            array(
                'author' => $author
            )
        );

        return $posts;
    }
} 