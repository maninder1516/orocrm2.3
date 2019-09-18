<?php

namespace Izmo\ExtendedCalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;


use Oro\Bundle\CalendarBundle\Controller\CalendarController AS BaseCalendarController;

/**
 * @Route("/event")
 */
class DefaultController extends BaseCalendarController
{
    /**
     * @Route(name="oro_calendar_event_index")
     * @Template
     * @Acl(
     *      id="oro_calendar_event_view",
     *      type="entity",
     *      class="OroCalendarBundle:CalendarEvent",
     *      permission="VIEW",
     *      group_name=""
     * )
     */
    public function indexAction()
    {
        echo 'Hello';
        exit;
        
        return array(
            'entity_class' => $this->container->getParameter('oro_calendar.calendar_event.entity.class')
        );
    }
    
    /**
     * @Route(name="oro_calendar_event_index123")
     * @Template
     * @Acl(
     *      id="oro_calendar_event_view",
     *      type="entity",
     *      class="ExtendedCalendarBundle:CalendarEvent",
     *      permission="VIEW",
     *      group_name=""
     * )
     */
    public function index123Action()
    {
        return $this->render('IzmoExtendedCalendarBundle:Default:index.html.twig');
    }
}
