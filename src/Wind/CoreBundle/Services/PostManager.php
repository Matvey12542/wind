<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 11.08.14
 * Time: 13:25
 */

namespace Wind\CoreBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Wind\ModelBundle\Entity\Comment;
use Wind\ModelBundle\Entity\Post;
use Wind\ModelBundle\Form\CommentType;

class PostManager {
    private $em;
    private $formFactory;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em, FormFactoryInterface $formFactory) {
        $this->em = $em;
        $this->formFactory = $formFactory;
    }

    /**
     * @return array
     */
    public function findAll() {
        $posts = $this->em->getRepository('WindModelBundle:Post')->findAll();
        return $posts;
    }

    /**
     * @param $num
     * @return mixed
     */
    public function findLatest($num) {
        $latestPosts = $this->em->getRepository('WindModelBundle:Post')->findLatests($num);

        return $latestPosts;
    }

    /**
     * @param $slug
     * @return object
     * @throws NotFoundException
     */
    public function findBySlug($slug) {
        $post = $this->em->getRepository('WindModelBundle:Post')->findOneBy(
            array(
                'slug' => $slug
            )
        );

        if (null === $post) {
            throw new NotFoundException('Post was not found');
        }

        return $post;
    }

    public function createComment(Post $post, Request $request) {
        $comment = new Comment();
        $comment->setPost($post);

        $form =$this->formFactory->create(new CommentType(), $comment);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->em->persist($comment);
            $this->em->flush();
            return true;
        }

        return $form;
    }
} 