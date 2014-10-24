<?php

namespace Lecture\BlogBundle\Controller;

use Lecture\BlogBundle\Entity\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="root")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => 'John');
    }

    /**
     * @Route("/blog", name="default_blog")
     * @Method("GET")
     * @Template()
     */
    public function blogAction()
    {
        $posts = $this->getDoctrine()->getRepository('LectureBlogBundle:Post')->findAll();
        return array("posts" => $posts);
    }

    /**
     * @Route("/blog", name="post_blog")
     * @Method("POST")
     * @Template()
     */
    public function postBlogAction(Request $request)
    {
        $post = new Post();
        if ($request->get("post")) {
            $post->setText($request->get("post"));
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('default_blog'));
    }
}
