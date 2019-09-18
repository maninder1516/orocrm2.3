<?php

namespace Izmo\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;

/**
 * @Route("/test")
 */
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IzmoTestBundle:Default:index.html.twig');
    }
}
