<?php

namespace Wind\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Wind\ModelBundle\Entity\Generator;
use Wind\ModelBundle\Form\GeneratorType;

/**
 * Generator controller.
 *
 * @Route("/generator")
 */
class GeneratorController extends Controller
{

    /**
     * Lists all Generator entities.
     *
     * @Route("/")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WindModelBundle:Generator')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Generator entity.
     *
     * @Route("/")
     * @Method("POST")
     * @Template("AdminBundle:Generator:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Generator();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->upload();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('wind_admin_generator_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Generator entity.
     *
     * @param Generator $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Generator $entity)
    {
        $form = $this->createForm(new GeneratorType(), $entity, array(
            'action' => $this->generateUrl('wind_admin_generator_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Generator entity.
     *
     * @Route("/new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Generator();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Generator entity.
     *
     * @Route("/{id}")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WindModelBundle:Generator')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Generator entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Generator entity.
     *
     * @Route("/{id}/edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WindModelBundle:Generator')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Generator entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Generator entity.
    *
    * @param Generator $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Generator $entity)
    {
        $form = $this->createForm(new GeneratorType(), $entity, array(
            'action' => $this->generateUrl('wind_admin_generator_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Generator entity.
     *
     * @Route("/{id}")
     * @Method("PUT")
     * @Template("AdminBundle:Generator:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WindModelBundle:Generator')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Generator entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->upload();
            $em->flush();

            return $this->redirect($this->generateUrl('wind_admin_generator_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Generator entity.
     *
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WindModelBundle:Generator')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Generator entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('wind_admin_generator_index'));
    }

    /**
     * Creates a form to delete a Generator entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('wind_admin_generator_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
