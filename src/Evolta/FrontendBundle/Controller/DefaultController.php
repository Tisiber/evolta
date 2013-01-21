<?php

namespace Evolta\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Evolta\FrontendBundle\Utiles\Menu;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('FrontendBundle:Default:index.html.twig', array(
                'menu' => ''
        ));
    }
    
    public function staticAction($page)
    {
        $useragent = $this->getRequest()->headers->get('user-agent');
        $view = "web";
        if ( (stripos($useragent, "(iPhone;") !== false)
              || (stripos($useragent, "(iPod;") !== false)
              || (stripos($useragent, "(iPad;") !== false)
              || (stripos($useragent, "Android") !== false)
              || (stripos($useragent, "Symbian") !== false)
              || (stripos($useragent, "Windows Phone OS") !== false)
              || (stripos($useragent, "BlackBerry") !== false)
              || (stripos($useragent, "Bada/") !== false)
              || (stripos($useragent, "(Windows Mobile") !== false)
        )
        {
            $view = "mobi";
        }
                
        list($menu, $submenu) = $this->configMenu($page);
        
        return $this->render("FrontendBundle:Default:{$page}.html.{$view}.twig", array(
                'menu' => $menu,
                'submenu' => $submenu
        ));
    }
    
    public function configMenu($page)
    {
        $menu_servicios = array('empresas', 'comunidades', 'aseguradoras', 'particulares');
        
        if (\in_array($page, $menu_servicios))
        {
            $menu = "servicios";
            $submenu = $page;
        }
        else
        {
            $menu = $page;
            $submenu = "";
        }
        
        return array($menu, $submenu);
    }
    
}
