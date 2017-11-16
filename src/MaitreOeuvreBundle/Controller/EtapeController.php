<?php
/**
 * Created by PhpStorm.
 * User: crolland
 * Date: 24/03/2017
 * Time: 13:04
 */

namespace MaitreOeuvreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MaitreOeuvreBundle\Entity\Etape;
use MaitreOeuvreBundle\Form\EtapeType;



class EtapeController extends Controller
{
    public function indexAction()
    {
        $title = "Étape";
        $em = $this->getDoctrine()->getManager();
        $listeEtape = $em->getRepository('MaitreOeuvreBundle:Etape')->findAll();
        return $this->render('MaitreOeuvreBundle:Etape:etape.html.twig' , array('title' => $title,'listeEtape' => $listeEtape));

    }

    public function ajoutAction(Request $request)
    {
        $title = "Ajout";
        $etape = new Etape();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new EtapeType(), $etape);

        if ($form->handleRequest($request)->isValid())

        {
            {

                $em->persist($etape);
                $em->flush();

                $request->getSession()->getFlashBag()->add('message', 'Étape ajouté avec succès');

                // Redirection
                return $this->redirectToRoute('index_etape');

            }
        }

        return $this->render('MaitreOeuvreBundle:Etape:ajout.html.twig', array('form' => $form->createView(),'title' => $title));
    }

    public function modifAction($id, Request $request)
    {
        $title='Modification d\'une étape';

        $em = $this->getDoctrine()->getManager();
        $etape = $em->getRepository('MaitreOeuvreBundle:Etape')->find($id);
        $form = $this->get('form.factory')->create(new EtapeType(),$etape);
        if ($form->handleRequest($request)->isValid()) {

            $em->persist($etape);
            $em->flush();


            $request->getSession()->getFlashBag()->add('message', "Etape modifiée avec succès.");
            return $this->redirect($this->generateUrl('index_etape'));

        }


        return $this->render('MaitreOeuvreBundle:Etape:ajout.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView(),
            ));

    }


    public function suppAction($id, Request $request)
    {
        $title = "Suppression d'une étape";

        $em = $this->getDoctrine()->getManager();
        $lEtape = $em->getRepository('MaitreOeuvreBundle:Etape')->find($id);

        $form = $this->createFormBuilder($lEtape)
            ->add('delete', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->remove($lEtape);
            $em->flush();

            $request->getSession()->getFlashBag()->add('message', 'Etape supprimée avec succès effectuée.');
            return $this->redirect($this->generateUrl('index_etape'));

        }

        return $this->render('MaitreOeuvreBundle:Etape:supp_etape.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView()
            ));


    }

    
}
