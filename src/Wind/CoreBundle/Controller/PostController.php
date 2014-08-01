<?php

namespace Wind\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Wind\ModelBundle\Form\CommentType;
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

        $form = $this->createForm(new CommentType());

        return array(
            'post' => $post,
            'form' => $form->createView(),
        );
    }

    /**
     * @param Request $request
     * @param $slug
     *
     * @Route("/{slug/create-comment}")
     * @Method("POST")
     * @Template("Corebundle:Post:show.html.twig")
     */
    public function createCommentAction(Request $request, $slug){
        return array();
    }

}
