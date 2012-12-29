<?php

namespace Evolta\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        
        return $this->render('FrontendBundle:Default:index.html.twig',
                array(
                    'content' => ''
        ));
    }
    
    public function staticAction($page) {
        
        return $this->render("FrontendBundle:Default:{$page}.html.twig",
                array(
                    'content' => ''
        ));
    }
}
