<?php

namespace Acme\RedirectBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\RedirectBundle\Entity\FabsteiShorturl;
use Acme\RedirectBundle\Form\FabsteiShorturlType;

/**
 * FabsteiShorturl controller.
 *
 */
class FabsteiShorturlController extends Controller
{

    /**
     * Lists all FabsteiShorturl entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeRedirectBundle:FabsteiShorturl')->findAll();

        return $this->render('AcmeRedirectBundle:FabsteiShorturl:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new FabsteiShorturl entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new FabsteiShorturl();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('redirect_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeRedirectBundle:FabsteiShorturl:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a FabsteiShorturl entity.
     *
     * @param FabsteiShorturl $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(FabsteiShorturl $entity)
    {
        $form = $this->createForm(new FabsteiShorturlType(), $entity, array(
            'action' => $this->generateUrl('redirect_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new FabsteiShorturl entity.
     *
     */
    public function newAction()
    {
        $entity = new FabsteiShorturl();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeRedirectBundle:FabsteiShorturl:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FabsteiShorturl entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeRedirectBundle:FabsteiShorturl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FabsteiShorturl entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeRedirectBundle:FabsteiShorturl:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FabsteiShorturl entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeRedirectBundle:FabsteiShorturl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FabsteiShorturl entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeRedirectBundle:FabsteiShorturl:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a FabsteiShorturl entity.
    *
    * @param FabsteiShorturl $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FabsteiShorturl $entity)
    {
        $form = $this->createForm(new FabsteiShorturlType(), $entity, array(
            'action' => $this->generateUrl('redirect_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing FabsteiShorturl entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeRedirectBundle:FabsteiShorturl')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FabsteiShorturl entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('redirect_edit', array('id' => $id)));
        }

        return $this->render('AcmeRedirectBundle:FabsteiShorturl:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a FabsteiShorturl entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeRedirectBundle:FabsteiShorturl')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FabsteiShorturl entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('redirect'));
    }

    /**
     * Creates a form to delete a FabsteiShorturl entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('redirect_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * Redirects a FabsteiShorturl entity.
     *
     */
    public function redirectAction($token)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeRedirectBundle:FabsteiShorturl')->findOneBy(
            array('token' => $token)
        );

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FabsteiShorturl entity.');
        }

        return $this->render('AcmeRedirectBundle:FabsteiShorturl:redirect.html.twig', array(
            'entity'      => $entity,

        ));
    }
}
