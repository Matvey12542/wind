<?php

namespace Wind\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Wind\ModelBundle\Entity\Comment;
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
     * @return array
     *
     * @Route("/{slug/create-comment}")
     * @Method("POST")
     * @Template("Corebundle:Post:show.html.twig")
     */
    public function createCommentAction(Request $request, $slug){
        $post = $this->getDoctrine()->getRepository('WindModelBundle:Post')->findOneBy(
            array(
                'slug' => $slug
            )
        );
        if (null === $post) {
            throw $this->createNotFoundException('post was not found');
        }

        $comment = new Comment();
        $comment->setPost($post);

        $form =$this->createForm(new CommentType(), $comment);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->persist($comment);
            $this->getDoctrine()->getManager()->flush();

            $this->get('session')->getFlushBag()->flush();

            return $this->redirect($this->generateUrl('wind_core_post_show', array('slug' => $post->setSlug())));
        }
        return array(
            'post' => $post,
            'form' => $form->createView(),
        );
    }

}
