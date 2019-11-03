<?php

namespace Izmo\InventoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IzmoInventoryBundle:Default:index.html.twig');
    }
}
