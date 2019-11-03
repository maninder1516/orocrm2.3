<?php

namespace Izmo\ExtendedCalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;

use Symfony\Component\HttpFoundation\Request;


use Oro\Bundle\CalendarBundle\Controller\CalendarController AS BaseCalendarController;

/**
 * @Route("/event_extended")
 */
class DefaultController extends BaseCalendarController
{
    /**
     * @Route(name="oro_calendar_event_index123")
     * @Template
     * @Acl(
     *      id="oro_calendar_event_view",
     *      type="entity",
     *      class="OroCalendarBundle:CalendarEvent",
     *      permission="VIEW",
     *      group_name=""
     * )
     */
    public function index123Action()
    {
        echo 'Hello Calendar';
        exit;
        
        return array(
            'entity_class' => $this->container->getParameter('oro_calendar.calendar_event.entity.class')
        );
    }
    
    /**
     * @Route(name="oro_calendar_event_index12345")
     * @Template
     * @Acl(
     *      id="oro_calendar_event_view",
     *      type="entity",
     *      class="ExtendedCalendarBundle:CalendarEvent",
     *      permission="VIEW",
     *      group_name=""
     * )
     */
    public function index12345Action()
    {
        return $this->render('IzmoExtendedCalendarBundle:Default:index.html.twig');
    }
}
