<?php
/**
 * Created by PhpStorm.
 * User: crolland
 * Date: 26/04/2017
 * Time: 20:33
 */

namespace MaitreOeuvreBundle\Controller;
use MaitreOeuvreBundle\Entity\Specialite;
use MaitreOeuvreBundle\Form\SpecialiteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class SpecialiteController extends Controller
{
    public function indexAction()
    {
        $title = "Spécialité";
        $em = $this->getDoctrine()->getManager();
        $listeSpecialites = $em->getRepository('MaitreOeuvreBundle:Specialite')->findAll();

        return $this->render('MaitreOeuvreBundle:Specialite:index.html.twig',
            array(
                'title' => $title,
                'listeSpecialites' => $listeSpecialites
            ));
    }

    public function ajoutSpecialiteAction(Request $request)
    {
        $title='Ajout d\'une spécialité' ;

        $specialite = new Specialite();

        $form= $this->get('form.factory')->create(new SpecialiteType(), $specialite);
        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($specialite);
            $em->flush();

            $request->getSession()->getFlashBag()->add('addSuccess', "Spécialité ajouté avec succès.");

            return $this->redirect($this->generateUrl('specialite_index'));
        }


        return $this->render('MaitreOeuvreBundle:Specialite:ajout.html.twig',
            array('title' => $title,
                  'form' => $form->createView()
            ));
    }

    public function modifSpecialiteAction($id, Request $request)
    {
        $title='Modification d\'une spécialité';

        $em = $this->getDoctrine()->getManager();
        $specialite = $em->getRepository('MaitreOeuvreBundle:Specialite')->find($id);


        $form= $this->get('form.factory')->create(new SpecialiteType(), $specialite);
        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($specialite);
            $em->flush();

            $request->getSession()->getFlashBag()->add('updateSuccess', "Spécialité modifiée avec succès.");
            return $this->redirect($this->generateUrl('specialite_index'));
        }


        return $this->render('MaitreOeuvreBundle:Specialite:ajout.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView()
            ));
    }

    public function suppSpecialiteAction($id, Request $request)
    {
        $title = "Suppression";

        $em = $this->getDoctrine()->getManager();
        $specialite = $em->getRepository('MaitreOeuvreBundle:Specialite')->find($id);

        $form = $this->createFormBuilder($specialite)
            ->add('delete', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->remove($specialite);
            $em->flush();

            $request->getSession()->getFlashBag()->add('deleteSuccess', 'Suppression effectuer.');
            return $this->redirect($this->generateUrl('specialite_index'));

        }

        return $this->render('MaitreOeuvreBundle:Specialite:supp.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView()
            ));
    }
}