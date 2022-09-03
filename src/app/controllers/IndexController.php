<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

/**\
 * @property View $view
 */
class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->setVar('name', "SHIBES");
    }
}
