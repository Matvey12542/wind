<?php

namespace Wind\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AuthorController extends Controller
{
    /**
     * @Route("/author/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        $author = $this->getDoctrine()->getRepository('WindModelBundle:Author')->findOneBy(
            array(
                'slug' => $slug
            )
        );

        if (null === $author) {
            throw $this->createNotFoundException('Author was not found');
        }

        $posts = $this->getDoctrine()->getRepository('WindModelBundle:Post')->findBy(
            array(
                'author' => $author
            )
        );

        return array(
            'author' => $author,
            'posts' => $posts
        );
    }

}
