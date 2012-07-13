<?php

namespace Test\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Test\TestBundle\Entity\Address;
use Test\TestBundle\Form\AddressType;

/**
 * News controller.
 *
 */
class AddressController extends Controller
{
    /**
     * Lists all News entities.
     *
     */
    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TestBundle:Address')->find($id);

        return $this->render('TestBundle:Address:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    public function addAction(){
        
        $entity = new Address();
        $form   = $this->createForm(new AddressType(), $entity);

        return $this->render('TestBundle:Address:add.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }
    
    public function createAction()
    {
        $entity  = new Address();
        $request = $this->getRequest();
        $form    = $this->createForm(new AddressType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('news_show', array('id' => $entity->getId())));
        }

        return $this->render('TestBundle:Address:add.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

}
