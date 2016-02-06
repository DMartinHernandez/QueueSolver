<?php

namespace QueueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use QueueBundle\Entity\Queue;
use QueueBundle\Form\QueueType;

/**
 * Queue controller.
 *
 * @Route("/queue")
 */
class QueueController extends Controller
{
    /**
     * Lists all Queue entities.
     *
     * @Route("/", name="queue_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $queues = $em->getRepository('QueueBundle:Queue')->findAll();

        return $this->render('queue/index.html.twig', array(
            'queues' => $queues,
        ));
    }

    /**
     * Creates a new Queue entity.
     *
     * @Route("/new", name="queue_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $queue = new Queue();
        $form = $this->createForm('QueueBundle\Form\QueueType', $queue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($queue);
            $em->flush();

            return $this->redirectToRoute('queue_show', array('id' => $queue->getId()));
        }

        return $this->render('queue/new.html.twig', array(
            'queue' => $queue,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Queue entity.
     *
     * @Route("/{id}", name="queue_show")
     * @Method("GET")
     */
    public function showAction(Queue $queue)
    {
        $deleteForm = $this->createDeleteForm($queue);

        return $this->render('queue/show.html.twig', array(
            'queue' => $queue,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Queue entity.
     *
     * @Route("/edit/{id}", name="queue_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Queue $queue)
    {
        $deleteForm = $this->createDeleteForm($queue);
        $editForm = $this->createForm('QueueBundle\Form\QueueType', $queue);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($queue);
            $em->flush();

            return $this->redirectToRoute('queue_edit', array('id' => $queue->getId()));
        }

        return $this->render('queue/edit.html.twig', array(
            'queue' => $queue,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Queue entity.
     *
     * @Route("/{id}", name="queue_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Queue $queue)
    {
        $form = $this->createDeleteForm($queue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($queue);
            $em->flush();
        }

        return $this->redirectToRoute('queue_index');
    }

    /**
     * Creates a form to delete a Queue entity.
     *
     * @param Queue $queue The Queue entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Queue $queue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('queue_delete', array('id' => $queue->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
