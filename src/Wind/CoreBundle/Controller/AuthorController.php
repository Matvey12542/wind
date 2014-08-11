<?php

namespace Wind\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class AuthorController
 * @package Wind\CoreBundle\Controller
 * @Route("{_locale}/author", requirements={"_locale"="en|ua"}, defaults={"_locale"="en"})
 */
class AuthorController extends Controller
{
    /**
     * @Route("/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        $author = $this->getAuthorManager()->findBySlug($slug);
        $posts = $this->getAuthorManager()->findPosts($author);

        return array(
            'author' => $author,
            'posts' => $posts
        );
    }

    /**
     * @return object
     */
    private function getAuthorManager(){
        return $this->get('authorManager');
    }
}
