<?php

namespace Wind\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Wind\ModelBundle\Repository;
/**
 * Class PostController
 */
class PostController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $posts = $this->getDoctrine()->getRepository('WindModelBundle:Post')->findAll();
        $latestPosts = $this->getDoctrine()->getRepository('WindModelBundle:Post')->findLatests(5);

        return array(
            'posts'       => $posts,
            'latestPosts' => $latestPosts,
        );
    }

}
