<?php

namespace Wind\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Wind\ModelBundle\Repository;
use Symfony\Component\HttpFoundation\Response;
use Wind\CoreBundle\MyMailer;

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
            'posts' => $posts,
            'latestPosts' => $latestPosts,
        );
    }

    /**
     * @Route("/mail")
     * @Template()
     */
    public function mailAction()
    {
        $mailer = $this->get('MyMailer');
        $response = $mailer->send('Matvey@r.ru');

        return new Response($response);
    }

    /**
     * @Route("/{slug}")
     * @Template()
     */
    public function showAction($slug) {
        $post = $this->getDoctrine()->getRepository('WindModelBundle:Post')->findOneBy(
            array(
                'slug' => $slug
            )
        );

        if (null === $post) {
            throw $this->createNotFoundException('Post was not found');
        }

        return array(
            'post' => $post
        );
    }

}
