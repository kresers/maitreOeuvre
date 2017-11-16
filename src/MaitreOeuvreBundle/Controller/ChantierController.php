<?php

namespace MaitreOeuvreBundle\Controller;

use MaitreOeuvreBundle\Form\ChantierConsultType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MaitreOeuvreBundle\Entity\Chantier;
use MaitreOeuvreBundle\Form\ChantierType;

class ChantierController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $title = 'Gestion chantiers /';
        $listChantier = $em->getRepository('MaitreOeuvreBundle:Chantier')->findAll();
        return $this->render('MaitreOeuvreBundle:Chantier:chantier.html.twig', array('title' => $title, 'listChantier' => $listChantier));
    }

    public function ajoutAction(Request $request)
    {
        $title = "Gestion chantier / Ajout ";
        $chantier = new Chantier();
        $em = $this->getDoctrine()->getManager();
        $form   = $this->get('form.factory')->create(new ChantierType(), $chantier);


        if ($form->handleRequest($request)->isValid())

        {
            {

                $em->persist($chantier);
                $em->flush();


                $request->getSession()->getFlashBag()->add('message', 'Chantier ajouté avec succès');


                // Redirection

                return $this->redirectToRoute('chantier_index');

            }


        }

        return $this->render('MaitreOeuvreBundle:Chantier:ajout.html.twig', array(

            'form' => $form->createView(),'title' => $title));


    }

    public function modifAction($id, Request $request)
    {
        $title='Modification d\'un chantier';

        $em = $this->getDoctrine()->getManager();
        $chantier = $em->getRepository('MaitreOeuvreBundle:Chantier')->find($id);
        $form = $this->get('form.factory')->create(new ChantierType(),$chantier);
        if ($form->handleRequest($request)->isValid()) {

            $em->persist($chantier);
            $em->flush();


            $request->getSession()->getFlashBag()->add('message', "Chantier modifié avec succès.");
            return $this->redirect($this->generateUrl('chantier_index'));

        }


        return $this->render('MaitreOeuvreBundle:Chantier:ajout.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView(),
            ));

    }


    public function suppAction($id, Request $request)
    {
        $title = "Suppression";

        $em = $this->getDoctrine()->getManager();
        $leChantier = $em->getRepository('MaitreOeuvreBundle:Chantier')->find($id);

        $form = $this->createFormBuilder($leChantier)
            ->add('delete', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->remove($leChantier);
            $em->flush();

            $request->getSession()->getFlashBag()->add('message', 'Suppression effectuée.');
            return $this->redirect($this->generateUrl('chantier_index'));

        }

        return $this->render('MaitreOeuvreBundle:Chantier:supp_chantier.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView()
            ));


    }

    public function consultChantierAction(Request $request,$id)
    {
        $title='Consultation d\'un chantier';

        // création d'une instance Chantier
        $em = $this->getDoctrine()->getManager();
        $chantier = $em->getRepository('MaitreOeuvreBundle:Chantier')->find($id);
        //création du formulaireType
        $form= $this->get('form.factory')->create(new ChantierConsultType(),$chantier);



        return $this->render('MaitreOeuvreBundle:Chantier:consult.html.twig',
            array('title' => $title,
                'form' => $form->createView()));
    }


}
