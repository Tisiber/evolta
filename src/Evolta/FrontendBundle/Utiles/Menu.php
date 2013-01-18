<?php

namespace Evolta\FrontendBundle\Utiles;

use Symfony\Component\HttpFoundation\Session;

/**
 * Description of Util
 *
 * @author aarranz
 */
class Menu {
    
    static public function setMenu(Session $session, $menu) {
        $session->set("menu", $menu);
    }
    
    static public function getMenu(Session $session, $default = null) {
        
        if ($session->has("menu")) {
            return $session->get("menu");
        }
        
        return $default;
    }
    
    static public function getMenuParam(Session $session, $default = null) {
        return array(
            "menu" => self::getMenu($session, $default)
        );
    }
    
    static public function resetMenu(Session $session) {
        self::setMenu($session, null);
    }
}

?>
