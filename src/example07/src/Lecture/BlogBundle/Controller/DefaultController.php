<?php

namespace Lecture\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
     * @Template()
     */
    public function blogAction()
    {
        return array();
    }
}
