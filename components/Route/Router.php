<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = include(ROOT . '/components/Route/routes.php');
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            $uri = trim($_SERVER['REQUEST_URI'], '/');
            return $uri;
        }
    }

    private function checkCookie($q)
    {
        if (empty($_COOKIE['auth'])) {
            header('Refresh: 0; URL=/auth' . $q);
            return false;
        }
        return true;
    }

    public function run()
    {
        $patternError = '/auth\?error';
        $patternAuth = '/auth';
        $patternReg = '/registration?';
        $subj = $_SERVER['REQUEST_URI'];
        if (($_SERVER['REQUEST_URI'] != '/auth') and ($_SERVER['REQUEST_URI'] != '/registration')) {
            if (preg_match("~$patternError~", "$subj")) {
                include_once(ROOT . '/controllers/auth_controller.php');
                preg_match("~$patternError~", "$subj");
                $currentAuth = new auth_controller();
                $currentAuth->actionLogpage();
            } elseif (preg_match("~$patternAuth~", "$subj")) {
                include_once(ROOT . '/controllers/auth_controller.php');
                $currentAuth = new auth_controller();
                $statusAuth = $currentAuth->actionLogin($_GET);
                if ($statusAuth[0] == 'error') {
                    $q = '?error=' . $statusAuth[1];
                    header('Refresh: 0; URL=/auth' . $q);
                }
            } elseif (preg_match("~$patternReg~", "$subj")) {
                include_once(ROOT . '/controllers/registration_controller.php');
                $currentReg = new registration_controller();
                $currentReg->actionCheck($_GET);
            }
            else {
                $this->checkCookie('');
                /*die();*/
            }
        } else if (!empty($_COOKIE['auth'])) {
            header('Refresh: 0; URL=/');
        }
        $uri = $this->getURI();
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", "$uri")) {
                $segments = explode('/', $path);
                $controller_name = array_shift($segments) . '_controller';
                $actionName = 'action' . ucfirst(array_shift($segments));
                $controllerFile = ROOT . '/controllers/' . $controller_name . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                $currentObj = new $controller_name;
                $result = $currentObj->$actionName();
                if ($result != null) {
                    break;
                }
            }
        }
    }
}