<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 21.07.14
 * Time: 13:46
 */

namespace Wind\ModelBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

class PostRepository extends EntityRepository {
    /**
     * Find latest
     * @param $num
     */
    public function findLatests($num)
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('p.createdAt', 'desc')
            ->setMaxResults($num);
        return $qb->getQuery()->getResult();
    }

    /**
     * Find the first post
     */
    public function findFirst()
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('p.id', 'asc')
            ->setMaxResults(1);
        return $qb->getQuery()->getSingleResult();
    }
    private function getQueryBuilder()
    {
        $em = $this->getEntityManager();

        $qb = $em->getRepository('WindModelBundle:Post')
            ->createQueryBuilder('p');
        return $qb;
    }
}