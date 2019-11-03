<?php
// src/Izmo/InventoryBundle/Controller/VehicleController.php
namespace Izmo\InventoryBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Izmo\InventoryBundle\Entity\Vehicle;

/**
 * @Route("/vehicle")
 */
class VehicleController extends Controller
{
    /**
     * @Route("/", name="inventory.vehicle_index")
     * @Template
     * @Acl(
     *     id="inventory.vehicle_view",
     *     type="entity",
     *     class="IzmoInventoryBundle:Vehicle",
     *     permission="VIEW"
     * )
     */
    public function indexAction()
    {
        return array('gridName' => 'vehicles-grid');
    }
    
    /**
     * @Route("/create", name="inventory.vehicle_create")
     * @Template("IzmoInventoryBundle:Vehicle:update.html.twig")
     * @Acl(
     *     id="inventory.vehicle_create",
     *     type="entity",
     *     class="IzmoInventoryBundle:Vehicle",
     *     permission="CREATE"
     * )
     */
    public function createAction(Request $request)
    {
        return $this->update(new Vehicle(), $request);
    }
    
    /**
     * @Route("/update/{id}", name="inventory.vehicle_update", requirements={"id":"\d+"}, defaults={"id":0})
     * @Template()
     * @Acl(
     *     id="inventory.vehicle_update",
     *     type="entity",
     *     class="IzmoInventoryBundle:Vehicle",
     *     permission="EDIT"
     * )
     */
    public function updateAction(Vehicle $vehicle, Request $request)
    {
        return $this->update($vehicle, $request);
    }
    
    private function update(Vehicle $vehicle, Request $request)
    {
        $form = $this->get('form.factory')->create('inventory_vehicle', $vehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vehicle);
            $entityManager->flush();

            return $this->get('oro_ui.router')->redirectAfterSave(
                array(
                    'route' => 'inventory.vehicle_update',
                    'parameters' => array('id' => $vehicle->getId()),
                ),
                array('route' => 'inventory.vehicle_index'),
                $vehicle
            );
        }

        return array(
            'entity' => $vehicle,
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/{id}", name="inventory.vehicle_view", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("inventory.vehicle_view")
     */
    public function viewAction(Vehicle $vehicle)
    {
        return array('entity' => $vehicle);
    }
}