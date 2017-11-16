<?php
/**
 * Created by PhpStorm.
 * User: crolland
 * Date: 27/04/2017
 * Time: 10:26
 */

namespace MaitreOeuvreBundle\Controller;

use MaitreOeuvreBundle\Entity\TypeChantier;
use MaitreOeuvreBundle\Entity\VisiteChantier;
use MaitreOeuvreBundle\Form\TypeChantierType;
use MaitreOeuvreBundle\Form\VisiteChantierType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VisiteChantierController extends Controller
{
    public function indexAction()
    {
        $title = "Visite de chantier";
        $em = $this->getDoctrine()->getManager();
        $listVisiteChantier = $em->getRepository('MaitreOeuvreBundle:VisiteChantier')->findAll();

        return $this->render('MaitreOeuvreBundle:VisiteChantier:index.html.twig',
            array(
                'title' => $title,
                'listVisiteChantier' => $listVisiteChantier
            ));
    }

    public function ajoutAction(Request $request)
    {
        $title='Ajout d\'une visite';

        $visiteChantier = new VisiteChantier();

        $form= $this->get('form.factory')->create(new VisiteChantierType(), $visiteChantier);
        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($visiteChantier);
            $em->flush();

            $request->getSession()->getFlashBag()->add('addSuccess', "La visite de chantier est ajoutée avec succès.");

            return $this->redirect($this->generateUrl('visite_chantier_index'));
        }


        return $this->render('MaitreOeuvreBundle:VisiteChantier:ajout.html.twig',
            array('title' => $title,
                'form' => $form->createView()));
    }

    public function modifAction($id, Request $request)
    {
        $title='Modification d\'un type chantier';

        $em = $this->getDoctrine()->getManager();
        $laVisiteChantier = $em->getRepository('MaitreOeuvreBundle:VisiteChantier')->find($id);


        $form= $this->get('form.factory')->create(new VisiteChantierType(), $laVisiteChantier);
        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($laVisiteChantier);
            $em->flush();

            $request->getSession()->getFlashBag()->add('updateSuccess', "La visite est modifiée avec succès.");
            return $this->redirect($this->generateUrl('visite_chantier_index'));
        }


        return $this->render('MaitreOeuvreBundle:VisiteChantier:ajout.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView()
            ));
    }

    public function suppAction($id, Request $request)
    {
        $title = "Suppression";

        $em = $this->getDoctrine()->getManager();
        $laVisiteChantier = $em->getRepository('MaitreOeuvreBundle:VisiteChantier')->find($id);

        $form = $this->createFormBuilder($laVisiteChantier)
            ->add('valider', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->remove($laVisiteChantier);
            $em->flush();

            $request->getSession()->getFlashBag()->add('deleteSuccess', 'Suppression effectuée.');
            return $this->redirect($this->generateUrl('visite_chantier_index'));

        }

        return $this->render('MaitreOeuvreBundle:VisiteChantier:supp.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView()
            ));
    }
}