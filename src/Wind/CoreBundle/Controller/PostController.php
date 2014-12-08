<?php

namespace Wind\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Wind\ModelBundle\Entity\Comment;
use Wind\ModelBundle\Form\CommentType;
use Wind\ModelBundle\Repository;
use Symfony\Component\HttpFoundation\Response;
use Wind\CoreBundle\MyMailer;

/**
 * Class PostController
 * @Route("{_locale}", requirements={"_locale"="en|ua"}, defaults={"_locale"="en"})
 */
class PostController extends Controller
{
    function redirectAction() {
        return new RedirectResponse($this->generateUrl("wind_core_generator_index"));
    }
    /**
     * @Route("/post")
     * @Template()
     */
    public function indexAction()
    {
        $posts = $this->getPostManager()->findAll();
        $latestPosts = $this->getPostManager()->findLatest(5, 'ua');

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
        $post = $this->getPostManager()->findBySlug($slug);

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
     * @Route("/{slug}/create-comment")
     * @Method("POST")
     * @Template("Corebundle:Post:show.html.twig")
     */
    public function createCommentAction(Request $request, $slug){
        $post = $this->getPostManager()->findBySlug($slug);


        $form =$this->getPostManager()->createComment($post, $request);

        if ($form === true) {
            $this->get('session')->getFlashBag()->add('success', 'You comment submitted successfully');

            return $this->redirect($this->generateUrl('wind_core_post_show', array('slug' => $post->getSlug())));
        }
        return array(
            'post' => $post,
            'form' => $form->createView(),
        );
    }

    /**
     * @return object
     */
    private function getPostManager(){
        return $this->get('postManager');
    }

  /**
   * @Route("/generte")
   * !@!Template()
   *
   */
  public function generteAction()
  {
    return array('bu');
  }

}
