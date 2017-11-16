<?php
/**
 * Created by PhpStorm.
 * User: crolland
 * Date: 27/04/2017
 * Time: 10:26
 */

namespace MaitreOeuvreBundle\Controller;

use MaitreOeuvreBundle\Entity\TypeChantier;
use MaitreOeuvreBundle\Form\TypeChantierType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TypeChantierController extends Controller
{
    public function indexAction()
    {
        $title = "Type Chantier";
        $em = $this->getDoctrine()->getManager();
        $listeTypeChantier = $em->getRepository('MaitreOeuvreBundle:TypeChantier')->findAll();

        return $this->render('MaitreOeuvreBundle:TypeChantier:index.html.twig',
            array(
                'title' => $title,
                'listTypeChantier' => $listeTypeChantier
            ));
    }

    public function ajoutAction(Request $request)
    {
        $title='Ajout type chantier';

        $typeChantier = new TypeChantier();

        $form= $this->get('form.factory')->create(new TypeChantierType(), $typeChantier);
        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeChantier);
            $em->flush();

            $request->getSession()->getFlashBag()->add('addSuccess', "Type chantier ajouté avec succès.");

            return $this->redirect($this->generateUrl('type_chantier_index'));
        }


        return $this->render('MaitreOeuvreBundle:TypeChantier:ajout.html.twig',
            array('title' => $title,
                'form' => $form->createView()));
    }

    public function modifAction($id, Request $request)
    {
        $title='Modification d\'un type chantier';

        $em = $this->getDoctrine()->getManager();
        $typeChantier = $em->getRepository('MaitreOeuvreBundle:TypeChantier')->find($id);


        $form= $this->get('form.factory')->create(new TypeChantierType(), $typeChantier);
        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($typeChantier);
            $em->flush();

            $request->getSession()->getFlashBag()->add('updateSuccess', "Type chantier modifiée avec succès.");
            return $this->redirect($this->generateUrl('type_chantier_index'));
        }


        return $this->render('MaitreOeuvreBundle:TypeChantier:ajout.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView()
            ));
    }

    public function suppAction($id, Request $request)
    {
        $title = "Suppression";

        $em = $this->getDoctrine()->getManager();
        $typeChantier = $em->getRepository('MaitreOeuvreBundle:TypeChantier')->find($id);

        $form = $this->createFormBuilder($typeChantier)
            ->add('delete', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->remove($typeChantier);
            $em->flush();

            $request->getSession()->getFlashBag()->add('deleteSuccess', 'Suppression effectuer.');
            return $this->redirect($this->generateUrl('type_chantier_index'));

        }

        return $this->render('MaitreOeuvreBundle:TypeChantier:supp.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView()
            ));
    }
}